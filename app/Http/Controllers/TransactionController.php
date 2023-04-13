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
use App\Models\InvoiceModel as Invoice;
use App\Models\InvoiceDetailsModel as InvoiceDetails;
use App\Models\TransactionChangeHistory;
use App\Models\Pump;
use Excel;
use Auth;
use DB;
use App\Models\Banks;
use DateTime;
use PDF;
use Carbon\Carbon;
use Mail;
use App\Jobs\PrintFuelRecept;
use App\Services\PrintFuelingService;
use App\Models\RunninProcessModel as RunningProcesses;

class TransactionController extends Controller
{
    public function index()  {
        $transactions   = Transactions::orderBy('created_at', 'desc')->paginate(15);
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->where('status', 1)->all();
        return view('/admin/transactions/home',compact('transactions','users','companies'));
    }

    public function info(){

        $transactions  = Transactions::orderBy('created_at', 'DESC')->limit(15)->get();

        return view('admin.transactions.transactions-info',compact('transactions'));

    }

    public function create() {
        $users       = Users::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $pfc         = PFC::pluck('name','id')->all();

        return view('/admin/transactions/create',compact('users','dispanesers','products','pfc'));
    }

    public function store(Request $request) {
        Transaction::create($request->all());

        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }

    public function edit($id) {
        $transaction    = Transactions::findOrFail($id);
        $users          = Users::where('status',1)->where('branch_id',NULL)->get();

        return view('/admin/transactions/edit',compact('transaction','users'));
    }

    public function update(Request $request, $id) {
        // Update transaction
        Transactions::where('id', $id)->update(array('user_id' => $request->input('user_id'), 'updated_at' => now()->timestamp));

        // Save transaction changes
        $history                    = new TransactionChangeHistory();
        $history->transaction_id    = $request->input('transaction_id');
        $history->previous_user_id  = $request->input('previous_user_id');
        $history->current_user_id   = $request->input('user_id');
        $history->updated_by        = Auth::user()->id;
        $history->created_at        = now()->timestamp;
        $history->updated_at        = now()->timestamp;
        $history->save();

        session()->flash('info','Success');
        return redirect('/admin/transactions');
    }

    public function destroy($id) {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }

    public function read() {
        TransactionService::read();
    }

