<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\RFID_Discounts;
use App\Http\Controllers\Controller;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users          = Users::get()->toArray();
        $user_discount  = array();

        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $user_discount[]    = array_merge($u,$rfid);
        }

        return response($user_discount,201);
    }

    public function save(Request $request) 
    {   
        // Get data from API and insert
        $url = '192.168.1.2/api/list/rfid';

        $client = new \GuzzleHttp\Client(['cookies' => true,
            'headers' =>  [
                'Authorization'          => "ABCDEFGHIJK"
            ]]);

        $jar = new \GuzzleHttp\Cookie\CookieJar;
        $res = $client->request('GET', $url, ['cookies' => $jar]);

        $response = json_decode($res->getBody(),true);
        

        foreach($response as $user){
            Users::firstOrCreate([
                'rfid' => $user['rfid']], 
                [
                'name'              => $user['name'],
                'surname'           => $user['surname'],
                'residence'         => $user['residence'],
                'contact_number'    => $user['contact_number'],
                'application_date'  => $user['application_date'],
                'business_type'     => $user['business_type'],
                'email'             => $user['email'],
                'password'          => $user['password'],
                'company_id'        => $user['company_id'],
                'one_time_limit'    => $user['one_time_limit'],
                'plates'            => $user['plates'],
                'vehicle'           => $user['vehicle'],
                'status'            => $user['status'],
                'type'              => $user['type'],
                'starting_balance'  => $user['starting_balance'],
                'limits'            => $user['limits'],
                'limit_left'        => $user['limit_left'],
                'remember_token'    => $user['remember_token'],
                'created_at'        => $user['created_at'],
                'updated_at'        => $user['updated_at'],
            ]);

            if(!empty($user['discount'])) {
                foreach($user['discount'] as $discount){
                    RFID_Discounts::updateOrCreate([
                        'rfid_id'       => $discount['rfid_id'],
                        'product_id'    => $discount['product_id'],
                        'discount'      => $discount['discount'],
                        'created_at'    => $discount['created_at'],
                        'updated_at'    => $discount['updated_at']
                    ]);
                }
            }
        }
        
        echo "DONE";
    }
}
