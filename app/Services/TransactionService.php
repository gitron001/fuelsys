<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Users;
use App\Jobs\PrintFuelRecept;

class TransactionService extends ServiceProvider
{
    /**
     * Check transactions
     *
     * Lock Transaction and call store function if there is one
     */
    public static function read($socket = null, $pfc_id = 1) {
        if($socket === null) {
            $pfc    = PfcModel::where('id', $pfc_id)->first();
            $socket = PFC::create_socket($pfc);
        }

        //Get all transaction by channel
        $message = "\x1\x5\x2\x1";
        $the_crc = PFC::crc16( $message);

        $binarydata = pack("c*", 0x01)
            .pack("c*",0x05)
            .pack("c*",0x02)
            .pack("c*",0x1)
            .strrev(pack("s",$the_crc))
            .pack("c*",02);


        $response = PFC::send_message($socket, $binarydata);
        //print_r($response);
		
		if(!$response)
		{ 
			return false; 
		}elseif(!is_array($response)) 
		{
			echo 'empty response';
			print_r($response);
			return false; 
		}
		
        $total_msg_legth = count($response);
        for($i = 4; $i <= $total_msg_legth; $i+= 4) {
            if ($response[$i] == 1) {
                 $channel = (($i/4));
                //Lock status transaction
                $status = 1;
                $changed_status = self::transaction_status($channel, $status, $socket);
                usleep(150000);
                self::read_data($socket, $channel, $pfc_id);
                if($changed_status)
                    echo 'UPDATED';
            }else if($response[$i] == 2){
                $channel = (($i/4));
                self::read_data($socket, $channel, $pfc_id);
            }
        }
        //LOCKED
        return true;

    }
    /**
     * Read Transaction data and call Clear Transaction function
     *
     *
     */
    public static function read_data($socket, $channel, $pfc_id) {
        $controller = Config::get('app.controller_id');
        $controller_id =  pack("C*", $controller );
        $channel_id =  pack("C*", $channel );

        //Generate CRC for the Transaction Message
        $message = "\x1\x6\x3".$channel_id.$controller_id;
        $the_crc = PFC::crc16( $message);

        //Read Transactions Message
        $binarydata = pack("c*", 0x01)
         .pack("c*",0x06)
         .pack("c*",0x03)
         .pack("C*", $channel )
         .pack("C*", $controller )
         .strrev(pack("s",$the_crc))
         .pack("c*",02);

        $response = PFC::send_message($socket, $binarydata);

		if(!$response){ return false; } 

        $transaction_id  =  Transaction::insertTransactionData($response, $pfc_id, $channel);
		
        //Clear status transaction
        $status = 2;

        //call job to update company balance
        //HERE

        $changed_status = self::transaction_status($channel, $status, $socket);
		
		if(!$transaction_id){ return true; } 
		
        $recepit = new PrintFuelRecept($transaction_id);
        dispatch($recepit);
        echo 'stored';
        return true;
    }

     /**
         *Change Transaction status
         * Status 0 - unlock transaction
         * Status 1 - lock transaction
         * Status 2 - clear transaction
         * Status 3 - block dispanser
         * Status 4 - unblock dispanser
         * Status 5 - suspend fueling
         * Status 6 - resume fueling
     **/
    public static function transaction_status($channel, $status,  $socket) {
        $controller = Config::get('app.controller_id');
        $pos_id =  pack("C*", $controller);
        $bin_channel = pack("C*", $channel);
        $status_bin = pack("C*", $status);

        //Generate CRC for the Transaction Message
        $message = "\x1\x7\x82" .$bin_channel. $pos_id.$status_bin;
        $the_crc = PFC::crc16($message);

        //Clear Transactions Message
        $binarydata = pack("c*", 0x01)
            .pack("c*", 0x07)
            .pack("c*", 0x82)
            .pack("C*", $channel)
            .pack("C*", $controller)
            .pack("C*", $status)
            .strrev(pack("s", $the_crc))
            .pack("c*", 02);

        $response = PFC::send_message($socket, $binarydata);
		
        return true;
    }
}
