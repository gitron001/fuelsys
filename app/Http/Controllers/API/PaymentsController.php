<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\Users;
use GuzzleHttp\Client;
use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;

class PaymentsController extends Controller
{
    /*****  EXPORT FUNCTIONS *****/

    // Local call to Server (Export Payments from local DB to Server)
    public function getAllPayments(){

        $access_token = config('token.access_token');
        $payments = Payments::where(function ($query) {
            $query->where('exported', 0)
                  ->orWhere('exported', NULL);
        })->where(function ($query) {
            $query->where('company_id', 0)
                  ->orWhere('company_id',NULL);
        })->get();

        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);
            $url = 'http://fuelsystem.alba-petrol.com/api/payments/create';
            
            $response = $client->request('POST', $url, [
                'json' => $payments
            ]);
            
            $inserted_id = json_decode($response->getBody()->getContents());
			
			Payments::whereIn('id',$inserted_id->inserted_payment)->update(['exported'=> 1]);
			
            return $response->getBody();

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to insert payment into server / Unauthenticated",
                "message" => $e->getMessage()
            ]);
        }
    }

    // Server response (Export Payments from local DB to Server)
    public function createPayment(Request $request){
        $response = $request->all();
        $inserted_payment = array();
       
        foreach($response as $data) {

            $user_id = Users::select('id')->where('branch_id',Session::get('branch_id'))->where('branch_user_id',$data['user_id'])->first();
            $created_by = Users::select('id')->where('branch_id',Session::get('branch_id'))->where('branch_user_id',$data['created_by'])->first();
            $edited_by = Users::select('id')->where('branch_id',Session::get('branch_id'))->where('branch_user_id',$data['edited_by'])->first();
            $payments = Payments::where('branch_payment_id', $data['id'])->where('branch_id', Session::get('branch_id'))->first();

            if($user_id) {
				if(!$payments){
					$payments   = Payments::insertGetId([
						'date'        => $data['date'],
                        'amount'      => $data['amount'],
						'description' => !empty($data['description']) ? $data['description'] : NULL,
						'user_id'     => $user_id->id,
                        'company_id'  => $data['company_id'],
                        'type'        => $data['type'],
						'created_by'  => $created_by->id,
						'edited_by'   => !empty($edited_by->id) ? $edited_by->id : NULL,
						'created_at'  => now()->timestamp,
                        'updated_at'  => now()->timestamp,
                        'branch_id'   => Session::get('branch_id'),
						'branch_payment_id' => $data['id'],
                    ]);
                    
                    $inserted_payment[] = $data['id'];
				}
           }
        
        }

        return response()->json([
            'response'  => 'Success',
            'inserted_payment' => $inserted_payment,
        ], 201);
          
    }
    /***  END EXPORT FUNCTIONS ***/

    /*****  IMPORT FUNCTIONS *****/

    // Local call to Server (Import Payments from Server to local DB)
    public function getServerPayments(){
        $access_token = config('token.access_token');

        $last_inserted  = Payments::where('exported',1)
                            ->where('created_at', Payments::max('created_at'))
                            ->orderBy('created_at','desc')
                            ->first();
        
        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);

            $url = 'http://fuelsystem.alba-petrol.com/api/payments/export_server';
			
            $response = $client->request('POST', $url, [
                'json' => $last_inserted
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error!",
                "message" => $e->getMessage()
            ]);
        }

        $online_response = $response->getBody()->getContents();
        $data            = json_decode($online_response);

        foreach($data as $payment){
            Payments::insert([
                'date'        => $payment->date,
                'amount'      => $payment->amount,
                'description' => !empty($payment->description) ? $payment->description : NULL,
                'user_id'     => $payment->user_id,
                'company_id'  => $payment->company_id,
                'type'        => $payment->type,
                'created_by'  => $payment->id,
                'edited_by'   => !empty($payment->edited_by) ? $payment->edited_by : NULL,
                'created_at'  => now()->timestamp,
                'updated_at'  => now()->timestamp,
                'branch_id'   => $payment->branch_id,
            ]);
        }

        return response()->json([
            'response'  => 'Success',
        ], 201);
    }

    // Server response (Import Payments from Server to local DB)
    public function sendServerPayments(Request $request){
        $response = $request->all();

        $payments = Payments::where('created_at','>=',$request->created_at)
                            ->where('branch_id',Session::get('branch_id'))
                            ->get();
        
        return response($payments,201);
    }

    /***  END IMPORT FUNCTIONS ***/
}
