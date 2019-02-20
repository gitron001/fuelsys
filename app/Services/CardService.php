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
        while (true) {
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


            echo '<br> Card Number: '. $cardNumber;

            $the_card = Rfid::where("rfid", $cardNumber)->first();

            dd($the_card);
            echo ' -- Nozle 1 : '. $response[10];
            echo ' -- Nozle 2 : '. $response[11];
            echo ' -- Nozle 3 : '. $response[12];
            echo ' -- Nozle 4 : '. $response[13];
            echo ' -- Nozle 5 : '. $response[14];

            /*$length = count($response) - 3;
            for ($i = 3; $i <= $length; $i++) {
                if ($response[$i] == 2) {
                    $channel = ($i - 3);
                    self::activate_card($socket, $channel);
                }
            }*/
            //print_r($response);
            break;

        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public static function activate_card($socket, $channel = 1)
    {
        //exit($channel);
        while(true) {
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

            print_r(unpack("c*", $binarydata ));

            //Send Message to the socket
            socket_write($socket, $binarydata);
            //Read the reply
            $input = socket_read($socket, 2048);
            //Convert reply to array
           $response = unpack("c*", $input );

            $validation = PFC::validate_message($response);
            if(!$validation){
                echo 'Invalid Transactions<bd>';
                sleep(2);
                continue;
            }
            print_r($response);
            //socket_close($socket);
            break;
        }
    }
}
