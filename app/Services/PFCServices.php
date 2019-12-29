<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use App\Models\PFC as PfcModel;
use DB;

class PFCServices extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function create_socket($pfc = false) {
    	$address = $pfc->ip;
		$port = $pfc->port;
        ini_set( 'default_socket_timeout', 99999999);
		/* Create a TCP/IP socket. */
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
		} else {
			echo "socket successfully created.\n";
		}

		echo "Attempting to connect to '$address' on port '$port'...";
		$result = socket_connect($socket, $address, $port);
		if ($result === false) {
			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
			return false;
		} else {
			echo "successfully connected to $address.\n";
			return $socket;
		}
    }
	
	//Create CRC16 for message validation
    public static function crc16($data) { 
	   $poly = 0x8005; 
	   $xor = 0xffff; 

	   $crc = 0; 
	   $len = strlen($data); 
	   $i = 0; 
	   while ($len--) { 
		  $crc ^= ord($data[$i++]) << 8; 
		  $crc &= 0xffff; 
		  for ($j = 0; $j < 8; $j++){ 
			 $crc = ($crc & 0x8000) ? ($crc << 1) ^ $poly : $crc << 1; 
			 $crc &= 0xffff; 
		  } 
	   } 
	   //$crc ^= $xor; 
	   return $crc; 
	}
	
	//Convert to binary
    public static function conver_to_bin($var){
		
		$hex 	=  (string)"0".strtoupper(dechex($var));
		
		$bin 	=	 hex2bin ($hex);
		
		return $bin; 
	}
	
	//Validate the returned message from PFC
    public static function validate_message($message){
		if(!isset($message[1]) || !isset($message[2])){
			return false;
		}

		$message_length = count($message);

		if($message[1] != '1' && $message[$message_length] != 2){
			return false;
		}
		
		if(($message_length -2) != $message[2]){
			return false;
		}
		
		return true;
	}

    //Validate the returned message from PFC
    public static function send_message($socket, $binarydata, $message = null){
        $j = 1;
        while(true) {
            //Send Message to the socket
            socket_write($socket, $binarydata);
            //Wait for message to be created
            usleep(150000);
            //Read the reply
            $input = socket_read($socket, 2048);
			if(!$input){
				return '-2';
			}
            //Convert reply to array
            $response = unpack("c*", $input);
            $validation = self::validate_message($response);
            if (!$validation) {
                if(count($response) == 0){
                    return false;
                    usleep(150000);
                }
                echo 'Invalid Transactions<bd>';
                sleep(1);
                if($j == 3){
                    return false;
                    break;
                }
                $j++;
                continue;
            }

            return $response;
            //break;
        }
    }
	/*
     * type 1 - Activate Card
     * type 2 - Activate Card Response
     * type 3 - Activate Card with Discounts
     * type 4 - Activate Card with Discounts Response
     * type 5 - Read Transaction
     * type 6 - Transaction Data
     * type 7 - Lock Transaction
     * type 8 - Lock Transaction Response
     * type 9 - Clear Transaction 
     * type 10 - Clear Transaction Response
     * type 11 - Prepay Command
     * type 12 - Prepay Command Response
	 * type 13 - Preset Command
     * type 14 - Preset Command Response
     * type 15 - Preset Command Response
     * type 16 - Preset Command Response
     */
	public static  function storeLogs($channel, $sl_no, $type, $command){

		$data = array(
		 'channel_id' => $channel,
		 'type' => $type,
		 'command' => serialize($command),
		 'created_at' => time()
		);
		
		DB::table('tracking')->insert(
			 $data
		);
    }	
	
}
