<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Transaction as Transactions;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use App\Models\PFC;
use App\Models\Dispaneser;
use App\Models\Company;
use App\Models\Payments;
use App\Models\Products;
use App\Services\TransactionService;
use Excel;
use DB;
use DateTime;
use PDF;
use Mail;
use App\Jobs\PrintFuelRecept;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $transactions   = Transactions::orderBy('created_at', 'desc')->paginate(15);
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();
        return view('/admin/transactions/home',compact('transactions','users','companies'));
    }


    public function info(){

        $transactions  = Transactions::orderBy('created_at', 'DESC')->limit(15)->get();

        return view('admin.transactions.transactions-info',compact('transactions'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users       = Users::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $pfc         = PFC::pluck('name','id')->all();
        
        return view('/admin/transactions/create',compact('users','dispanesers','products','pfc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Transaction::create($request->all());

        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $transaction = Transactions::findOrFail($id);
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $users       = Users::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $pfc         = PFC::pluck('name','id')->all();

        return view('/admin/transactions/edit',compact('transaction','dispanesers','users','products','pfc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $transaction = Transactions::findOrFail($id);
        $transaction->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }
    
    public function read() {
        TransactionService::read();
    }

    public function excel_export(Request $request) {

        $transactions       = self::generate_data($request);
        $data               = self::getGeneralData($request);
        $balance            = str_replace(',', '', self::generate_balance($request));

        $total = 0;
        $totalToPay = 0;
        $totalAmount = 0;
        $totalPayed = 0;

        $totalAmount = number_format($balance, 2);
        $startDate = $request->fromDate;

        $dataArray[] = array('PRODUKTI','SASIA','TOTALI');
        foreach($data as $d) {
            $dataArray[] = array(
                'PRODUKTI'  => $d['product_name'],
                'SASIA'     => $d['lit'] . ' litra',
                'TOTALI'    => $d['money'] . ' Euro',
            );
        }

        
        $file_name  = 'Transactions - '.date('Y-m-d h-i', strtotime("now"));
           
        $myFile = Excel::create($file_name, function($excel) use( $transactions,$totalAmount,$startDate,$dataArray )
        {
            $excel->sheet('Transactions', function($sheet) use( $transactions,$totalAmount,$startDate )
            {

                if($totalAmount != 0){ $total = $totalAmount; }else{ $total = 0; };
                $totalToPay = 0;
                $totalPayed = 0;

                $sheet->appendRow(array(
                    'DATA',
                    'LLOJI',
                    'PERSONI',
                    'MBUSHJA',
                    'PAGESA',
                    'GJENDJA',
                ));

                $sheet->cell('A2', function($cell) use( $startDate ){
                        $cell->setValue($startDate);
                });

                $sheet->cell('B2', function($cell) use( $totalAmount ){
                        $cell->setValue('GJENDJA FILLESTARE');
                });

                $sheet->cell('F2', function($cell) use( $totalAmount ){
                        $cell->setValue($totalAmount);
                });
                
                foreach ($transactions as $row)
                {
                    if($row->money == 0){
                        $fueling = 0;
                        $payment = $row->amount;
                    }else{
                        $fueling = $row->money;
                        $payment = 0;                  
                    }
                    $total = str_replace(',', '', $total);
                    $fueling = str_replace(',', '', $fueling);
                    $payment = str_replace(',', '', $payment);
                    $total = $total + $fueling - $payment;
                    
                    $sheet->appendRow(array(
                        $row->created_at,
                        $row->description == NULL  ? $row->type : $row->description,
                        $row->username ? $row->username : $row->company_id,
                        $fueling,
                        $payment,
                        $total,
                    ));
                }

                $sheet->appendRow(array(
                    '',
                    '',
                    '',
                    '',
                    'Totali €',
                    $total.' €',
                ));

            });

            $excel->sheet('Total Transactions', function($sheet) use( $dataArray )
            {
                $sheet->fromArray($dataArray,null,'A1',false,false);
            });

        });

        /*Mail::send('emails.report',["data"=>"Raporti Mujor - Nesim Bakija"],function($m) use($myFile){
            $m->to('orgesthaqi96@gmail.com')->subject('Raporti Mujor - Nesim Bakija');
            $m->attach($myFile->store("xls",false,true)['full']);
        });*/

        $myFile = $myFile->string('xlsx'); 
        $response =  array(
           'name' => $file_name, 
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);       
    }

    public static function exportPDF(Request $request){
        $payments   = self::generate_data($request);
        $balance    = self::generate_balance($request);
        $data       = self::getGeneralData($request);
        $company    = Company::where('status', 4)->first();
        $date 		= $request->fromDate;
        $last_payment = $request->input('last_payment');
        $inc_transactions = $request->input('inc_transactions');

        //dd($payments);exit();

        if(isset($request->user)){
            $id = $request->user;
            $user_details = Users::whereIN('id',$id)->get();
			//$payment_date = Payments::where('user_id', $id)->where('status', 1)->first()->pluck('date');
        }

        if(isset($request->company)){
            $id = $request->company;
            $company_details = Company::where('id',$id)->first();
			//$payment_date = Payments::where('company_id', $id)->where('status', 1)->first()->pluck('date');
        }

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date','data','inc_transactions', 'company','user_details','company_details'));
        $file_name  = 'Transaction - '.date('Y-m-d', time());
        return $pdf->stream($file_name);
        

        /*Mail::send('emails.report',["data"=>"Raporti Mujor - Nesim Bakija"],function($m) use($pdf){
            $m->to('orgesthaqi96@gmail.com')->subject('Raporti Mujor - Nesim Bakija');
            $m->attachData($pdf->output(),'Raporti - Nesim Bakija.pdf');
        });*/

        $myFile = $pdf->download($file_name.'.pdf');
        $response =  array(
           'name' => $file_name, 
           'file' => "data:application/pdf;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }

    public static function generate_data($request){
        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
		//$from_payment	= strtotime(date('Y-m-d', $from_date));
		//$to_payment	    = strtotime(date('Y-m-d', $to_date));


        $user           = $request->input('user');
        $company        = $request->input('company');
        $dailyReport    = $request->input('dailyReport');
        $date           = date('Y-m-d').' 00:00:00';
		
        $last_payment    = $request->input('last_payment');
		if($last_payment == 'Yes'){            
            $payments = Payments::where('user_id',$user )->orWhere('company_id',$company)->orderBy('date', 'desc')->first();	
			$from_date = $payments->date+1;
        }
		
        $transactions = Transaction::select("transactions.product_id",DB::RAW(" 'transaction' as type"),
                DB::RAW(" 0 as amount"),DB::RAW("transactions.created_at as date")
                ,"transactions.money",DB::RAW(" 0 as company")
                ,"users.name as username","transactions.created_at","companies.name as company_name",DB::RAW(" '' as description"))
            ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $transactions->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $transactions->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $transactions->whereIn('user_id',$user)->orWhere('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate') && !$request->input('dailyReport')) {
            $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        if ($request->input('dailyReport')) {
            $transactions->where('transactions.created_at', '>=', strtotime($date));
        }

        $payments = Payments::select("payments.user_id",DB::RAW(" 'payment' as type")
                ,"payments.amount","payments.date",
                DB::RAW(" 0 as money"),"payments.company_id"
                ,"users.name as username","payments.created_at","companies.name as company_name","payments.description")
            ->leftJoin('users', 'payments.user_id', '=', 'users.id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->union($transactions)
            ->orderBy('date','ASC');

        if ($request->input('user') && empty($request->input('company'))) {
            $payments->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $payments->where('payments.company_id','=',$company);
        }

        if ($request->input('company') && $request->input('user')) {
            $payments->whereIn('user_id',$user)->orWhere('payments.company_id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate') && !$request->input('dailyReport')) {
            $payments->whereBetween('payments.date',[$from_date, $to_date]);
        }

        if ($request->input('dailyReport')) {
            $payments->where('payments.date', '>=', strtotime($from_date));
        }
        
        $payments = $payments->get();
        return $payments;
    }

    public static function generate_balance($request){
        $from_date          = strtotime($request->input('fromDate'));
		$from_payment	    = strtotime(date('Y-m-d', $from_date));
        $user               = $request->input('user');
        $company            = $request->input('company');
        $last_payment    = $request->input('last_payment');
        $starting_balance   = 0;
		if($last_payment == 'Yes'){            
            $payments = Payments::where('user_id',$user )->orWhere('company_id',$company)->orderBy('date', 'desc')->first();	
			$from_date = $payments->date+1;
        }
        if($request->input('dailyReport')){
            $from_date      = strtotime(date('Y-m-d').' 00:00:00');
        }

        $tr = Transactions::where('transactions.created_at','<',$from_date)
            ->join('users', 'transactions.user_id', '=', 'users.id');
		
		if ($request->filled('company')){
			$tr->join('companies', 'companies.id', '=', 'users.company_id');
		}
		
        if ($request->filled('user') & !$request->filled('company')) {
            $tr->whereIn('user_id',$user);
            $users = Users::whereIn('id',$user)->get();

            foreach($users as $user){
                $starting_balance += $user->starting_balance;
            }
        }
		
        if ($request->filled('company') & !$request->filled('user')) {

            $tr->where('users.company_id','=',$company);
            $starting_balance = Company::findorFail($company)->starting_balance;
        }

        if($request->filled('company') && $request->filled('user')){
            $tr->whereIn('user_id',$user)->orWhere('users.company_id','=',$company);

            $users = Users::whereIn('id',$user)->get();

            foreach($users as $user){
                $starting_balance += $user->starting_balance;
            }

            $starting_balance += Company::findorFail($company)->starting_balance;

        }
		//dd($request->input('company') );
		//dd($tr->toSql());
        $transaction_total = $tr->sum('money');

        $paymentsOLD = Payments::where('payments.date','<',$from_date);
		
        if ($request->input('company') && !$request->filled('user')) {
            $paymentsOLD->where('payments.company_id','=',$company);
        }

        if ($request->input('user') && !$request->filled('company')) {
            $paymentsOLD->whereIn('user_id',$request->input('user'));
        }

        if($request->filled('company') && $request->filled('user')){
			$user = $request->input('user');
			//$paymentsOLD->orWhere(function ($query, $user, $company) {
				$paymentsOLD->whereIn('user_id',$user)->orWhere('payments.company_id','=',$company);
			//});
            //$paymentsOLD->whereIn('user_id',$user)->orWhere('payments.company_id','=',$company);
        }

        $paymentsOLD = $paymentsOLD->sum('amount');

        $balance = $transaction_total + $starting_balance - $paymentsOLD;
        
        return $balance;
    }

    public static function getGeneralData(Request $request){
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');
        $last_payment    = $request->input('last_payment');
		if($last_payment == 'Yes'){            
            $payments = Payments::where('user_id',$user )->orWhere('company_id',$company)->orderBy('date', 'desc')->first();	
			$from_date = $payments->date+1;
        }
        $usersFilter = Users::where('type','1')->pluck('name','id');

        $users = Transactions::select(DB::RAW('users.id as user_id'), 'users.name as user_name',DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->where('users.type','1')
            ->groupBy('users.id');

        if ($request->input('user') && empty($request->input('company'))) {
            $users = $users->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $users = $users->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $users = $users->whereIn('user_id',$user)->orWhere('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $users = $users->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $users = $users->get();

        $staffData = [];
        foreach($users as $value) {
            $staffData[$value->user_id]['id'] = $value->user_id;
            $staffData[$value->user_id]['user_name'] = $value->user_name;
            $staffData[$value->user_id]['totalMoney'] = $value->totalMoney;
            $staffData[$value->user_id]['totalLit'] = $value->totalLit;
        }
        
        $transactions = Transactions::select(DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.id as user_id'), DB::raw('products.name as product'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->where('users.type','1')
            ->groupBy('users.id')
            ->groupBy('products.id');

        if ($request->input('user') && empty($request->input('company'))) {
            $transactions = $transactions->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $transactions = $transactions->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $transactions = $transactions->whereIn('user_id',$user)->orWhere('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $transactions = $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $transactions = $transactions->get();

        $product_name = array();
        foreach ($staffData as $key => $value) {   
            foreach($transactions as $tr){
                if($key == $tr->user_id){
                    $staffData[$key][$tr->product] = [$tr->total];
                    $product_name[$tr->product] = $tr->product; 
                }
            }
        }
        

        $products = Transactions::select(DB::RAW('products.id as product_id'), 'products.name as product_name',
            DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->where('users.type','1')
            ->groupBy('products.id');
        
        if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('user_id',$user)->orWhere('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $products = $products->get();

        return $products;
    }

    public function search(Request $request) {

        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');

        $query = Transactions::select(DB::RAW('users.name as user_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.money','transactions.created_at')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user')) {
            $query = $query->where('users.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }
        $query->orderBy('transactions.created_at', 'DESC');
        $data = $query->get();

        $output = '';
        $total_row = $data->count();
        if($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.$row->user_name.'</td>
                    <td>'.$row->comp_name.'</td>
                    <td>'.$row->product.'</td>
                    <td>'.$row->price.'</td>
                    <td>'.$row->lit.'</td>
                    <td>'.$row->money.'</td>
                    <td>'.$row->created_at.'</td>
                </tr>
                ';
            }
        }else {
            $output .= '
            <tr>
                <td align="center" colspan="7">No Data Found</td>
            </tr>
            ';
        }
        $data['table_data'] = $output;

        echo json_encode($data);
    }

    public function searchWithPagination(Request $request) {
        $users          = Users::whereIn('type',[1,2,3,4,5])->pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        $from_date       = strtotime($request->input('fromDate'));
        $to_date         = strtotime($request->input('toDate'));
        $user            = $request->input('user');
        $company         = $request->input('company');
        $sort_by_company = $request->get('sortby');
        if($sort_by_company == 'name'){
            $sort_by = "transactions.created_at";
            $sort_type = "DESC";
        }else{
            $sort_by         = ($sort_by_company == 'company_id' ? "companies.name" : "transactions".".".$request->get('sortby'));
            $sort_type       = $request->get('sorttype');
        }
        $query = Transactions::select(DB::RAW('users.name as user_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.money','transactions.created_at','transactions.id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user')) {
            $query = $query->whereIn('users.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        if($request->ajax() == false){
            $query->orderBy('transactions.created_at', 'DESC');
            $transactions = $query->paginate(15);
            return view('/admin/transactions/home',compact('transactions','users','companies'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $transactions = $query->paginate(15);
            return view('/admin/transactions/table_data',compact('transactions','users','companies'))->render();
        }

    }

    public function generateDailyReport(Request $request) {
        $payments           = self::generate_data($request);
        $balance            = self::generate_balance($request);
        $data               = self::getGeneralData($request);
        $company            = Company::where('status', 4)->first();
        $date               = $request->fromDate;
        $inc_transactions   = $request->inc_transactions;

        if(isset($request->company)){
            $company_details = Company::where('id',$request->company)->first();
        }

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date','data','inc_transactions', 'company','user_details','company_details'));
        $file_name  = 'Transaction - '.date('Y-m-d', time());
        

        Mail::send('emails.report',["data"=>"Raporti Ditor - Nesim Bakija"],function($m) use($pdf,$company_details){
            // STATIC EMAIL - TEST
            $m->to('ideal.bakija@gmail.com')->subject('Raporti Ditor - Nesim Bakija');
            
            // DYNAMIC EMAIL 
            //$m->to($company_details->email)->subject('Raporti Ditor - Nesim Bakija');
            $m->attachData($pdf->output(),'Raporti - Nesim Bakija.pdf');
        });
   }

   public static function printFunction(Request $request)
    {
		$recepit = new PrintFuelRecept($request->input('id'));
        dispatch($recepit);
		return json_encode(array('response'=>true)); 
    }
} 
