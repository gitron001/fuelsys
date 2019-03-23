<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\Products;


class CardService extends ServiceProvider
{
    /**
     * Read Card Status
     *
     *
     */
    public static function check_readers($socket = null, $pfc_id = 1)
    {
        //Create socket if it does not exist
        if($socket === null) {
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
    public static function check_card($socket, $channel = 1, $pfc_id = 1) {

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

            $cardNumber = pack('c', $response[8]).pack('c', $response[7]).pack('c', $response[6]).pack('c', $response[5]);
            $cardNumber = unpack('i', $cardNumber)[1];


            //echo '<br> Card Number: '. $cardNumber;

            $the_card = Users::where("rfid", $cardNumber)->where('status', 1)->first();
            $card_count = Users::where("rfid", $cardNumber)->where('status', 1)->count();
            if($card_count == 0 ){ return false; }

            if($the_card->user->status != 1 ){ return false; }
            if($the_card->company->status != 1 ){ return false; }

           /*if($the_card->limits){

            }*/
            //print_r($cardNumber);
            if(count($the_card->discounts) == 0){
                self::activate_card($socket, $channel);
            }else{
                $all_discounts = array();
                for($i = 10; $i < 15; $i++){
                    foreach($the_card->discounts as $discount){
                        if(is_null($discount->product_details->price)){ continue; }
                        if($discount->product_details->pfc_pr_id == $response[$i]){
                            $all_discounts[$i] = (int)($discount->product_details->price - $discount->discount*1000);
                            break;
                        }
                    }
                    //If there is not Discount on RFID check for Company Discount
                    if(!isset($all_discounts[$i])){
                        foreach($the_card->company->discounts as $c_discount){
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

                //Check for Limit
                if(!is_null($users->company->id)){


                }

            }

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
            $command    = PFC::conver_to_bin($status);
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

            //Call Function to check limit
            if($status = 3 && !is_null($users->company->id) && $users->company->has_limit == 1){
               self::CeckCompLimit($users->company);
            }
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
            $command    = PFC::conver_to_bin(3);
            $prices     = "";

            for($i = 10; $i < 15; $i++){
                $ds = $all_discounts[$i];
                //dd(str_replace('.', '', $ds));
                //$prices .= $bin;
                $lenth = strlen($ds);
                //s$ds = number_format($ds, 2);
                //dd($ds);
                if($lenth % 2 == 0){
                    $hex        = (string) strtoupper(dechex(str_replace('.', '',$ds)));
                }
                else{
                    $hex        = (string) strtoupper(dechex(str_replace('.', '',$ds)));
                }

                if(strlen($hex) % 2 != 0){
                    $hex = '0'.$hex;
                }
                $prices    .= hex2bin($hex);

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
            //Call Function to check limit
            if(!is_null($users->company->id) && $users->company->has_limit == 1){
                $limit_left =  self::CeckCompLimit($users->company);
            }
            return true;
    }

    public static function CeckCompLimit($company){

        $total_transactions = Transaction::select(DB::raw('SUM(price/100 * lit)'))
            ->join('users' ,'users.id', '=', 'transactions.user_id')
            ->where('users.company_i', $company->id)
            ->where('transactions.created_at', '>', $company->last_balance_update);

        $limit_left = $company->limit - ($total_transactions+ $company->strating_balance);
        if($limit_left < 0){
            self::activate_card($socket, $channel, 1);
            return true;
        }else{
            self::setPrepay($socket, $channel, $limit_left);
            return true;
        }
    }

    public static function setPrepay($socket, $channel, $limit_left) {
        //Get all transaction by channel
        $channel_id = PFC::conver_to_bin($channel);
        $limit_left_bin    = PFC::conver_to_bin($limit_left);
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
        $binarydata .= pack("i*",$limit_left_bin);
        //CRC
        $binarydata .= strrev(pack("s",$the_crc));
        //End of Message
        $binarydata .= pack("c*",02);

        $response = PFC::send_message($socket, $binarydata, $message);


    }
}
