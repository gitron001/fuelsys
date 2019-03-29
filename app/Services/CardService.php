<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\Products;
use App\Models\PFC as PfcModel;
use DB;


class CardService extends ServiceProvider
{
    /**
     * Read Card Status
     *
     *
     */
    public static function check_readers($socket = null, $pfc_id = 1) {
        //Create socket if it does not exist
        if($socket === null) {
                $pfc    = PfcModel::where('id', $pfc_id)->first();
                $socket = PFC::create_socket();
        }
        $message = "\x1\x4\x9";
        $the_crc = PFC::crc16($message);
        $binarydata = pack("c*", 0x01)
            .pack("c*",0x04)
            .pack("c*",0x09)
            .strrev(pack("s",$the_crc))
            .pack("c*",02);
        $response = PFC::send_message($socket, $binarydata, $message);

		if(!$response){ return false; } 
		
        //Get all transaction by channel
        $length = count($response) - 3;
        for($i = 3; $i <= $length; $i++){
            if($response[$i] == 2){
                $channel = ($i - 3);
                self::check_card($socket, $channel, $pfc_id);
            }
        }
        //print_r($response);
        //socket_close($socket);
        return true;
     }

    /**
     * Validate Card and call authorization function
     *
     *
     */
    public static function check_card($socket, $channel = 1) {

        //Get all transaction by channel
        $channel_id = PFC::conver_to_bin($channel);
        $message = "\x1\x5\x0A" . $channel_id;
        $the_crc = PFC::crc16($message);

        $binarydata = pack("c*", 0x01)
            . pack("c*", 0x05)
            . pack("c*", 0x0A)
            . pack("c*", $channel)
            . strrev(pack("s", $the_crc))
            . pack("c*", 02);

        $response = PFC::send_message($socket, $binarydata, $message);
			
		if(!$response){ return false; } 
		
        $cardNumber = pack('c', $response[8]).pack('c', $response[7]).pack('c', $response[6]).pack('c', $response[5]);
        $cardNumber = unpack('i', $cardNumber)[1];

        //echo '<br> Card Number: '. $cardNumber;
        $user = Users::where("rfid", $cardNumber)->where('status', 1)->first();
        $card_count = Users::where("rfid", $cardNumber)->where('status', 1)->count();
			
        if($card_count == 0 ){ return false; }

        if($user->status != 1 ){ return false; }
        if($user->company->status != 1 ){ return false; }

        //Call Function to check limit
        if(!is_null($user->company->id) && $user->company->has_limit == 1){
           $limit =  self::checkCompLimit($socket, $channel, $user->company);
           if(!$limit){ return false; }
        }
        //print_r($cardNumber);
        if(count($user->discounts) == 0){
            self::activate_card($socket, $channel);
        }else{
            $all_discounts = array();
            for($i = 10; $i < 15; $i++){
                foreach($user->discounts as $discount){
                    if(is_null($discount->product_details->price)){ continue; }
                    if($discount->product_details->pfc_pr_id == $response[$i]){
                        $all_discounts[$i] = (int)($discount->product_details->price - $discount->discount*1000);
                        break;
                    }
                }
                //If there is not Discount on RFID check for Company Discount
                if(!isset($all_discounts[$i])){
                    foreach($user->company->discounts as $c_discount){
                        if(is_null($c_discount->product_details->price)){ continue; }
                        if($c_discount->product_details->pfc_pr_id == $response[$i]) {
                            $all_discounts[$i] = (int)($discount->product_details->price - $discount->discount*1000);
                            break;
                        }
                    }
                }
            }
            $products = Products::where('pfc_id', $pfc_id)->where('status', 1)->get();
            for($i = 10; $i < 15; $i++){
                if(!isset($all_discounts[$i] )){
                    foreach($products as $pr) {
                        if($pr->pfc_pr_id == $response[$i]){
                            $all_discounts[$i] = (int)$pr->price;
                            break;
                        }
                    }
                }
            }

           self::activate_card_discount($socket, $channel, $all_discounts);
        }

        return true;
    }

