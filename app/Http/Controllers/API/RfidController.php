<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\RFID_Discounts;
use App\Http\Controllers\Controller;

class RfidController extends Controller
{

    public function getAllUsers()
    {
        $users          = Users::get()->toArray();
        $user_discount  = array();

        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $user_discount[]    = array_merge($u,$rfid);
        }

        return response($user_discount,201);
    }

    public function getAllRfids()
    {
        $users          = Users::get()->toArray();
        $response       = array();

        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $response[]         = array_merge($u,$rfid);
        }

        $client = new \GuzzleHttp\Client(['cookies' => true,
            'headers' =>  [
                'Authorization'          => "ABCDEFGHIJK"
            ]]);
        $url = 'http://fuelsystem.alba-petrol.com/api/rfids/create';
        
        $response = $client->request('POST', $url, [
            'form_params' => $response
        ]);

        return $response->getBody();
    }

    public function createUser(Request $request) 
    {   
        $response = $request->all();

        foreach($response as $user){
            $user = Users::firstOrCreate([
                'rfid' => $user['rfid']], 
                [
                'name'              => $user['name'],
                'surname'           => !empty($user['surname']) ? $user['surname'] : NULL,
                'residence'         => !empty($user['residence']) ? $user['residence'] : NULL,
                'contact_number'    => !empty($user['contact_number']) ? $user['contact_number'] : NULL,
                'application_date'  => !empty($user['application_date']) ? $user['application_date'] : NULL,
                'business_type'     => !empty($user['business_type']) ? $user['business_type'] : NULL,
                'email'             => !empty($user['email']) ? $user['email'] : NULL,
                'password'          => !empty($user['password']) ? $user['password'] : NULL,
                'company_id'        => !empty($user['company_id']) ? $user['company_id'] : 0,
                'one_time_limit'    => !empty($user['one_time_limit']) ? $user['one_time_limit'] : 0,
                'plates'            => !empty($user['plates']) ? $user['plates'] : 0,
                'vehicle'           => !empty($user['vehicle']) ? $user['vehicle'] : 0,
                'status'            => !empty($user['status']) ? $user['status'] : 1,
                'type'              => !empty($user['type']) ? $user['type'] : 1,
                'starting_balance'  => !empty($user['starting_balance']) ? $user['starting_balance'] : 0,
                'limits'            => !empty($user['limits']) ? $user['limits'] : 0,
                'limit_left'        => !empty($user['limit_left']) ? $user['limit_left'] : 0,
                'remember_token'    => $user['remember_token'],
                'created_at'        => $user['created_at'],
                'updated_at'        => $user['updated_at'],
            ]);

            if(!empty($user['discount'])) {
                foreach($user['discount'] as $discount){
                    RFID_Discounts::firstOrCreate([
                        'rfid_id'       => $discount['rfid_id'],
                        'product_id'    => $discount['product_id'],
                        'discount'      => $discount['discount'],
                        'created_at'    => $discount['created_at'],
                        'updated_at'    => $discount['updated_at']
                    ]);
                }
            }
        }

        return response()->json([
            "message" => "RFID record created"
        ], 201);
    
    }

    public function saveRFID(Request $request){
        $rfid = $request->all();

        if(Users::where('rfid', $rfid['rfid'])->exists()){
            return response()->json([
                "message" => "This RFID(".$rfid['rfid'].") already exists!"
            ], 201);
        }else {
            $user = Users::firstOrCreate([
                'rfid' => $rfid['rfid']],
                [
                'name'              => $rfid['name'],
                'surname'           => !empty($rfid['surname']) ? $rfid['surname'] : NULL,
                'residence'         => !empty($rfid['residence']) ? $rfid['residence'] : NULL,
                'contact_number'    => !empty($rfid['contact_number']) ? $rfid['contact_number'] : NULL,
                'application_date'  => !empty($rfid['application_date']) ? $rfid['application_date'] : NULL,
                'business_type'     => !empty($rfid['business_type']) ? $rfid['business_type'] : NULL,
                'email'             => !empty($rfid['email']) ? $rfid['email'] : NULL,
                'password'          => !empty($rfid['password']) ? $rfid['password'] : NULL,
                'company_id'        => !empty($rfid['company_id']) ? $rfid['company_id'] : 0,
                'one_time_limit'    => !empty($rfid['one_time_limit']) ? $rfid['one_time_limit'] : 0,
                'plates'            => !empty($rfid['plates']) ? $rfid['plates'] : 0,
                'vehicle'           => !empty($rfid['vehicle']) ? $rfid['vehicle'] : 0,
                'status'            => !empty($rfid['status']) ? $rfid['status'] : 1,
                'type'              => !empty($rfid['type']) ? $rfid['type'] : 1,
                'starting_balance'  => !empty($rfid['starting_balance']) ? $rfid['starting_balance'] : 0,
                'limits'            => !empty($rfid['limits']) ? $rfid['limits'] : 0,
                'limit_left'        => !empty($rfid['limit_left']) ? $rfid['limit_left'] : 0,
                'remember_token'    => $rfid['remember_token'],
                'created_at'        => $rfid['created_at'],
                'updated_at'        => $rfid['updated_at'],
            ]);

            $insertedId = $user->rfid;

            if(!empty($rfid['discount'])) {
                foreach(array_combine($rfid['product'], $rfid['discount']) as $product => $discount){
                    RFID_Discounts::firstOrCreate([
                        'rfid_id'       => $insertedId,
                        'product_id'    => $product,
                        'discount'      => $discount,
                    ]);
                }
            }
        }
    }
}
