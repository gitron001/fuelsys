<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Rfid;
use App\Models\Products;


class CardService extends ServiceProvider
{
    /**
     * Read Card Status
     *
     *
     */
    public static function check_readers($socket = null)
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
        //print_r($response);
        //return true;
        //Get all transaction by channel
        $length = count($response) - 3;
        for($i = 3; $i <= $length; $i++){
            if($response[$i] == 2){
                $channel = ($i - 3);
                self::check_card($socket, $channel);
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
    public static function check_card($socket, $channel = 1)
    {

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

            $the_card = Rfid::where("rfid", $cardNumber)->where('status', 1)->first();
            $card_count = Rfid::where("rfid", $cardNumber)->where('status', 1)->count();
            if($card_count == 0 ){ return false; }
           /*if($the_card->limits){

            }*/
            //print_r($cardNumber);
            if(count($the_card->discounts) == 0){
                self::activate_card($socket, $channel);
            }else{
                $all_discounts = array();
                for($i = 10; $i < 15; $i++){
                    foreach($the_card->discounts as $discount){
                        if($discount->id == $response[$i]){
                            $all_discounts[$i] = number_format(($discount->product->price - $discount->discount), 2);
                            break;
                        }
                    }
                }
                $products = Products::all();
                for($i = 10; $i < 15; $i++){
                    if(!isset($all_discounts[$i] )){
                        foreach($products as $pr) {
                            if($pr->id == $response[$i]){
                                $all_discounts[$i] = number_format($pr->price, 2);
                                break;
                            }
                        }
                    }
                }

               self::activate_card_discount($socket, $channel, $all_discounts);
            }

    }

    /**
     * Authorize Card without set prices
     *
     * @return void
     */
    public static function activate_card($socket, $channel = 1)
    {
            //Get all transaction by channel
            $channel_id = PFC::conver_to_bin($channel);
            $command    = PFC::conver_to_bin('3');
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
            $binarydata .= pack("c*",0x03);
            //Command 2
            $binarydata .= pack("c*",0x03);
            //CRC
            $binarydata .= strrev(pack("s",$the_crc));
            //End of Message
            $binarydata .= pack("c*",02);
            //print_r(unpack('c*', $binarydata));
            $response = PFC::send_message($socket, $binarydata, $message);
            //print_r($response);
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

            foreach($all_discounts as $ds){

                //dd(str_replace('.', '', $ds));
                //$prices .= $bin;
                $lenth = strlen($ds);
                //s$ds = number_format($ds, 2);
                //dd($ds);
                if($lenth % 2 == 0){
                    $hex        = (string) strtoupper(dechex(str_replace('.', '',$ds)));
                }
                else{
                    $hex        = (string) '0'.strtoupper(dechex(str_replace('.', '',$ds)));
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
            foreach($all_discounts as $ds){
               $binarydata .= strrev(pack('s', str_replace('.', '', $ds)));
            }
            //CRC
            $binarydata .= strrev(pack("s",$the_crc));
            //End of Message
            $binarydata .= pack("c*",02);


            $response = PFC::send_message($socket, $binarydata, $message);
            return true;
    }
}