    /**
     * Authorize Card without set prices
     *
     * @return void
     */
    public static function activate_card($socket, $channel = 1, $status = 3)
    {
            //Get all transaction by channel
            $channel_id = PFC::conver_to_bin($channel);
            $command    = pack("C*",$status);
            $message = "\x1\x7\x8A".$channel_id.$command.$command;
            $the_crc = PFC::crc16($message);

            //Start of mesasge
            $binarydata = pack("c*", 0x01);
            //Length
            $binarydata .= pack("c*",0x07);
            //Command
            $binarydata .= pack("c*",0x8A);
            //Message
            $binarydata .= pack("C*", $channel);
            //Command
            $binarydata .= pack("C*",$status);
            //Command 2
            $binarydata .= pack("C*",$status);
            //CRC
            $binarydata .= strrev(pack("s",$the_crc));
            //End of Message
            $binarydata .= pack("c*",02);

            $response = PFC::send_message($socket, $binarydata, $message);

            return true;
    }
    /**
     * Authorize card with  set prices
     *
     *
     */
    public static function activate_card_discount($socket, $channel, $all_discounts) {
            //Get all transaction by channel
            $channel_id = PFC::conver_to_bin($channel);
            $command    = pack("c*", 0x03);
            $prices     = "";

            for($i = 10; $i < 15; $i++){
                $prices    .= strrev(pack('s', str_replace('.', '', $ds)));
            }
            $message = "\x1\x11\x8A".$channel_id.$command.$command.$prices;
            //dd(unpack('c*',$message));
            $the_crc = PFC::crc16($message);

            //Start of mesasge
            $binarydata = pack("c*", 0x01);
            //Length
            $binarydata .= pack("c*",0x11);
            //Command
            $binarydata .= pack("c*",0x8A);
            //Message
            $binarydata .= pack("C*", $channel);
            //Command
            $binarydata .= pack("c*",0x03);
            //Command 2
            $binarydata .= pack("c*",0x03);
            for($i = 10; $i < 15; $i++){
                $ds = $all_discounts[$i];
                $binarydata .= strrev(pack('s', str_replace('.', '', $ds)));
            }
            //CRC
            $binarydata .= strrev(pack("s",$the_crc));
            //End of Message
            $binarydata .= pack("c*",02);

            $response = PFC::send_message($socket, $binarydata, $message);

            return true;
    }

    public static function checkCompLimit($socket, $channel, $company){
        $total_transactions = Transaction::select(DB::raw('sum(price * lit) as sum'))
            ->join('users' ,'users.id', '=', 'transactions.user_id')
            ->where('users.company_id', $company->id)

            ->where('transactions.created_at', '>', $company->last_balance_update)->get();

        $limit_left = str_replace('.', '', number_format($company->limits - ($total_transactions[0]->sum+ $company->starting_balance), 2));

        if($limit_left < 0){
            self::activate_card($socket, $channel, 1);
            return false;
        }else{
            self::setPrepay($socket, $channel, $limit_left);
            return true;
        }
    }

    public static function setPrepay($socket, $channel, $limit_left) {
        //Get all transaction by channel
        $channel_id = PFC::conver_to_bin($channel);
        $limit_left_bin = strrev(pack("I",2000));
        $message = "\x1\x9\x8C".$channel_id.$limit_left_bin;
        $the_crc = PFC::crc16($message);
        //Start of mesasge
        $binarydata = pack("c*", 0x01);
        //Length
        $binarydata .= pack("c*",0x09);
        //Command
        $binarydata .= pack("c*",0x8C);
        //Message
        $binarydata .= pack("C*", $channel);
        //Command
        $binarydata .= strrev(pack("I",2000));
        //CRC
        $binarydata .= strrev(pack("s",$the_crc));
        //End of Message
        $binarydata .= pack("c*",02);
		
        $response = PFC::send_message($socket, $binarydata, $message);
      
        return true;
    }
}
