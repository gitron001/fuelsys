<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\ServiceProvider;
use App\Services\PFCServices as PFC;
use Config;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\Products;
use App\Models\PFC as PfcModel;
use App\Models\Bonus_request as Bonus;
use App\Models\FaileAttempt as FaileAttempt;
use DB;
use App\Services\TransactionService;
use App\Services\DispanserService;
use Session;
use App\Events\NewMessage;
use App\Models\Dispaneser as Dispaneser;

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
	
		if($response == '-2'){
			dd('-2');
		}
		
		if(!$response){ return false; } 
		
        //Get all transaction by channel
        $length = count($response) - 3;
        for($i = 3; $i <= $length; $i++){
            if($response[$i] == 2){
                $channel = ($i - 3);
                self::check_card($socket, $channel, $pfc_id);
            }elseif($response[$i] == 4){
                $channel = ($i - 3);
				echo 'activete';
                self::activate_card($socket, $channel, 4);
            }
        }
		
        return true;
     }

    /**
     * Validate Card and call authorization function
     *
     *
     */
    public static function check_card($socket, $channel = 1, $pfc_id) {

        //Get all transaction by channel
        $channel_id = pack("c*", $channel);
        $message = "\x1\x5\x0A" . $channel_id;
        $the_crc = PFC::crc16($message);
		$time_difference = (time() - 20);
        $binarydata = pack("c*", 0x01)
            . pack("c*", 0x05)
            . pack("c*", 0x0A)
            . pack("c*", $channel)
            . strrev(pack("s", $the_crc))
            . pack("c*", 02);		

        $response = PFC::send_message($socket, $binarydata, $message);
		
		if(!$response){ return false; } 
		if(!isset($response[8])){ return false; } 
		
        $cardNumber = pack('c', $response[8]).pack('c', $response[7]).pack('c', $response[6]).pack('c', $response[5]);
        $cardNumber = unpack('i', $cardNumber)[1];
		
        $user = Users::where("rfid", $cardNumber)->where('status', 1)->first();
        $card_count = Users::where("rfid", $cardNumber)->where('status', 1)->count();
		
        if($card_count == 0 ){ self::storeFailedAttempt($channel, $cardNumber, $pfc_id, 1); return false; }
		
        if($user->status != 1 ){ self::storeFailedAttempt($channel, $cardNumber, $pfc_id, 2); return false; }
	
        if($user->company->status != 1 &&  $user->company->status != 4){ return false; }
	
		if(in_array($user->type, array(6,7,8))){
			
			Bonus::where('pfc_id', $pfc_id)->where('channel_id', $channel)->delete();
			
			Bonus::insert(
				array(
						'pfc_id'   	   =>   $pfc_id,
						'channel_id'   =>   $channel,							
						'user_id'      =>   $user->id,							
						'created_at'   =>   time(),							
						'updated_at'   =>   time()							
				 )
			);
			return true;
		}
		
        //Call Function to check limit
        $limit = false;
        if(!is_null($user->company->id) && $user->company->has_limit == 1){
           $limit = true;
           $company = Company::where('id', $user->company->id)->first();
           $limit_left = (int) $company->limit_left;
        }elseif($user->has_limit == 1){
            $limit = true;
            $limit_left = (int) $user->limit_left;
        }

        if($limit){		
            if($limit_left <= 0){
				return false;
            }else{
				$limit_left = $limit_left*100;
                self::setPrepay($socket, $channel, $limit_left);
            }
        }
		
		if(!empty($user->one_time_limit) && $user->one_time_limit != 0){
			$liters = $user->one_time_limit*100;
            self::setPreset($socket, $channel, str_replace('.', '', $liters));
		}
		//unblock
		//
		//self::activate_card($socket, $channel, 4);	
		$text = ' '.trim($user->name).' '.trim($user->plates);
		self::screenMessage($socket, $channel, $text);
        echo 'ACTIVATE';
		
		
		$the_dispanser 					  		= Dispaneser::where('channel_id', $channel)->first();
		//Checking is a transaction is running or not saved
		if((int)$the_dispanser->status == 3){
			echo 'Runing';
			if($the_dispanser->data_updated_at < (time()-40)){
				echo 'Saving Missing';
				self::storeMissingTransaction($socket, $channel, $the_dispanser, $pfc_id);
			}else{
				echo 'Runing';
				return true;			
			}
		}
		
		$transaction_data = array();
		$transaction['bonus_card'] = NULL;
		if(count($user->discounts) == 0 && count($user->company->discounts) == 0){			
			$bonus_requst = Bonus::where('channel_id', $channel)
							->where('pfc_id', $pfc_id)
							->where('created_at', '>', $time_difference)
							->first();	
			
			if(isset($bonus_requst->user_id)){
				$transaction['bonus_card'] = $bonus_requst->user_id;
				$all_discounts = self::generate_discounts($bonus_requst->user_id, $response, $pfc_id);
				self::activate_card_discount($socket, $channel, $all_discounts);
				$the_dispanser->current_bonus_user_id   = $bonus_requst->user_id;						
			}else{				
				self::activate_card($socket, $channel);
			}			
        }else{
			//self::activate_card($socket, $channel, 4);
            $all_discounts = self::generate_discounts($user->id, $response, $pfc_id);
			
            self::activate_card_discount($socket, $channel, $all_discounts);
        }
		$transaction['user_card']	= $cardNumber;
		$transaction['user_id']		= $user->id;
		$transaction['user_name']	= $user->name;
		Session::put($channel.'.transaction', $transaction);
		Session::save();
		//Update Dispanser to request Activation Status
		$the_dispanser->current_amount 	  		= 0;
		$the_dispanser->current_user_id   		= $user->id;
		$the_dispanser->status			   		= 2;
		$the_dispanser->data_updated_at   		= time();
		$the_dispanser->save();
		//Send Message to websocket for view update
		$data = array(
			'channel_id' => $channel,
			'username' 	 => $user->name,
			'status'	 => 2,
			'amount'	 => 0
		);
		
		event(new NewMessage($data));
        return true;
    }

    /**
     * Authorize Card without set prices
     */
    public static function activate_card($socket, $channel = 1, $status = 3) {
            //Get all transaction by channel
            $channel_id = pack("C*", $channel);
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
			
			PFC::storeLogs($channel, null, 1, unpack('c*', $binarydata));
			
            $response = PFC::send_message($socket, $binarydata, $message);
			
			PFC::storeLogs($channel, null, 2,  $response);

            return true;
    }
    
	/**
     * Authorize card with  set prices
    */
    public static function activate_card_discount($socket, $channel, $all_discounts) {
            //Get all transaction by channel
            $channel_id = pack("C*", $channel);
            $command    = pack("c*", 0x03);
            $prices     = "";
			
            for($i = 10; $i < 15; $i++){
                $prices    .= strrev(pack('s', str_replace('.', '', $all_discounts[$i])));
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
			
			
			PFC::storeLogs($channel, null, 3, unpack('c*', $binarydata));
			
            $response = PFC::send_message($socket, $binarydata, $message);
			
			PFC::storeLogs($channel, null, 4, $response);
		
            return true;
    }

    public static function setPrepay($socket, $channel, $limit_left) {
        //Get all transaction by channel
        $channel_id = pack("C*", $channel);
        $limit_left_bin = strrev(pack("I",$limit_left));
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
        $binarydata .= strrev(pack("I",$limit_left));
        //CRC
        $binarydata .= strrev(pack("s",$the_crc));
        //End of Message
        $binarydata .= pack("c*",02);		
		
		PFC::storeLogs($channel, null, 11, unpack('c*', $binarydata));
		
		$response = PFC::send_message($socket, $binarydata, $message);
		
		PFC::storeLogs($channel, null, 12,  $response);

        return true;
    }
	
	public static function setPreset($socket, $channel, $liters) {
        //Get all transaction by channel
        $channel_id = pack("C*", $channel);
        $limit_left_bin = strrev(pack("I",$liters));
        $message = "\x1\x9\x8E".$channel_id.$limit_left_bin;
        $the_crc = PFC::crc16($message);
        //Start of mesasge
        $binarydata = pack("c*", 0x01);
        //Length
        $binarydata .= pack("c*",0x09);
        //Command
        $binarydata .= pack("c*",0x8E);
        //Message
        $binarydata .= pack("C*", $channel);
        //Command
        $binarydata .= strrev(pack("I",$liters));
        //CRC
        $binarydata .= strrev(pack("s",$the_crc));
        //End of Message
        $binarydata .= pack("c*",02);		
		
		PFC::storeLogs($channel, null, 13, unpack('c*', $binarydata));
		
		$response = PFC::send_message($socket, $binarydata, $message);
		
		PFC::storeLogs($channel, null, 14,  $response);

        return true;
    }
	
	public static function screenMessage($socket, $channel, $text) {
        //Get all transaction by channel
        $channel_id 	= pack("C*", $channel);
		$screenText     = "";
		$text_length	= (int) strlen($text) + 5;
		$text_array		= str_split($text);
		$length_bin		= pack('c*', $text_length);
		for($i = 0; $i < ($text_length - 5); $i++){
			$screenText    .= pack('a*',  $text_array[$i]);
		}
        $message = "\x1".$length_bin."\x8B".$channel_id.$screenText;
        $the_crc = PFC::crc16($message);
        //Start of mesasge
        $binarydata = pack("c*", 0x01);
        //Length
        $binarydata .= $length_bin;
        //Command
        $binarydata .= pack("c*",0x8B);
        //Message
        $binarydata .= pack("C*", $channel);
        //Command
        $binarydata .= $screenText;
        //CRC
        $binarydata .= strrev(pack("s",$the_crc));
        //End of Message
        $binarydata .= pack("c*",02);		
		
		PFC::storeLogs($channel, null, 15, unpack('c*', $binarydata));
		
		$response = PFC::send_message($socket, $binarydata, $message);
		
		PFC::storeLogs($channel, null, 16,  $response);
		
        return true;
    }
	
	public static function generate_discounts($user_id, $response, $pfc_id){
		$all_discounts = array();
		$user	= Users::find($user_id);
		
		for($i = 10; $i < 15; $i++){
			foreach($user->discounts as $discount){
				if(!isset($discount->product_details->price) || is_null($discount->product_details->price)){ continue; }
				if($discount->product_details->pfc_pr_id == $response[$i]){
					$all_discounts[$i] = (int)($discount->product_details->price - ($discount->discount*1000));
					break;
				}
			}
			//If there is not Discount on RFID check for Company Discount
			if(!isset($all_discounts[$i])){
				foreach($user->company->discounts as $c_discount){
					if(is_null($c_discount->product_details->price)){ continue; }
					if($c_discount->product_details->pfc_pr_id == $response[$i]) {
						$all_discounts[$i] = (int)($c_discount->product_details->price - ($c_discount->discount*1000));
						break;
					}
				}
			}

			if(!isset($all_discounts[$i])){
				if($response[$i] == 0){
					$all_discounts[$i] = 0000;
				}else{
					$products = Products::where('pfc_id', $pfc_id)->where('pfc_pr_id', $response[$i])->where('status', 1)->first();
					$all_discounts[$i] = (int)$products->price;
				}
			}
		}
		
		return $all_discounts;
		
	}
    /*
     * type 1 - not found
     * type 2 - inactive
     */
	public static  function storeFailedAttempt($channel, $rfid, $pfc_id, $type){

		$data = array(
		 'channel_id' => $channel,
		 'rfid' => $rfid,
		 'pfc_id' => $pfc_id,
		 'type' => $type
		);
		
		FaileAttempt::firstOrCreate($data);
    }

	/*
	* Store Transaction when there was a error on closing it
	*/
	public static function storeMissingTransaction($socket, $channel, $the_dispanser, $pfc_id){
		$responseTot = DispanserService::checkChannelTotalizers($socket, $channel, $pfc_id);
		$updated = false;
		$ch_user		= Users::find($the_dispanser->current_user_id);
		for($i = 0; $i < 5; $i++){
			$row = 5 + ($i * 4);
			$totalizer = pack('c', $responseTot[$row+3]).pack('c', $responseTot[$row+2]).pack('c', $responseTot[$row+1]).pack('c', $responseTot[$row]);
			$totalizer = unpack('i', $totalizer)[1];
			print_r($totalizer);
			echo '  -  ';
			if($totalizer == 0){ continue; }
			$last_transaction 					 	= Transaction::select('product_id','sl_no', 'dis_tot')->where('channel_id', $channel)->where('sl_no', $i+1)->latest('created_at')->first();
			if(isset($last_transaction->dis_tot) && $totalizer != $last_transaction->dis_tot){
				$data['lit'] 	= number_format( (($totalizer - $last_transaction->dis_tot) / 100), 2, '.', '');				
				if($the_dispanser->current_bonus_user_id != 0){
					$ch_b_user = Users::find($the_dispanser->current_bonus_user_id);
				}
				$last_product  = Products::where('pfc_pr_id', $last_transaction->product_id)->first();
				$data['price'] = $last_product->price;
				if(count($ch_user->discounts) != 0){
					foreach($ch_user->discounts as $ch_dis){
						if($ch_dis->product_details->pfc_pr_id == $last_transaction->product_id){
							$data['price'] = $data['price'] - ($ch_dis->discount*1000);
							break;
						}
					}
				}elseif(count($ch_user->company->discounts) != 0){
					foreach($ch_user->company->discounts as $ch_c_dis){
						if($ch_c_dis->product_details->pfc_pr_id == $last_transaction->product_id){
							$data['price'] = $data['price'] - ($ch_c_dis->discount*1000);
							break;
						}
					}							
				}elseif(isset($ch_b_user->discounts) && count($ch_b_user->discounts) != 0){
					foreach($ch_b_user->discounts as $ch_b_dis){
						if($ch_b_dis->product_details->pfc_pr_id == $last_transaction->product_id){
							$data['price'] = $data['price'] - ($ch_b_dis->discount*1000);
							break;
						}
					}								
				}elseif(isset($ch_b_user->discounts) && count($ch_b_user->company->discounts) != 0){
					foreach($ch_b_user->company->discounts as $ch_b_c_dis){
						if($ch_b_c_dis->product_details->pfc_pr_id == $last_transaction->product_id){
							$data['price'] = $data['price'] - ($ch_b_c_dis->discount*1000);
							break;
						}
					}								
				}
				$data['price']			= number_format(  ($data['price'] /  1000) ,2, '.', '');
				
				$data['money'] 			= number_format( ( $data['lit'] * $data['price'] ) ,2, '.', '');			
				$data['status']			= 2;
				$data['error_flag']		= 3;
				$data['locker']			= 11;
				$data['tr_no']			= 0;
				$data['channel_id']		= $channel;
				$data['sl_no']			= $last_transaction->sl_no;
				$data['pfc_id']			= $pfc_id;
				$data['product_id']		= $last_transaction->product_id;
				$data['dis_tot']		= $totalizer;
				$data['pfc_tot']		= 0;
				$data['dis_tot_last']	= $last_transaction->dis_tot;
				$data['tr_status']		= 0;
				$data['user_id']		= $the_dispanser->current_user_id;
				$data['bonus_user_id']	= $the_dispanser->current_bonus_user_id;
				$data['created_at']		= time();
				$data['updated_at']		= time();
				$transaction 			= Transaction::insertGetId($data);
				print_r($transaction);	
				
				$the_dispanser->current_amount 	  		= (int)($data['money']*100);
				$the_dispanser->status			   		= 1;
				$the_dispanser->data_updated_at   		= time();
				$the_dispanser->save();
				
				$data['channel_id'] = $channel;
				$data['username'] 	= $ch_user->name;
				$data['amount'] 	= $data['money'];
				$data['status'] 	= 1;
				event(new NewMessage($data));
				
				$recepit = new PrintFuelRecept($transaction->id);
				dispatch($recepit);
				
				$recepit = new SendTransactionEmail($transaction->id);
				dispatch($recepit);
				$updated = true;
				break;
			}				
		}
		
		if(!$updated){
				//$the_dispanser->current_amount 	  		= (int)($data['money']*100);
				$the_dispanser->status			   		= 1;
				$the_dispanser->data_updated_at   		= time();
				$the_dispanser->save();			
				
				$data['channel_id'] = $channel;
				$data['username'] 	= $ch_user->name;
				$data['amount'] 	= $the_dispanser->current_amount;
				$data['status'] 	= 1;
				event(new NewMessage($data));
		}
		return true;
	}
}
