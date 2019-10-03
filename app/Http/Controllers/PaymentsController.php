<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Users;
use App\Models\PFC;
use App\Models\Transaction;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use DateTime;
use Config;
use DB;
use Auth;
use App\Jobs\PrintPayment;
use App\Services\PrintPaymentService;

class PaymentsController extends Controller
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
        $users          = Users::whereIn('type',[1,2,3,4,5])->pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
        $user           = $request->input('user');
        $company        = $request->input('company');
        $sort_by_company = $request->get('sortby');
        if($sort_by_company == 'name'){
            $sort_by = "payments.date";
            $sort_type = "DESC";
        }else{
            $sort_by         = ($sort_by_company == 'company_id' ? "companies.name" : "payments".".".$request->get('sortby'));
            $sort_type       = $request->get('sorttype');
        }

        //$query          = Payments::orderBy('date', 'DESC');
        $query          = Payments::select(DB::RAW('users.name as user_name'), 'users.type as user_type', DB::RAW('companies.name as comp_name'),
           'payments.amount', 'payments.date','payments.created_at','payments.updated_at','payments.id', 'creator.name as p_creater')
            ->leftJoin('users', 'users.id', '=', 'payments.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'payments.company_id')
            ->leftJoin('users as creator', 'creator.id', '=', 'payments.created_by');

        if ($request->input('user')) {
            $query = $query->whereIn('users.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('payments.date',[$from_date, $to_date]);
        }

        if($request->ajax() == false){
            $query->orderBy('payments.date', 'DESC');
            $payments = $query->paginate(15);
            return view('/admin/payments/home',compact('payments','users','companies'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $payments = $query->paginate(15);
            return view('/admin/payments/table_data',compact('payments','users','companies'))->render();
        }

        //$payments = $query->paginate(15);

        //return view('/admin/payments/home',compact('payments','users','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = Company::pluck('name','id')->all();
        $branches   = Branch::orderBy('name','ASC')->pluck('name','id')->all();
        $users      = Users::where('company_id', 0)->whereNotIn('type', array(6,7,8))->pluck('name','id')->all();


        return view('/admin/payments/create',compact('companies','users','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments   = new Payments();
        $user       = $request->input('user_id');
        $company    = $request->input('company_id');

        if($user){
            $user = Users::find( $user );
            $user->limit_left += $request->input('amount');
            $user->save();
        }elseif($company){
            $company = Company::find( $company );
            $company->limit_left += $request->input('amount');
            $company->save();
        }
        
        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $request->input('amount');
        $payments->description  = $request->input('description');
        $payments->user_id      = $request->input('user_id');
        $payments->company_id   = $request->input('company_id');
		if($request->input('branch')){
			$payments->branch_id    = $request->input('branch');
		}
        $payments->type         = $request->input('type');
        $payments->created_at   = now()->timestamp;
        $payments->created_by   = Auth::user()->id;
        $payments->updated_at   = now()->timestamp;
        $payments->save();

		$recepit = new PrintPayment($payments->id);
        dispatch($recepit);
		
        /*$msg = "Payment Print not Succesful";
		
        try {
            //self::printFunction($payments->id);
        } catch (Exception $e) {
           //$msg = "Payment Print NOT Succesful";
        }*/
		/*
        // Create payment with API
        $client = new \GuzzleHttp\Client(['cookies' => true,
            'headers' =>  [
                'Authorization'          => "ABCDEFGHIJK"
            ]]);
        $url = '192.168.1.2/api/payments/create';
        
        $data = $payments->toArray();
        $response = $client->request('POST', $url, [
            'form_params' => [ 
                'date'          => strtotime($request->input('date')),
                'amount'        => $request->input('amount'),
                'description'   => $request->input('description'),
                'user_id'       => $request->input('user_id'),
                'company_id'    => $request->input('company_id'),
                'created_by'    => Auth::user()->id,
                'edited_by'     => Auth::user()->id,
                'created_at'    => now()->timestamp,
                'updated_at'    => now()->timestamp,
             ],
        ]);
		*/
        session()->flash('info','Success');

        return redirect('/admin/payments');
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
        $payment    = Payments::findOrFail($id);
        $companies  = Company::pluck('name','id')->all();
        $users      = Users::where('company_id', 0)->whereNotIn('type', array(6,7,8))->pluck('name','id')->all();
        return view('/admin/payments/edit',compact('payment','companies','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $payments = Payments::findOrFail($id);

        if($request->input('checkbox') == 'user'){
            $user_id      = $request->input('user_id');
            $company_id   = 0;
        }else{
            $user_id      = 0;
            $company_id   = $request->input('company_id');   
        }
        $amount  = $request->input('amount');
        if($payments->amount != $amount && $payments->user_id == $user_id && $request->input('checkbox')== 'user'){
            $limit_difference = $amount - $payments->amount;
            $user = Users::find($request->input('user_id'));
            $user->limit_left += $limit_difference;
            $user->save();
        }elseif($payments->amount != $amount && $payments->company_id == $company_id && $request->input('checkbox') != 'user'){
            $limit_difference = $amount - $payments->amount;
            $company = Company::find($request->input('company_id'));
            $company->limit_left += $limit_difference;
            $company->save();
        }

        if($payments->user_id != $user_id){
            if($payments->user_id != 0){
                $prev_user = Users::find($payments->user_id);
                $prev_user->limit_left -= $payments->amount;
                $prev_user->update();
            }

            if($user_id != 0){
                $new_user = Users::find($request->input('user_id'));
                $new_user->limit_left += $request->input('amount'); 
                $new_user->save();
            }
        }

        if($payments->company_id != $company_id){
            if($payments->company_id != 0){
                $prev_company = Company::find($payments->company_id);
                $prev_company->limit_left -= $payments->amount;
                $prev_company->update();
            }

            if($company_id != 0){
                $new_company = Company::find($request->input('company_id'));
                $new_company->limit_left += $request->input('amount'); 
                $new_company->save();
            }
        }

        $payments->user_id      = $user_id;
        $payments->company_id   = $company_id;   
        $payments->date         = strtotime($request->input('date'));
        $payments->description  = $request->input('description');
        $payments->amount       = $amount;
        $payments->edited_by   = Auth::user()->id;
        $payments->updated_at   = now()->timestamp;
        $payments->update();

        session()->flash('info','Success');

        return redirect('/admin/payments');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payments::findOrFail($id);

        if($payment->user_id != 0){
            $user = Users::find($payment->user_id);
            $user->limit_left -=  $payment->amount;
            $user->save();
        }elseif($payment->company_id != 0){
            $company = Company::find($payment->company_id);
            $company->limit_left -= $payment->amount;
            $company->save();
        }
        $payment->delete();
        session()->flash('info','Success');

        return redirect('/admin/payments');
    }

    public static function printFunction(Request $request)
    {
		PrintPaymentService::printFunction($request->input('id'));
    }
	

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function singleItem($name = '', $lit, $price, $limit_left = '') {
        $rightCols = 10;
        $leftCols = 22;

        $left = str_pad($name, $leftCols) ;

        $lit = $lit;

        $right = str_pad(' '.$lit.'     '.$price.'   ' . $limit_left, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }	
}


