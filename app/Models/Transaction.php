<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company as Company;
use App\Models\Users as Users;
use App\Models\Dispaneser as Dispaneser;
use App\Models\LiveTransaction as LiveTransaction;
use Session;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    protected $fillable = [
        'status', 
        'error_flag', 
        'locker', 
        'tr_no',
        'receipt_no',
        'pfc_id',
        'sl_no',
        'product_id',
        'dis_status',
        'price',
        'lit',
        'money',
        'dis_tot',
        'pfc_tot',
        'tr_status',
        'user_id',
        'ctype',
        'method',
        'bill_no',
        'test_user_id',
        'test_card_nr',
    ];

    public function getDateFormat(){
        return 'U';
    }
    
    public function dispaneser(){
        return $this->belongsTo('App\Models\Dispaneser');
    }

    public function users(){
        return $this->belongsTo('App\Models\Users','user_id', 'id');
    }
    
    public function product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'pfc_pr_id');
    }

    public function pfc(){
        return $this->belongsTo('App\Models\PFC');
    }

    public static function insertTransactionData($response, $pfc_id, $channel_id){
		
		$dispaneser = Dispaneser::where('channel_id', $channel_id)->first();
		
		$transaction_data 	 = Session::get($channel_id.'.transaction');	
		
        $transaction = new Transaction();

        $transaction->status = $response[4];

        $transaction->pfc_id = $pfc_id;

        $transaction->locker = $response[5];

        $tr_no = pack('c', $response[7]).pack('c', $response[6]);
        $tr_no = unpack('s', $tr_no)[1];

        $transaction->tr_no = $tr_no;
		if(!isset($response[8])){ return false; }
        $transaction->sl_no = $response[8];

        $transaction->product_id = $response[9];

        $transaction->dis_tot = $response[10];

        $price = pack('c', $response[12]).pack('c', $response[11]);
        $price = unpack('s', $price)[1];
        $transaction->price = number_format(($price/(int)$dispaneser->price_division),2, '.', '');

        $lit = pack('c', $response[16]).pack('c', $response[15]).pack('c', $response[14]).pack('c', $response[13]);
        $lit = unpack('i', $lit)[1];
        $transaction->lit = number_format(($lit/(int)$dispaneser->lit_division),2, '.', '');

        $money = pack('c', $response[20]).pack('c', $response[19]).pack('c', $response[18]).pack('c', $response[17]);
        $money = unpack('i', $money)[1];
        $transaction->money = number_format(($money/(int)$dispaneser->money_division),2, '.', '');

        $dis_tot = pack('c', $response[24]).pack('c', $response[23]).pack('c', $response[22]).pack('c', $response[21]);
        $dis_tot = unpack('i', $dis_tot)[1];
        $transaction->dis_tot = $dis_tot;


        $pfc_tot = pack('c', $response[28]).pack('c', $response[27]).pack('c', $response[26]).pack('c', $response[25]);
        $pfc_tot = unpack('i', $pfc_tot)[1];
        $transaction->pfc_tot = $pfc_tot;

        $transaction->tr_status = $response[29];

        $rfid = pack('c', $response[33]).pack('c', $response[32]).pack('c', $response[31]).pack('c', $response[30]);
        $rfid = unpack('i', $rfid)[1];

        $user = Users::where("rfid", (int)$transaction_data['user_card'])->where('status', 1)->first();
		
		/*if(isset($user->id)){


			$transaction->user_id = $user->id;
		}else{
			$transaction->user_id = $rfid;
			//echo $rfid;
		}*/

		$transaction->user_id = $user->id;
		
        $transaction->channel_id = $channel_id;

        $transaction->ctype = $response[34];

        $transaction->method = $response[35];
			
		
        $transaction->bonus_user_id = (int) $transaction['bonus_card'];
        //$transaction->test_card_nr = $transaction_data['user_card'];
		
        $transaction->method = $response[35];

        $bill_no = pack('c', $response[37]).pack('c', $response[36]);
        $bill_no = unpack('s', $bill_no)[1];
        $transaction->bill_no = $bill_no;
		
        $saved = $transaction->save();
		
		if(!$saved){
			return false;
		}
		
		
		if(!is_null($user->company->id)){			
						
			if($user->company->has_limit == 1){
				$company = Company::find( $user->company->id );
				$company->limit_left -= $transaction->money;
				$company->save();
			}
			
		}elseif($user->has_limit == 1){
			$user->limit_left -= $transaction->money;
			$user->save();
		}
		
		

        return $transaction->id;

    }

	public static function insertTransactionDataLive($response, $pfc_id, $channel_id){
		
		$dispaneser = Dispaneser::where('channel_id', $channel_id)->first();
		
		$transaction_data 	 = Session::get($channel_id.'.transaction');	
		
        $transaction = new LiveTransaction();

        $transaction->status = $response[4];

        $transaction->pfc_id = $pfc_id;

        $transaction->locker = $response[5];

        $tr_no = pack('c', $response[7]).pack('c', $response[6]);
        $tr_no = unpack('s', $tr_no)[1];

        $transaction->tr_no = $tr_no;
		if(!isset($response[8])){ return false; }
        $transaction->sl_no = $response[8];

        $transaction->product_id = $response[9];

        $transaction->dis_tot = $response[10];

        $price = pack('c', $response[12]).pack('c', $response[11]);
        $price = unpack('s', $price)[1];
        $transaction->price = number_format(($price/(int)$dispaneser->price_division),2, '.', '');

        $lit = pack('c', $response[16]).pack('c', $response[15]).pack('c', $response[14]).pack('c', $response[13]);
        $lit = unpack('i', $lit)[1];
        $transaction->lit = number_format(($lit/(int)$dispaneser->lit_division),2, '.', '');

        $money = pack('c', $response[20]).pack('c', $response[19]).pack('c', $response[18]).pack('c', $response[17]);
        $money = unpack('i', $money)[1];
        $transaction->money = number_format(($money/(int)$dispaneser->money_division),2, '.', '');

        $dis_tot = pack('c', $response[24]).pack('c', $response[23]).pack('c', $response[22]).pack('c', $response[21]);
        $dis_tot = unpack('i', $dis_tot)[1];
        $transaction->dis_tot = $dis_tot;


        $pfc_tot = pack('c', $response[28]).pack('c', $response[27]).pack('c', $response[26]).pack('c', $response[25]);
        $pfc_tot = unpack('i', $pfc_tot)[1];
        $transaction->pfc_tot = $pfc_tot;

        $transaction->tr_status = $response[29];

        $rfid = pack('c', $response[33]).pack('c', $response[32]).pack('c', $response[31]).pack('c', $response[30]);
        $rfid = unpack('i', $rfid)[1];

        $user = Users::where("rfid", (int)$transaction_data['user_card'])->where('status', 1)->first();
		
		/*if(isset($user->id)){


			$transaction->user_id = $user->id;
		}else{
			$transaction->user_id = $rfid;
			//echo $rfid;
		}*/

		$transaction->user_id = $user->id;
		
        $transaction->channel_id = $channel_id;

        $transaction->ctype = $response[34];

        $transaction->method = $response[35];
			
		
        $transaction->bonus_user_id = (int) $transaction['bonus_card'];
        //$transaction->test_card_nr = $transaction_data['user_card'];
		
        $transaction->method = $response[35];

        $bill_no = pack('c', $response[37]).pack('c', $response[36]);
        $bill_no = unpack('s', $bill_no)[1];
        $transaction->bill_no = $bill_no;
		
        $saved = $transaction->save();
		
		if(!$saved){
			return false;
		}
		
		
		if(!is_null($user->company->id)){			
						
			if($user->company->has_limit == 1){
				$company = Company::find( $user->company->id );
				$company->limit_left -= $transaction->money;
				$company->save();
			}
			
		}elseif($user->has_limit == 1){
			$user->limit_left -= $transaction->money;
			$user->save();
		}
		
		

        return $transaction->id;

    }


    public static function generateInvoiceNr($tran_id){
        //get last record
		$transactoin = Transaction::find($tran_id);
		if($transactoin->receipt_no != NULL){
			return true;
		}
		
        $record = Transaction::where('receipt_no','!=', '')->where('receipt_no','!=', 0)->latest()->first();
        if(isset($record->receipt_no)){
            $expNum = explode('-', $record->receipt_no);
        }else{
            $expNum[0]  = 0;
        }

        //check first day in a year
        if ( $expNum[0] != date('Y') || !isset($record->receipt_no) ){
            $nextInvoiceNumber = date('Y').'-00001';
        } else {
            //increase 1 with last invoice number
            $expNum[1] = ++$expNum[1];
            $nextInvoiceNumber = $expNum[0].'-'. str_pad($expNum[1], 5, '0', STR_PAD_LEFT);
        }

        
        $transactoin->receipt_no = $nextInvoiceNumber;
        $transactoin->save();

    }
}