    public function history($id) {
        $history = TransactionChangeHistory::where('transaction_id',$id)->orderBy('created_at','DESC')->get();

        return view('/admin/transactions/transaction_history',compact('history'))->render();
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
        $from_to_date = $request->fromDate . ' - ' . $request->toDate;

        $dataArray[] = array(strtoupper(trans('adminlte::adminlte.product')),strtoupper(trans('adminlte::adminlte.amount')),strtoupper(trans('adminlte::adminlte.total')));
        foreach($data as $d) {
            $dataArray[] = array(
                strtoupper(trans('adminlte::adminlte.product'))  => $d['product_name'],
                strtoupper(trans('adminlte::adminlte.amount'))    => $d['lit'] . ' litra',
                strtoupper(trans('adminlte::adminlte.total'))    => $d['money'] . ' Euro',
            );
        }


        $file_name  = 'Transactions - '.date('Y-m-d h-i', strtotime("now"));

        $myFile = Excel::create($file_name, function($excel) use( $transactions,$totalAmount,$startDate,$dataArray,$from_to_date )
        {
            $excel->sheet('Transactions', function($sheet) use( $transactions,$totalAmount,$startDate,$from_to_date )
            {

                if($totalAmount != 0){ $total = $totalAmount; }else{ $total = 0; };
                $totalToPay = 0;
                $totalPayed = 0;

                $sheet->appendRow(array(
                    strtoupper(trans('adminlte::adminlte.date')),
                    strtoupper(trans('adminlte::adminlte.type')),
                    strtoupper(trans('adminlte::adminlte.user')),
                    strtoupper(trans('adminlte::adminlte.bonus_user')),
                    strtoupper(trans('adminlte::adminlte.fill')),
                    strtoupper(trans('adminlte::adminlte.payments')),
                    strtoupper(trans('adminlte::adminlte.state')),
                    '       ',
                    strtoupper(trans('adminlte::adminlte.selected_date_to_show_data')),
                ));

                $sheet->cell('A2', function($cell) use( $startDate ){
                        $cell->setValue($startDate);
                });

                $sheet->cell('B2', function($cell) use( $totalAmount ){
                        $cell->setValue(strtoupper(trans('adminlte::adminlte.state')));
                });

                $sheet->cell('F2', function($cell) use( $totalAmount ){
                        $cell->setValue($totalAmount);
                });

                $sheet->cell('I2', function($cell) use( $from_to_date ){
                    $cell->setValue($from_to_date);
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
                    $total 	 = str_replace(',', '', $total);
                    $fueling = str_replace(',', '', $fueling);
                    $payment = str_replace(',', '', $payment);
                    $total	 = $total + $fueling - $payment;
                    $user  	 = $row->username ? $row->username : $row->company_id;
                    $bonus_user = $row->bonus_username;

					if($row->plates != "" && $row->plates != 0){
						$user = $row->plates;
					}


                    $sheet->appendRow(array(
                        date("Y-m-d H:i:s", $row->date),
                        $row->description == NULL  ? $row->type : $row->description,
                        $user,
                        $bonus_user,
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
        $payments   				= self::generate_data($request);
        $balance    				= self::generate_balance($request);
        $data       				= self::getGeneralData($request);
        $company    				= Company::where('status', 4)->first();
        $date 						= $request->fromDate;
        $date_to    				= $request->toDate;
        $bonus_user 				= $request->bonus_user;
        $inc_transactions 			= $request->input('inc_transactions');
        $inc_per_user 				= $request->input('inc_per_user');
        $company_checked  			= $request->input('company');
        $exc_balance  	  			= $request->input('exc_balance');
        $user_details  	  			= array();
        $total_transactions  	  	= array();

        if(!isset($inc_transactions) || $inc_transactions == 'No'){
            $total_transactions = $payments->groupBy(function($val) {
                return \Carbon\Carbon::parse(date('Y-m-d H:i', $val->date))->format('Y-m-d');
            });
        }

        if(isset($request->user)){
            $user_details = Users::whereIN('id',$request->user)->get();
        }

        if(isset($request->bonus_user) && !isset($request->user)){
            $user_details = Users::whereIN('id',$request->bonus_user)->get();
        }

        if(isset($request->company)){
            $id = $request->company;
            $company_details = Company::where('id',$id)->first();
        }

        if(isset($request->bonusUserOrder) && $request->bonusUserOrder == 'Yes'){
            $bonus_user_by_plates = 1;
        }else{
            $bonus_user_by_plates = 0;
        }

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date','date_to','bonus_user','data','inc_transactions', 'inc_per_user', 'company','user_details','company_details','total_transactions','company_checked', 'exc_balance','bonus_user_by_plates'));
        $file_name  = 'Transaction - '.date('Y-m-d', time()).'.pdf';


        if(isset($request->sendReportToEmail)){
            // We send email if button(#sendReportEmail) Send report to email in report view is clicked
            Mail::send('emails.report',["data"=>"Raporti Mujor"],function($m) use($pdf,$company){
                $m->to($company->email)->subject('Raporti Mujor - '.$company->name);
                $m->attachData($pdf->output(),'Raporti - '.$company->name.'.pdf');
            });
            return response()->json('DONE');
        }else{

            return $pdf->stream($file_name);

            $myFile = $pdf->download($file_name.'.pdf');
            $response =  array(
            'name' => $file_name,
            'file' => "data:application/pdf;base64,".base64_encode($myFile)
            );

            return response()->json($response);
        }
    }

    public static function invoice(Request $request){
        $data = self::invoice_data($request);
        $banks = Banks::where('status',1)->orderBy('name','ASC')->get();
        $all_companies = Company::where('status',1)->orderBy('name','ASC')->get();

        $from_company = $data['from_company'];
        $to_company = $data['to_company'];
        $total_transactions = $data['total_transactions'];
        $companies = $data['companies'];

        return view('/admin/transactions/invoice',compact('from_company','to_company','total_transactions','companies','banks','all_companies'));
    }

    public function generate_invoice_pdf(Request $request){
        $banks              = Banks::where('status',1)->orderBy('name','ASC')->get();
        $data               = self::invoice_data($request); // Display transactions group by PRICE
        $all_transactions   = self::invoice_all_transactions($request); // Display all transactions(Second page of PDF)

        $company            = $data['from_company'];
        $to_company         = $data['to_company'];
        $total_transactions = $data['total_transactions'];
        $companies          = $data['companies'];

        $invoice_id = Invoice::insertGetId([
            'date'          => now()->timestamp,
            'user_id'       => auth()->user()->id,
            'company_id'    => !empty($request->input('company')) ? $request->input('company') : 0,
            'paid'          => 1,
            'status'        => 1,
            'created_at'    => now()->timestamp,
            'updated_at'    => now()->timestamp
        ]);

        $invoice = Invoice::findOrFail($invoice_id);

        foreach ($all_transactions as $transaction) {
            Transactions::where('id', $transaction->tr_id)->update(['invoice_id' => $invoice_id, 'updated_at' => now()->timestamp]);
        }

        $pdf = PDF::loadView('admin.invoices.invoice_pdf',compact('company','to_company','total_transactions','companies','invoice_id','invoice','all_transactions','banks'));
        $file_name  = 'Transaction - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }

    public static function generate_invoice_date(Request $request) {

    }

    public static function invoice_data(Request $request){
        $companies          = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        $from_company       = Company::where('status', 4)->first();
        $to_company         = Company::where('id',$request->input('company'))->first();

        $from_date          = strtotime($request->input('fromDate'));
        $to_date            = strtotime($request->input('toDate'));

        $products = Transactions::select(DB::RAW('products.pfc_pr_id as product_id'), DB::raw('MAX(products.name) as product_name'), DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'),DB::raw('transactions.price as price'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('products.pfc_pr_id')
            ->groupBy('transactions.price');

        if ($request->input('id')) {
            $products = $products->where('transactions.id',$request->input('id'));
        }

        if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('user_id',$request->input('user'));
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('companies.id','=',$request->input('company'));
        }

        if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('user_id',$request->input('user'))->where('companies.id','=',$request->input('company'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }
        $total_transactions = $products->get();

        return ['from_company' => $from_company,'to_company' => $to_company,'total_transactions' => $total_transactions,'companies' => $companies];
    }

    public static function invoice_all_transactions(Request $request){
        $companies          = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        $from_company       = Company::where('status', 4)->first();
        $to_company         = Company::where('id',$request->input('company'))->first();

        $from_date          = strtotime($request->input('fromDate'));
        $to_date            = strtotime($request->input('toDate'));

        $products = Transactions::select(DB::RAW('transactions.id as tr_id'),DB::RAW('transactions.created_at as date'),DB::RAW('products.pfc_pr_id as product_id'), DB::raw('MAX(products.name) as product_name'), DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'),DB::raw('transactions.price as price'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('tr_id');

        if ($request->input('id')) {
            $products = $products->where('transactions.id',$request->input('id'));
        }

        /*if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('user_id',$request->input('user'));
        }*/

        /*if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('companies.id','=',$request->input('company'));
        }*/

        /*if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('user_id',$request->input('user'))->where('companies.id','=',$request->input('company'));
        }*/

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $all_transactions   = $products->get();

        return $all_transactions;
    }

    public static function generate_data($request){
        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));

        $user           = $request->input('user');
        $bonus_user     = $request->input('bonus_user');
        $company        = $request->input('company');
        $dailyReport    = $request->input('dailyReport');
        $date           = date('Y-m-d').' 00:00:00';

        $last_payment    = $request->input('last_payment');
		if($last_payment == 'Yes'){
            //$payments =	self::last_payment_date($request); //Payments::where('user_id',$user )->orWhere('company_id',$company)->orderBy('date', 'desc')->first();
			$from_date = self::last_payment_date($request);
        }

        $transactions = Transaction::select("transactions.id","transactions.product_id",DB::RAW(" 'T' as type"),
                DB::RAW(" 0 as amount"),DB::RAW("transactions.created_at as date")
                ,"transactions.money", "transactions.lit", "transactions.price", DB::RAW(" 0 as company")
                ,"user1.name as username","user2.name as bonus_username", "user1.plates","transactions.created_at","companies.name as company_name",DB::RAW(" '' as description"))
            ->leftJoin('users as user1', 'transactions.user_id', '=', 'user1.id')
            ->leftJoin('users as user2', 'transactions.bonus_user_id', '=', 'user2.id')
            ->leftJoin('companies', 'companies.id', '=', 'user1.company_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $transactions->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $transactions->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $transactions->whereIn('user_id',$user)->where('companies.id','=',$company);
        }

        if($request->input('bonus_user')){
            $transactions->whereIn('bonus_user_id',$bonus_user);
        }

        if ($request->input('fromDate') && $request->input('toDate') && !$request->input('dailyReport')) {
            $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        if ($request->input('dailyReport')) {
            $transactions->where('transactions.created_at', '>=', strtotime($date));
        }

        if($request->input('bonusUserOrder')){
            $transactions->orderBy('transactions.user_id');
			return $transactions->get();
        }

		if($request->input('exc_balance')){
			$transactions->orderBy('transactions.created_at');
			return $transactions->get();
        }

        $payments = Payments::select("payments.id","payments.user_id",DB::RAW(" 'P' as type")
                ,"payments.amount","payments.date as date",
                DB::RAW(" 0 as money"), DB::RAW(" 0 as lit"), DB::RAW(" 0 as price"), "payments.company_id"
                ,"users.name as username", DB::RAW(" '' as bonus_username"),DB::RAW(" '' as plates"), "payments.created_at","companies.name as company_name","payments.description")
            ->leftJoin('users', 'payments.user_id', '=', 'users.id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->union($transactions)
            ->orderBy('date','ASC');

        if($request->input('bonus_user') && empty($request->input('user')) && empty($request->input('company'))){
            $payments->where('user_id',0);
            $payments->where('payments.company_id',0);
        }

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
		if($request->input('exc_balance')){
			return 0;
        }


        $from_date          = strtotime($request->input('fromDate'));
		$from_payment	    = strtotime(date('Y-m-d', $from_date));
        $user               = $request->input('user');
        $company            = $request->input('company');
        $last_payment    = $request->input('last_payment');
        $starting_balance   = 0;
		if($last_payment == 'Yes'){
            $from_date = self::last_payment_date($request);
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
				$paymentsOLD->whereIn('user_id',$user)->where('payments.company_id','=',$company);
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
            $from_date = self::last_payment_date($request);
        }

        $products = Transactions::select(DB::RAW('products.pfc_pr_id as product_id'), DB::raw('MAX(products.name) as product_name'),
            DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            //->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            //->where('users.type','1')
            ->groupBy('products.pfc_pr_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('transactions.user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('users.company_id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('transactions.user_id',$user)->where('users.company_id','=',$company);
        }

		if($request->input('bonus_user')){
            $products = $products->where('transactions.bonus_user_id',$request->input('bonus_user'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $products = $products->get();

        return $products;
    }

	public static function getGeneralDataTotalizers(Request $request){

        $from_date  = $request->input('fromDate');
        $to_date    = $request->input('toDate');

        $user       = $request->input('user');
        $company    = $request->input('company');
        $last_payment    = $request->input('last_payment');
		if($last_payment == 'Yes'){
            $from_date = self::last_payment_date($request);
        }

        $products = Transactions::select(DB::raw('MAX(products.name) as product_name'), 'transactions.sl_no', 'transactions.channel_id', DB::raw('MAX(products.pfc_pr_id) as product_id'),
            DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'), DB::raw('Max(CAST(dis_tot as SIGNED)) as max_totalizer'), DB::raw('MIN(CAST(dis_tot_last as SIGNED)) as min_totalizer'), 'tanks.name as t_name'
					, 'tanks.pfc_tank_id as tank_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            //->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
			->join('pumps', function ($join) {
				$join->on('transactions.sl_no', '=', 'pumps.nozzle_id')
				->on('transactions.channel_id', '=', 'pumps.channel_id');
			})
			->leftJoin('tanks', 'pumps.tank_id', '=', 'tanks.pfc_tank_id')
			->orderBy('transactions.channel_id')
			->orderBy('transactions.sl_no')
            ->groupBy('transactions.sl_no', 'transactions.channel_id');
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);


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
        $users          = Users::where('status',1)->whereIn('type',[1,2,3,4,5])->orderBy('name','asc')->pluck('name','id')->all();
        $bonus_users    = Users::where('status',1)->whereIn('type',[6,7,8])->orderBy('name','asc')->select('name','id')->get();
        $companies      = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
        $main_company   = Company::where('status',4)->first();

        $from_date       = strtotime($request->input('fromDate'));
        $to_date         = strtotime($request->input('toDate'));
        $user            = $request->input('user');
        $bonus_user      = $request->input('bonus_user');
        $company         = $request->input('company');
        $sort_by_company = $request->get('sortby');
        if($sort_by_company == 'name'){
            $sort_by = "transactions.created_at";
            $sort_type = "DESC";
        }else{
            $sort_by         = ($sort_by_company == 'company_id' ? "companies.name" : "transactions".".".$request->get('sortby'));
            $sort_type       = $request->get('sorttype');
        }
        $query = Transactions::select(DB::RAW('user1.name as user_name'),DB::RAW('user2.name as bonus_name'),DB::RAW('user3.name as driver_name'), DB::RAW('companies.name as comp_name'), DB::RAW('companies.id as comp_id'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.money','transactions.created_at','transactions.id','transactions.invoice_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users as user1', 'user1.id', '=', 'transactions.user_id')
            ->leftJoin('users as user2', 'user2.id', '=', 'transactions.bonus_user_id')
            ->leftJoin('users as user3', 'user3.id', '=', 'transactions.driver_id')
            ->leftJoin('companies', 'companies.id', '=', 'user1.company_id');

        if ($request->input('user')) {
            $query = $query->whereIn('user1.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if(Auth::check() == 0 && $main_company->show_transaction == 1){
            $query = $query->where('transactions.created_at','>=',strtotime(Carbon::now()->subDays($main_company->show_transaction_time)));
        }

        if (Auth::check() == 1 && $request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        if ($request->input('bonus_user')) {
            $query = $query->whereIn('user2.id',$bonus_user);
        }

        if($request->ajax() == false){
            $query->orderBy('transactions.created_at', 'DESC');
            $transactions = $query->paginate(15);
            return view('/admin/transactions/home',compact('transactions','users','companies','bonus_users'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $transactions = $query->paginate(15);
            return view('/admin/transactions/table_data',compact('transactions','users','companies','bonus_users'))->render();
        }

    }

    public function generateDailyReport(Request $request) {
        $payments           = self::generate_data($request);
		$balance            = self::generate_balance($request);
        $data               = self::getGeneralData($request);
        $company            = Company::where('status', 4)->first();
        $date               = $request->fromDate;
        $inc_transactions   = $request->inc_transactions;
        $exc_balance  		= $request->exc_balance;
        $inc_per_user  		= $request->inc_per_user;
        $bonus_user_by_plates = $request->bonus_user_by_plates ? $request->bonus_user_by_plates : 0;
        $company_checked    = $request->input('company');
        $date_to			= $request->input('date_to');
        $to_date			= $request->input('toDate');
        if(isset($request->company)){
            $company_details = Company::find($request->company);
        }
		if(count($payments) == 0){
			return false;
		}

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date', 'date_to', 'data','inc_transactions', 'company','company_details','company_checked', 'exc_balance','to_date','inc_per_user','bonus_user_by_plates'));
        $file_name  = 'Transaction - '.date('Y-m-d', time()).'.pdf';


        Mail::send('emails.report',["data"=> "Raport"],function($m) use($pdf, $company_details, $company){
            // Send to multiple emails if divided by comma
			$email = array_map('trim', explode(',',$company_details->email) );

            $m->to($email)->subject('Raport Transaksionesh - '.$company->name);
            $m->attachData($pdf->output(),'Raporti - '.$company->name.'.pdf');
        });
    }

	public static function last_payment_date($request){
		if($request->input('user')){
			$query = Payments::where('user_id',$request->input('user') );
		}else{
			$query = Payments::where('company_id',$request->input('company') );
		}
		$payments = $query->orderBy('date', 'desc')->first();
		return $payments->date+1;
	}

    public static function printFunction(Request $request) {
		//$recepit = new PrintFuelRecept($request->input('id'));
        //dispatch($recepit);
		$variable = PrintFuelingService::printFunction($request->input('id'));

		return json_encode(array('response'=>true));
    }

    public static function totalizers(Request $request) {
		
		$rp                 = new RunningProcesses;
        $rp->pfc_id         = '1';
        $rp->start_time     = '1';
        $rp->refresh_time   = '1';
        $rp->faild_attempt  = '0';
        $rp->class_name     = '1';
        $rp->type_id        = '8';
        $rp->created_at     = '1';
        $rp->updated_at     = '1';

        $rp->save();
		
		while(true){
			$runningProcesses = RunningProcesses::where('type_id', 8)->get();
			$runningProcessesCount = $runningProcesses->count();	
			if($runningProcessesCount == 0){
				break;
			}			
		}
		/*
        $totalizers = DB::table('transactions')
                        ->select('id','sl_no','channel_id','dis_tot as dis_tot_last')
                        ->whereRaw('id IN (SELECT MAX(id) FROM transactions GROUP BY sl_no,channel_id)')
                        ->orderBy('channel_id','ASC')
                        ->orderBy('sl_no','ASC')
                        ->get();
		*/
		$totalizers = Pump::where('starting_totalizer', '!=', 0)
                        ->orderBy('channel_id','ASC')
                        ->orderBy('nozzle_id','ASC')
						->get();

        return view('/admin/totalizers/home',compact('totalizers'));
    }

    public function export_totalizers_to_pdf(Request $request){
        $totalizers = self::totalizers($request)['totalizers'];

        $pdf = PDF::loadView('admin.totalizers.export_to_pdf',compact('totalizers'));
        $file_name  = 'Totalizers - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }
}
