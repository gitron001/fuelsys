<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
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
						'description' => $data['description'],
						'user_id'     => $user_id->id,
						'company_id'  => $data['company_id'],
						'created_by'  => $created_by,
						'edited_by'   => $edited_by,
						'created_at'  => now()->timestamp,
                        'updated_at'  => now()->timestamp,
                        'branch_id'   => Session::get('branch_id'),
						'branch_payment_id' => $data['id'],
					]);
				}
            
                $inserted_paymnet[] = $data['id'];
           }

        return response()->json([
            'response'  => 'Success',
            'inserted_paymnet' => $inserted_paymnet,
        ], 201);

        }  
    }
}
