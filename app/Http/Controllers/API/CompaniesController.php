<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyDiscount;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /*****  EXPORT FUNCTIONS *****/

    // Local call to Server (Export Companies from local DB to Server)
    public function exportCompanies(){
        $company        = Company::where(function ($query) {
                            $query->where('exported', NULL)
                                ->orWhere('exported', 0);
                        })->get()->toArray();

        $response       = array();
        $access_token   = config('token.access_token');

        foreach($company as $comp){
            $rfid['discount']   = CompanyDiscount::where('company_id',$comp['id'])->get()->toArray();
            $response[]         = array_merge($comp,$rfid);
        }

        try {
        $client = new \GuzzleHttp\Client(['cookies' => true,
        'headers' =>  [
            'Authorization'          => $access_token,
            'Accept'                 => "application/json"
        ]]);
        $url = 'http://fuelsystem.alba-petrol.com/api/companies/create';

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
        
        // Update new exported company 
        foreach($id->new as $value){
            Company::where('id',$value->branch_id)->update(['exported'=> 1, 'master_id' => $value->master_id->id]);
        }

        // Update old exported company 
        foreach($id->old as $value){
            Company::where('id',$value->branch_id)->update(['exported'=> 1, 'master_id' => $value->master_id->id]);
        }

        return response()->json([
            'response'  => 'Success',
        ], 201);
    }

    // Server response (Export Companies from local DB to Server)
    public function createCompany(Request $request) 
    {   
        $response = $request->all();
        $new      = array();
        $old      = array();
        
        foreach($response as $company){
            $company_id = Company::firstOrCreate([
                'bis_number' => $company['bis_number']], 
                [
                'name'              => $company['name'],
                'fis_number'        => !empty($company['fis_number']) ? $company['fis_number'] : NULL,
                'contact_person'    => !empty($company['contact_person']) ? $company['contact_person'] : NULL,
                'tax_number'        => !empty($company['tax_number']) ? $company['tax_number'] : NULL,
                'res_number'        => !empty($company['res_number']) ? $company['res_number'] : NULL,
                'tel_number'        => !empty($company['tel_number']) ? $company['tel_number'] : NULL,
                'email'             => !empty($company['email']) ? $company['email'] : NULL,
                'address'           => !empty($company['address	']) ? $company['address	'] : NULL,
                'city'              => !empty($company['city']) ? $company['city'] : NULL,
                'images'            => !empty($company['images']) ? $company['images'] : NULL,
                'country'           => !empty($company['country']) ? $company['country'] : NULL,
                'status'            => !empty($company['status']) ? $company['status'] : 0,
                'starting_balance'  => !empty($company['starting_balance']) ? $company['starting_balance'] : NULL,
                'limits'            => !empty($company['limits']) ? $company['limits'] : NULL,
                'limit_left'        => !empty($company['limit_left']) ? $company['limit_left'] : NULL,
                'has_limit'         => !empty($company['has_limit']) ? $company['has_limit'] : 0,
                'has_receipt'       => !empty($company['has_receipt']) ? $company['has_receipt'] : 0,
                'has_receipt_nr'    => !empty($company['has_receipt_nr']) ? $company['has_receipt_nr'] : 0,
                'send_email'        => !empty($company['send_email']) ? $company['send_email'] : 0,
                'on_transaction'    => !empty($company['on_transaction']) ? $company['on_transaction'] : 0,
                'daily_at'          => !empty($company['daily_at']) ? $company['daily_at'] : 0,
                'monthly_report'    => !empty($company['monthly_report']) ? $company['monthly_report'] : 0,
                'created_at'        => now()->timestamp,
                'updated_at'        => $company['updated_at'],
            ]);
            
            if ($company_id->wasRecentlyCreated) {
                $new[] = array('master_id' => $company_id, 'branch_id' => $company['id']);
                
                CompanyDiscount::where('company_id',$company_id->id)->delete();

                foreach($company['discount'] as $discount){
                    CompanyDiscount::insert([
                        'company_id'    => $company_id->id,
                        'product_id'    => $discount['product_id'],
                        'discount'      => $discount['discount'],
                        'created_at'    => $discount['created_at'],
                        'updated_at'    => $discount['updated_at']
                    ]);
                }
                    
            }else {
                $old[] = array('master_id' => $company_id, 'branch_id' => $company['id']);
            }
        }

        return response()->json([
            'response'  => 'Success',
            'new'       => $new,
            'old'       => $old,
        ], 201);
    
    }
    /***  END EXPORT FUNCTIONS ***/

    /*****  IMPORT FUNCTIONS *****/

    // Local call to Server (Import Company from Server to local DB)
    public function getCompanyFromServer(){
        ini_set("memory_limit", "-1");
        set_time_limit(0);
        
        $access_token   = config('token.access_token');
        $new            = array();
        $old            = array();
        $last_inserted  = Company::where('exported',1)
                            ->where('created_at', Company::max('created_at'))
                            ->orderBy('created_at','desc')
                            ->first();
        
        try {
            $client = new \GuzzleHttp\Client(['cookies' => true,
                'headers' =>  [
                    'Authorization'          => $access_token,
                    'Accept'                 => "application/json"
                ]]);

            $url = 'http://fuelsystem.alba-petrol.com/api/company/import';
			
            $response = $client->request('POST', $url, [
                'json' => $last_inserted
            ]);

            $online_response = $response->getBody()->getContents();
            $data            = json_decode($online_response);
	
            foreach($data as $company){
                $company_id = Company::firstOrCreate([
                    'bis_number' => $company->bis_number], 
                    [
                    'name'              => $company->name,
                    'master_id'         => $company->id,
                    'fis_number'        => !empty($company->fis_number) ? $company->fis_number : NULL,
                    'contact_person'    => !empty($company->contact_person) ? $company->contact_person : NULL,
                    'tax_number'        => !empty($company->tax_number) ? $company->tax_number : NULL,
                    'res_number'        => !empty($company->res_number) ? $company->res_number : NULL,
                    'tel_number'        => !empty($company->tel_number) ? $company->tel_number : NULL,
                    'email'             => !empty($company->email) ? $company->email : NULL,
                    'address'           => !empty($company->address	) ? $company->address	 : NULL,
                    'city'              => !empty($company->city) ? $company->city : NULL,
                    'exported'          => 1,
                    'images'            => !empty($company->images) ? $company->images : NULL,
                    'country'           => !empty($company->country) ? $company->country : NULL,
                    'status'            => !empty($company->status) ? $company->status : 0,
                    'starting_balance'  => !empty($company->starting_balance) ? $company->starting_balance : NULL,
                    'limits'            => !empty($company->limits) ? $company->limits : NULL,
                    'limit_left'        => !empty($company->limit_left) ? $company->limit_left : NULL,
                    'has_limit'         => !empty($company->has_limit) ? $company->has_limit : 0,
                    'has_receipt'       => !empty($company->has_receipt) ? $company->has_receipt : 0,
                    'has_receipt_nr'    => !empty($company->has_receipt_nr) ? $company->has_receipt_nr : 0,
                    'send_email'        => !empty($company->send_email) ? $company->send_email : 0,
                    'on_transaction'    => !empty($company->on_transaction) ? $company->on_transaction : 0,
                    'daily_at'          => !empty($company->daily_at) ? $company->daily_at : 0,
                    'monthly_report'    => !empty($company->monthly_report) ? $company->monthly_report : 0,
                    'created_at'        => $company->created_at,
                    'updated_at'        => $company->updated_at,
                ]);
                
                if ($company_id->wasRecentlyCreated) {
                    $new[] = array('id' => $company_id->id,'company_name' => $company_id->name);
                    
                    CompanyDiscount::where('company_id',$company_id->id)->delete();
    
                    foreach($company->discount as $discount){
                        CompanyDiscount::insert([
                            'company_id'    => $company_id->id,
                            'product_id'    => $discount->product_id,
                            'discount'      => $discount->discount,
                            'created_at'    => $discount->created_at,
                            'updated_at'    => $discount->updated_at
                        ]);
                    }
                        
                }
            }
    
            return response()->json([
                'response'      => 'Success',
                'inserted_ids'  => $new,
            ], 201);
            

        } catch (\Exception $e) {
            return response()->json([
                "error" => "Error!",
                "message" => $e->getMessage()
            ]);
        }
    }

    // Server response (Import Company from Server to local DB)
    public function importCompanyFromServer(Request $request)
    {
        $company        = Company::where('created_at','>=',$request->created_at)->limit(500)->get()->toArray();
        $response       = array();
        
        foreach($company as $c){
            $rfid['discount']   = CompanyDiscount::where('company_id',$c['id'])->get()->toArray();
            $response[]         = array_merge($c,$rfid);
        }
        
        return response($response,201);
    }

    /***  END IMPORT FUNCTIONS ***/
}
