<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Users;
use App\Jobs\PrintFuelRecept;
use App\Jobs\SendTransactionEmail;
use App\Models\Dispaneser;
use Session;

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
                self::read_data($socket, $channel, $pfc_id, $response[$i]);
                if($changed_status)
                    echo 'UPDATED';
            }else if($response[$i] == 2){
                $channel = (($i/4));
                self::read_data($socket, $channel, $pfc_id, $response[$i]);
            }else if($response[$i] == 5){
                //Nozzle lifted
				$channel = (($i/4));
                //self::read_data($socket, $channel, $pfc_id, $response[$i]);
            }else if($response[$i] == 3){
				$channel = (($i/4));
				self::read_data($socket, $channel, $pfc_id, $response[$i]);
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
    public static function read_data($socket, $channel, $pfc_id, $type) {
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
		
		
		PFC::storeLogs($channel, null, 5, unpack('c*', $binarydata));
        
		$response = PFC::send_message($socket, $binarydata);
		
		PFC::storeLogs($channel, null, 6, $response);
		
		if(!$response){ return false; } 
		if($type == 3){			
			$transaction_id  =  Transaction::insertTransactionDataLive($response, $pfc_id, $channel, $type);			
		}else{
			$transaction_id  =  Transaction::insertTransactionData($response, $pfc_id, $channel, $type);
			
			//Clear status transaction
			$status = 2;

			//call job to update company balance
			//HERE
			if(!$transaction_id){ return true; } 
			
			if($type == 1 || $type == 2){
				$changed_status = self::transaction_status($channel, $status, $socket);
			}
			
			$recepit = new PrintFuelRecept($transaction_id);
			dispatch($recepit);
			
			$recepit = new SendTransactionEmail($transaction_id);
			dispatch($recepit);
			
			echo 'stored';
			return true;
		}
    }

	/* 
	*Reading Channel Totalizers.
	*
	*/
	
	public static function readLiveData($socket = null, $pfc_id = 1){
        //Generate CRC for the Transaction Message
        $message = "\x1\x4\x7";
        $the_crc = PFC::crc16($message);

        //Clear Transactions Message
        $binarydata = pack("c*", 0x01)
            .pack("c*", 0x04)
            .pack("c*", 0x07)
            .strrev(pack("s", $the_crc))
            .pack("c*", 02);	
			
			//PFC::storeLogs(1, null, 17, unpack('c*', $binarydata));
			
			$response = PFC::send_message($socket, $binarydata);
			
			//PFC::storeLogs(1, null, 18, $response);		
			
			$channel_nr = ($response[2] - 4) / 4;
			
			for($i = 0; $i < $channel_nr; $i ++){
					$row = 4 + ($i * 4);
					$amount = pack('c', $response[$row+3]).pack('c', $response[$row+2]).pack('c', $response[$row+1]).pack('c', $response[$row]);
					$amount = unpack('i', $amount)[1];
					if($amount == 0){ continue; }
					$channel_id 					 		= ($i+1);
					$transaction_data 	 			  		= Session::get($channel_id.'.transaction');	
					$the_dispanser 					  		= Dispaneser::where('channel_id', $channel_id)->first();
					$the_dispanser->current_amount 	  		= (int)$amount;
					$the_dispanser->current_user_id   		= (int)$transaction_data['user_id'];
					$the_dispanser->current_bonus_user_id   = (int)$transaction_data['bonus_card'];
					$the_dispanser->status			   		= 3;
					$the_dispanser->data_updated_at   		= time();
					$the_dispanser->save();
					//Send Message to websocket for view update
			}
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
		
		if($status == 1){
			$type = 7;
		}elseif($status == 2){
			$type = 9;			
		}
		
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
				
		PFC::storeLogs($channel, null, $type, unpack('c*', $binarydata));
		
        $response = PFC::send_message($socket, $binarydata);
		
		PFC::storeLogs($channel, null, $type+1, $response);
		
        return true;
    }
}
