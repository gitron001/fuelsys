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
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;


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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        $companies  = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
        $types      = Users::pluck('name','id')->all();
        $branches   = Branch::orderBy('name','ASC')->pluck('name','id');
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        //$users      = Users::whereIn('status',array(1, 2));
        $users      = Users::select('users.name','users.email','users.rfid','users.type','users.type','users.created_at','users.updated_at','users.id','users.company_id','users.branch_user_id','users.plates','users.vehicle')
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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        if (Users::where('rfid', $request->input('rfid'))->exists()) {

            session()->flash('wrong','This RFID exists!');
            return redirect()->back()->withInput($request->all());

        }else {
        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayDiscount = array_values($request->input('discount'))[0];

        //$firstValueOfArrayBranch  = array_values($request->input('branch'))[0];
        //$firstValueOfArrayLimit   = array_values($request->input('limit'))[0];
        $limit = 0;

        if($request->input('has_limit') == 1){
            $limit_left = $request->input('limits') - $request->input('starting_balance');
            $limit = $request->input('daily_limit');
        }else{
            $limit_left = 0;
        }

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
            'limits'            => $limit,
            'has_limit'         => $request->input('has_limit'),
            'limit_left'        => $limit_left,
            'company_id'        => $request->input('company_id') ? : 0,
            'one_time_limit'    => $request->input('one_time_limit') ? : 0,
            'daily_limit'       => $request->input('daily_limit') ? : 0,
            'plates'            => $request->input('plates') ? : 0,
            'vehicle'           => $request->input('vehicle') ? : 0,
            'type'              => $request->input('type'),
            'send_email'        => $request->input('send_email'),
            'vehicle_data'      => $request->input('vehicle_data'),
            'on_transaction'    => $request->input('on_transaction'),
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
						$url = '#';


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
								'daily_limit'       => $request->input('daily_limit') ? : 0,
								'plates'            => $request->input('plates') ? : 0,
								'vehicle'           => $request->input('vehicle') ? : 0,
                                'type'              => $request->input('type'),
                                'send_email'        => $request->input('send_email'),
                                'on_transaction'    => $request->input('on_transaction'),
								'password'          => bcrypt($password),
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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        $user = Users::findOrFail($id);

        if($request->input('password') != ''){
            $password = Hash::make($request->input('password'));
        }else{
            $password = $user->password;
        }

        $limit=0;

        if($request->input('has_limit') == 1){
            $new_limit   = $request->input('limits') - $request->input('starting_balance');
            $old_limit   = $user->limits - $user->starting_balance;
            $limit_left  = $user->limit_left + ($new_limit - $old_limit);
            $limit = $request->input('daily_limit');

        }else{
            $limit_left = 0;
        }

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
        $user->send_email       = $request->input('send_email');
        $user->vehicle_data     = $request->input('vehicle_data');
        $user->on_transaction   = $request->input('on_transaction');
        $user->vehicle          = $request->input('vehicle');
        $user->type             = $request->input('type');
        $user->limits           = $limit;
        $user->has_limit        = $request->input('has_limit');
        $user->limit_left       = $limit_left;
        $user->one_time_limit   = $request->input('one_time_limit');
        $user->daily_limit      = $request->input('daily_limit');
        $user->password         = $password;
        $user->updated_at       = now()->timestamp;
        $user->update();

        // DELETE Discount
        RFID_Discounts::where('rfid_id',$id)->delete();

        // ADD new Discount
        if(!empty($request->input('product')[0]) && !empty($request->input('discount')[0])) {
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount) {

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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        Users::where('id', $id)->update(['rfid' => 0, 'status' => 3]);
        session()->flash('info','Success');

        return redirect('/admin/users');
    }

    public function delete_all(Request $request)
    {
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        $user_id_array = $request->input('id');
        $user = Users::whereIn('id',$user_id_array);
        if($user->update(['rfid' => 0, 'status' => 3])){
            echo "Data deleted";
        }
    }

    public function uploadExcel(){
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

        $products   = Products::select('name','id', 'pfc_pr_id')->where('status', 1)->get();
        return view('/admin/users/upload_excel',compact('products'));
    }

    public function importExcel(Request $request){
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

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
        if(Gate::denies('access-gate')){
            abort(403, 'Unauthorized action.');
        }

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
				//RFID_Discounts::insert($users);
				foreach (array_chunk($users,1000) as $t)
				{
					 RFID_Discounts::insert($t);
				}
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

    public function insertRecord(){
        ini_set('max_execution_time', 180);
        // Produktet
        $productArray = array(0 => 1, 1 => 3, 2 => 5);
        $discountArray = array(0 => 0.06, 1 => 0.06, 2 => 0.02);

        for($i=111020000;$i <= 111025000;$i++) {
            $id = Users::insertGetId([
                'rfid'              => $i,
                'name'              => 'Bonus Klient - '.$i,
                'surname'           => $i,
                'residence'         => '',
                'contact_number'    => '',
                'application_date'  => '',
                'business_type'     => '',
                'email'             => '',
                'company_id'        => 0,
                'one_time_limit'    => 0,
                'plates'            => 0,
                'vehicle'           => 0,
                'type'              => 4,
                'password'          => '',
                'status'            => 1,
                'created_at'        => now()->timestamp,
                'updated_at'        => now()->timestamp
            ]);

            foreach(array_combine($productArray, $discountArray) as $product => $discount){

                $rfid_product = new RFID_Discounts();

                $rfid_product->rfid_id      = $id;
                $rfid_product->product_id   = $product;
                $rfid_product->discount     = $discount;
                $rfid_product->save();
            }

        }
    }


}
