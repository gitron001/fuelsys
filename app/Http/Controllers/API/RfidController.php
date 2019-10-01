<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Users;
use DB;
use Session;
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
    
    public function importRFID(Request $request)
    {
        $users          = Users::where('created_at','>=',$request->created_at)->limit(1000)->get()->toArray();
        $response       = array();
        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $response[]         = array_merge($u,$rfid);
        }
        
        return response($response,201);
    }

    // Insert RFID(without company) from local DB to Server (Export RFID) 
    public function getAllRfids()
    {
		ini_set("memory_limit", "-1");
		set_time_limit(0);
		
        $users          = Users::where(function ($query) {
                            $query->where('exported', NULL)
                                ->orWhere('exported', 0);
                        })->where('company_id',0)->limit(1000)->get();

        $response       = array();
        $access_token   = config('token.access_token');

        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $response[]         = array_merge($u,$rfid);
        }

        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);
            $url = 'http://fuelsystem.alba-petrol.com/api/rfids/create';
            
            $response = $client->request('POST', $url, [
                'json' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to insert into server",
                "message" => $e->getMessage()
            ]);
        }

        $online_response_data = $response->getBody()->getContents();
        $id = json_decode($online_response_data);
        
        // Update new exported user 
		$new_ids = implode(',', $id->new);
		Users::whereIn('id',$id->new)->update(['exported'=> 1]);
		
        // Update old exported user 
		$old_ids = implode(',', $id->old);
        Users::whereIn('id',$id->old)->update(['exported'=> 1]);
        
        return view('/admin/api/response', compact('users', 'old_ids'));
    }

    // Insert RFID(with company) from local DB to Server (Export RFID)
    public function convertCompanyIdToMasterId(){

        ini_set("memory_limit", "-1");
		set_time_limit(0);
		
        $users_info     = Users::where(function ($query) {
                            $query->where('exported', NULL)
                                ->orWhere('exported', 0);
                        })->where('company_id','!=',0)->limit(1000)->get();
        
        // Convert CompanyId to MasterId
        foreach($users_info as $key => $value){
            if($value->company->master_id == NULL){
                unset($users_info[$key]);
            }
            
            if($value->company_id != NULL || $value->company_id != 0){
                $value->company_id = $value->company->master_id;
                unset($value['company']);
            }
        }

        $users          = $users_info->toArray();
        $response       = array();
        $access_token   = config('token.access_token');

        foreach($users as $u){
            $rfid['discount']   = RFID_Discounts::where('rfid_id',$u['id'])->get()->toArray();
            $response[]         = array_merge($u,$rfid);
        }

        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);
            $url = 'http://fuelsystem.alba-petrol.com/api/rfids/create';
            
            $response = $client->request('POST', $url, [
                'json' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to insert into server",
                "message" => $e->getMessage()
            ]);
        }

        $online_response_data = $response->getBody()->getContents();
        $id = json_decode($online_response_data);
        
        // Update new exported user 
		$new_ids = implode(',', $id->new);
		Users::whereIn('id',$id->new)->update(['exported'=> 1]);
		
        // Update old exported user 
		$old_ids = implode(',', $id->old);
        Users::whereIn('id',$id->old)->update(['exported'=> 1]);
        
        return view('/admin/api/response', compact('users', 'old_ids'));
    }

    // Import RFID from Server to local DB (Import RFID)
    public function importAllRfids(){

        ini_set("memory_limit", "-1");
		set_time_limit(0);

        $access_token   = config('token.access_token');
        $new            = array();
        $old            = array();
        //$last_inserted  = Users::where('exported',1)->orderBy('created_at','DESC')->first();
        $last_inserted  = Users::where('exported',1)
                            ->where('created_at', Users::max('created_at'))
                            ->orderBy('created_at','desc')
                            ->first();

        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);

            $url = 'http://fuelsystem.alba-petrol.com/api/rfids/import_server';
			
            $response = $client->request('POST', $url, [
                'json' => $last_inserted
            ]);

            $online_response = $response->getBody()->getContents();
            $data            = json_decode($online_response);
	
            foreach($data as $user){
                $rfid = Users::firstOrCreate([
                    'rfid' => $user->rfid], 
                    [
                    'branch_user_id'    => $user->id,
                    'branch_id'         => $user->branch_id,
                    'name'              => $user->name,
                    'surname'           => !empty($user->surname) ? $user->surname : NULL,
                    'residence'         => !empty($user->residence) ? $user->residence : NULL,
                    'contact_number'    => !empty($user->contact_number) ? $user->contact_number : NULL,
                    'application_date'  => !empty($user->application_date) ? $user->application_date : NULL,
                    'business_type'     => !empty($user->business_type) ? $user->business_type : NULL,
                    'email'             => !empty($user->email) ? $user->email : NULL,
                    'password'          => !empty($user->password) ? $user->password : NULL,
                    'company_id'        => !empty($user->company_id) ? $user->company_id : 0,
                    'exported'          => 1,
                    'one_time_limit'    => !empty($user->one_time_limit) ? $user->one_time_limit : 0,
                    'plates'            => !empty($user->plates) ? $user->plates : 0,
                    'vehicle'           => !empty($user->vehicle) ? $user->vehicle : 0,
                    'status'            => !empty($user->status) ? $user->status : 1,
                    'type'              => !empty($user->type) ? $user->type : 1,
                    'starting_balance'  => !empty($user->starting_balance) ? $user->starting_balance : 0,
                    'limits'            => !empty($user->limits) ? $user->limits : 0,
                    'limit_left'        => !empty($user->limit_left) ? $user->limit_left : 0,
                    'remember_token'    => $user->remember_token,
                    'created_at'        => $user->created_at,
                    'updated_at'        => $user->updated_at,
                ]);
    
                if ($rfid->wasRecentlyCreated) {
                    
                    RFID_Discounts::where('rfid_id',$rfid->id)->delete();

                    foreach($user->discount as $discount){
                        RFID_Discounts::insert([
                            'rfid_id'       => $rfid->id, 
                            'product_id'    => $discount->product_id,
                            'discount'      => $discount->discount,
                            'created_at'    => $discount->created_at,
                            'updated_at'    => $discount->updated_at
                        ]);
                    }
                    $new[] = $rfid->branch_user_id;
                }else {
                    $old[] = $rfid->branch_user_id;
                }
            }
    
            return response()->json([
                'response'  => 'Success',
                'new'       => $new,
                'old'       => $old,
            ], 201);
            

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error!",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function createUser(Request $request) 
    {   
        $response = $request->all();
        $new      = array();
        $old      = array();
        
        foreach($response as $user){
            $rfid = Users::firstOrCreate([
                'rfid' => $user['rfid']], 
                [
                'branch_user_id'    => $user['id'],
                'branch_id'         => Session::get('branch_id'),
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
                'created_at'        => now()->timestamp,
                'updated_at'        => $user['updated_at'],
            ]);
            
            if ($rfid->wasRecentlyCreated) {
                $new[] = $user['id'];
                
                RFID_Discounts::where('rfid_id',$rfid->id)->delete();

                foreach($user['discount'] as $discount){
                    RFID_Discounts::insert([
                        'rfid_id'       => $rfid->id,
                        'product_id'    => $discount['product_id'],
                        'discount'      => $discount['discount'],
                        'created_at'    => $discount['created_at'],
                        'updated_at'    => $discount['updated_at']
                    ]);
                }
                    
            }else {
                $old[] = $user['id'];
            }
        }

        return response()->json([
            'response'  => 'Success',
            'new'       => $new,
            'old'       => $old,
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
                'branch_user_id'    => $user['id'],
                'branch_id'         => Session::get('branch_id'),
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

            $insertedId = $user->id;

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
