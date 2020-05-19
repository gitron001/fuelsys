<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Excel;
use Session;
use App\Models\Users;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Products;
use App\Models\RFID_Limits;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\RFID_Discounts;
use App\Jobs\SendTransactionEmail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies  = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
        $types      = Users::pluck('name','id')->all();
        $branches   = Branch::orderBy('name','ASC')->pluck('name','id');
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        //$users      = Users::whereIn('status',array(1, 2));
        $users      = Users::select('users.name','users.email','users.rfid','users.type','users.type','users.created_at','users.updated_at','users.id','users.company_id','users.branch_user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->leftJoin('branches', 'branches.id', '=', 'users.branch_id')
            ->whereIn('users.status',array(1, 2));

        if($request->get('search')){
            $users  = $users->where(function($query) use ($search){
                $query->where('users.name','like','%'.$search.'%');
                $query->orWhere('users.email','like','%'.$search.'%');
                $query->orWhere('users.rfid','like','%'.$search.'%');
            });
        }

        if($request->get('company')){
            $users  = $users->whereIn('companies.id',$request->get('company'));
        }

        if($request->get('type')){
            $users  = $users->where('users.type',$request->get('type'));
        }

        if($request->get('branch')){
            $users  = $users->where('branches.id',$request->get('branch'));
        }

        if($request->ajax() == false){
            $users  = $users->orderBy('users.name','ASC')
                        ->paginate(15);
            return view('/admin/users/home',compact('users','companies','types','branches'));
        } else {
            $users  = $users->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/users/table_data',compact('users','companies','types','branches'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products   = Products::select('name','pfc_pr_id')->where('status', 1)->get();
        $branches   = Branch::select('name','id')->where('status', 1)->orderBy('name')->get();
        $companies  = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        return view('/admin/users/create',compact('products','branches','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (Users::where('rfid', $request->input('rfid'))->exists()) {

            session()->flash('wrong','This RFID exists!');
            return redirect()->back()->withInput($request->all());

        }else {
        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayDiscount = array_values($request->input('discount'))[0];

        //$firstValueOfArrayBranch  = array_values($request->input('branch'))[0];
        //$firstValueOfArrayLimit   = array_values($request->input('limit'))[0];

        $password = $request->input('password');

        $id = Users::insertGetId([
            'rfid'              => $request->input('rfid'),
            'name'              => $request->input('name'),
            'surname'           => $request->input('surname'),
            'residence'         => $request->input('residence'),
            'contact_number'    => $request->input('contact_number'),
            'application_date'  => $request->input('application_date'),
            'business_type'     => $request->input('business_type'),
            'email'             => $request->input('email'),
            'company_id'        => $request->input('company_id') ? : 0,
            'one_time_limit'    => $request->input('one_time_limit') ? : 0,
            'plates'            => $request->input('plates') ? : 0,
            'vehicle'           => $request->input('vehicle') ? : 0,
            'type'              => $request->input('type'),
            'password'          => Hash::make($password),
            'status'            => 1,
            'created_at'        => now()->timestamp,
            'updated_at'        => now()->timestamp
        ]);

        if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayDiscount)){
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){

                $rfid_product = new RFID_Discounts();

                $rfid_product->rfid_id      = $id;
                $rfid_product->product_id   = $product;
                $rfid_product->discount     = $discount;
                $rfid_product->save();
            }
        }
		$exported = 0;
		$access_token   = config('token.access_token');
		if($access_token != ""){
			try {

						$client = new \GuzzleHttp\Client(['cookies' => true,
						'headers' =>  [
							'Authorization'          => $access_token
						]]);
						$url = 'http://fuelsystem.alba-petrol.com/api/save/rfid';


						$response = $client->request('POST', $url, [
							'form_params' => [
								'branch_user_id'    => $id,
								'branch_id'         => Session::get('branch_id'),
								'rfid'              => $request->input('rfid'),
								'name'              => $request->input('name'),
								'surname'           => $request->input('surname'),
								'residence'         => $request->input('residence'),
								'contact_number'    => $request->input('contact_number'),
								'application_date'  => $request->input('application_date'),
								'business_type'     => $request->input('business_type'),
								'email'             => $request->input('email'),
								'company_id'        => $request->input('company_id') ? : 0,
								'one_time_limit'    => $request->input('one_time_limit') ? : 0,
								'plates'            => $request->input('plates') ? : 0,
								'vehicle'           => $request->input('vehicle') ? : 0,
								'type'              => $request->input('type'),
								'password'          => Hash::make($password),
								'status'            => 1,
								'remember_token'    => '',
								'created_at'        => now()->timestamp,
								'updated_at'        => now()->timestamp,
								'product'           => $request->input('product'),
								'discount'          => $request->input('discount'),
							],
						]);
					} catch (\Exception $e) {
						session()->flash('info','Success: [Exported: 0 ('.$e->getMessage().')]');
						return redirect('admin/users/' . $id . '/edit');
					}
			}
			if($exported  == 0){
				session()->flash('info','Success');
			}else{
				session()->flash('info','Success [Exported: 1]');
			}
			return redirect('admin/users/' . $id . '/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user           = Users::findOrFail($id);
        $products   = Products::select('name','pfc_pr_id')->where('status', 1)->get();
        $branches   = Branch::select('name','id')->where('status', 1)->orderBy('name')->get();
        $companies  = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
        $rfid_limits    = RFID_Limits::where('rfid_id',$id)->get();
        $rfid_discounts = RFID_Discounts::where('rfid_id',$id)->get();

        return view('/admin/users/edit',compact('user','companies','rfid_limits','rfid_discounts','branches','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = Users::findOrFail($id);

        $password = $request->input('password');

        $user->rfid             = $request->input('rfid');
        $user->name             = $request->input('name');
        $user->surname          = $request->input('surname');
        $user->residence        = $request->input('residence');
        $user->contact_number   = $request->input('contact_number');
        $user->application_date = $request->input('application_date');
        $user->business_type    = $request->input('business_type');
        $user->email            = $request->input('email');
        $user->company_id       = $request->input('company_id');
        $user->plates           = $request->input('plates');
        $user->status           = $request->input('status');
        $user->vehicle          = $request->input('vehicle');
        $user->type             = $request->input('type');
        $user->one_time_limit   = $request->input('one_time_limit');
        $user->password         = bcrypt($password);
        $user->updated_at       = now()->timestamp;
        $user->update();

        // DELETE Discount
        RFID_Discounts::where('rfid_id',$id)->delete();

        // ADD new Discount
        if(($request->input('product')[0] != 0) && (!empty($request->input('discount')[0]))){
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){

                if(!empty($product) && !empty($discount) && $discount !== 0){
                    $rfid_product = new RFID_Discounts();

                    $rfid_product->rfid_id      = $id;
                    $rfid_product->product_id   = $product;
                    $rfid_product->discount     = $discount;
                    $rfid_product->save();
                }
            }
        }
        session()->flash('info','Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::where('id', $id)->update(['rfid' => 0, 'status' => 3]);
        session()->flash('info','Success');

        return redirect('/admin/users');
    }

    public function delete_all(Request $request)
    {
        $user_id_array = $request->input('id');
        $user = Users::whereIn('id',$user_id_array);
        if($user->update(['rfid' => 0, 'status' => 3])){
            echo "Data deleted";
        }
    }

    public function uploadExcel(){

        $products   = Products::select('name','id', 'pfc_pr_id')->where('status', 1)->get();

        return view('/admin/users/upload_excel',compact('products'));
    }

    public function importExcel(Request $request){

        $file       = Input::file('upload_file');
        $file_name  = $file->getRealPath();
        $results    = Excel::load($file_name, function($reader){
            $reader->all();
        })->get()->toArray();
        $type           = $request->input('type');
        $product        = $request->input('product');
        $discount       = $request->input('discount');

        if(count($results) < 1){
            return redirect('/admin/users');
        }
        if(!isset($results[0]['nr.karteles'])){
            $results = $results[0];
        }

		$duplicate = array();

        foreach ($results as $result) {
			if(trim($result['nr.karteles']) == "" || trim($result['nr.karteles']) == 0){
				continue;
			}
            if(strpos($result['nr.karteles'], 'A')){
                $rfid = str_replace('A',1,$result['nr.karteles']);
            } else if(strpos($result['nr.karteles'], 'B')){
                $rfid = str_replace('B',2,$result['nr.karteles']);
            } else if(strpos($result['nr.karteles'], 'C')){
                $rfid = str_replace('C',3,$result['nr.karteles']);
            } else {
                $rfid = $result['nr.karteles'];
            }
			$rfid = substr($rfid,4);
			$check_existing = Users::where('rfid', $rfid)->count();

			if($check_existing != 0){
                $user = Users::where('rfid', $rfid)->first();
                $user->update([
                    'name'              => trim($result['emri']). ' ' .trim($result['mbiemri']),
                    'residence'         => $result['vendbanimi'],
                    'contact_number'    => $result['nr.kontaktues'],
                    'rfid'              => $rfid,
                    'type'              => $type,
                    'application_date'  => str_replace('.', '-', $result['data']),
                    'updated_at'        => now()->timestamp
                ]);

                $id = $user->id;

                foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){
                    if(!empty($product) && !empty($discount) && $discount !== 0){

                        RFID_Discounts::where('rfid_id', $id)->where('product_id',$product)->delete();

                        $rfid_product = new RFID_Discounts();

                        $rfid_product->rfid_id      = $id;
                        $rfid_product->product_id   = $product;
                        $rfid_product->discount     = $discount;
                        $rfid_product->save();
                    }
                }

				$duplicate[] = $result;
				continue;
			}

            $id = Users::insertGetId([
                'name'              => trim($result['emri']). ' ' .trim($result['mbiemri']),
                'residence'         => $result['vendbanimi'],
                'contact_number'    => $result['nr.kontaktues'],
                'rfid'              => $rfid,
                'type'              => $type,
                'application_date'  => str_replace('.', '-', $result['data']),
                'created_at'        => now()->timestamp,
                'updated_at'        => now()->timestamp
            ]);

            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){
                if(!empty($product) && !empty($discount) && $discount !== 0){
                    $rfid_product = new RFID_Discounts();

                    $rfid_product->rfid_id      = $id;
                    $rfid_product->product_id   = $product;
                    $rfid_product->discount     = $discount;
                    $rfid_product->save();
                }
            }
        }

		if(count($duplicate) == 0){

			session()->flash('info','Success');

			return redirect('/admin/users');
		}else{
			return view('/admin/users/duplicate',compact('duplicate'));
		}
    }

    public function bonus_members(Request $request) {
        $products   = Products::select('name','id', 'pfc_pr_id')->where('status', 1)->get();

        return view('/admin/users/bonus_members',compact('products'));
    }

    public function updateCard(Request $request) {
        // Get all users with the same type
        $users = Users::select(DB::RAW('id as rfid_id'))->where('type',$request->input('type'))->get()->toArray();

        // Delete discount from those users
        RFID_Discounts::whereIn('rfid_id', $users)->delete();

        foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){
            if(!empty($product) && !empty($discount)){
				$users = collect($users);
				$users = $users->map(function ($users) use ($product, $discount) {
					$users['product_id'] = $product;
					$users['discount'] = $discount;
					$users['created_at'] = time();
					$users['updated_at'] = time();
					return $users;
				});

				$users = $users->toArray();

				RFID_Discounts::insert($users);
				// Save new discounts
                /*foreach($users as $user) {
                    $rfid_product = new RFID_Discounts();

                    $rfid_product->rfid_id      = $user->id;
                    $rfid_product->product_id   = $product;
                    $rfid_product->discount     = $discount;
                    $rfid_product->save();
                }*/

            }

        }

        session()->flash('info','Success');

		return redirect('/admin/users');

    }


}
