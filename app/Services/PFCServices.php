<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class PFCServices extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function create_socket() {
		$address = "192.168.1.197";
		$port = 40097;

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
    public static function send_message($socket, $binarydata, $message){
        while(true) {
            //Send Message to the socket
            socket_write($socket, $binarydata);
            //Wait for message to be created
            usleep(150000);
            //Read the reply
            $input = socket_read($socket, 2048);

            //Convert reply to array
            $response = unpack("c*", $input);
            $validation = self::validate_message($response);
            if (!$validation) {
                echo 'Invalid Transactions<bd>';
                sleep(1);
                continue;
            }

            return $response;
            //break;
        }
    }
}
