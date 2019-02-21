<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Rfid;

class CardService extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function check_readers()
    {
        $socket = PFC::create_socket();
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
                self::check_card($socket, $channel);
            }
        }
        //print_r($response);
        socket_close($socket);
     }


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

            if($the_card->limits){

            }

            if(count($the_card->discounts) == 0){
                //self::activate_card($socket, $channel);
                echo 'no discounts';
            }else{
                $all_discounts = array();
                for($i = 10; $i < 15; $i++){
                    foreach($the_card->discounts as $discount){
                        if($discount->id == $response[$i]){
                            $all_discounts[$i] = array($discount->product->price - $discount->discount);
                        }
                    }
                }
                for($i = 10; $i < 15; $i++){
                    if(!isset($all_discounts[$i] )){
                        foreach($the_card->discounts as $discount) {
                            if($discount->id == $response[$i]){
                                $all_discounts[$i] = array($discount->product->price);
                            }
                        }
                    }
                }
                dd($all_discounts);
               self::activate_card_discount($socket, $channel, $all_discounts);
            }

            echo ' -- Nozle 1 : '. $response[10];
            echo ' -- Nozle 2 : '. $response[11];
            echo ' -- Nozle 3 : '. $response[12];
            echo ' -- Nozle 4 : '. $response[13];
            echo ' -- Nozle 5 : '. $response[14];
    }

    /**
     * Register services.
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

            $response = PFC::send_message($socket, $binarydata, $message);

            return true;
    }
    /**
     * Register services.
     *
     * @return void
     */
    public static function activate_card_discount($socket, $channel, $all_discounts) {
            //Get all transaction by channel
            $channel_id = PFC::conver_to_bin($channel);
            $command    = PFC::conver_to_bin('3');
            $message = "\x1\x11\x8A".$channel_id.$command.$command;
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
            //CRC
            $binarydata .= strrev(pack("s",$the_crc));
            //End of Message
            $binarydata .= pack("c*",02);

            $response = PFC::send_message($socket, $binarydata, $message);

            return true;
    }
}
