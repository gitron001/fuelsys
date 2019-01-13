<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;

class CardService extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function check_readers()
    {
        while(true) {

            $socket = PFC::create_socket();

            //Get all transaction by channel
            $message = "\x1\x4\x9";
            $the_crc = PFC::crc16( $message);

            $binarydata = pack("c*", 0x01).pack("c*",0x04).pack("c*",0x09).strrev(pack("s",$the_crc)).pack("c*",02);

            //Send Message to the socket
            socket_write($socket, $binarydata);
            //Read the reply
            $input = socket_read($socket, 2048);
            //Convert reply to array
            $response = unpack("c*", $input );

            print_r($response);
            socket_close($socket);
            break;
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function activate_card($socket, $channel = 1)
    {
        while(true) {
            //Get all transaction by channel
            $channel_id = PFC::conver_to_bin($channel);
            $message = "\x1\x4\x9";
            $the_crc = PFC::crc16($message);

        }
    }
}
