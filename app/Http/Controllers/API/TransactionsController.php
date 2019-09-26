<?php

namespace App\Http\Controllers\API;


use Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Users;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;


class TransactionsController extends Controller
{

    public function importTransactions(Request $request) {
       $response = $request->all();
       $inserted_transaction = array();
       
       foreach($response as $data) {
           $user_id = Users::select('id')->where('branch_id',Session::get('branch_id'))->where('branch_user_id',$data['user_id'])->first();
           $transaction = Transaction::where('branch_transaction_id', $data['id'])->where('branch_id', Session::get('branch_id'))->first();
           if($user_id) {
				if(!$transaction){
					$transaction = Transaction::insertGetId([
						'status'        => $data['status'],
						'locker'        => $data['locker'],
						'tr_no'         => $data['tr_no'],
						'channel_id'    => $data['channel_id'],
						'receipt_no'    => $data['receipt_no'],
						'sl_no'         => $data['sl_no'],
						'pfc_id'        => $data['pfc_id'],
						'product_id'    => $data['product_id'],
						'dis_status'    => $data['dis_status'],
						'price'         => $data['price'],
						'lit'           => $data['lit'],
						'money'         => $data['money'],
						'dis_tot'       => $data['dis_tot'],
						'pfc_tot'       => $data['pfc_tot'],
						'tr_status'     => $data['tr_status'],
						'user_id'       => $user_id->id,
						'branch_id'     => Session::get('branch_id'),
						'branch_transaction_id' => $data['id'],
						'ctype'         => $data['ctype'],
						'method'        => $data['method'],
						'bill_no'       => $data['bill_no'],
						'created_at'    => $data['created_at'],
						'updated_at'    => $data['updated_at'],
					]);
				}
            
                $inserted_transaction[] = $data['id'];
           }
           
        } 
       
        return response()->json([
            'response'  => 'Success',
            'inserted_transaction' => $inserted_transaction,
        ], 201);
       
    }
    
    public function getAllTransactions() {

        ini_set("memory_limit", "-1");
		set_time_limit(0);
		
        $transactions = Transaction::where('exported',0)->limit(1000)->get();
		
        $access_token = config('token.access_token');
		
        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);
            $url = 'http://fuelsystem.alba-petrol.com/api/transactions/create';
            
            $response = $client->request('POST', $url, [
                'json' => $transactions
            ]);
            
            $inserted_id = json_decode($response->getBody()->getContents());
            /*$data = json_decode($inserted_id);
            foreach($data->inserted_transaction as $key){
                foreach($key as $value){
                    Transaction::where('id',$value)->update(['exported'=> 1]);
                }
            }*/
			
			Transaction::whereIn('id',$inserted_id->inserted_transaction)->update(['exported'=> 1]);
			dd($inserted_id->inserted_transaction);
            return $response->getBody();

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to insert transaction into server / Unauthenticated",
                "message" => $e->getMessage()
            ]);
        }
        
    }
}
