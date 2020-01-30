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
use Carbon\Carbon;
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
        $companies      = Company::pluck('name','id')->where('status', 1)->all();
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
        $from_to_date = $request->fromDate . ' - ' . $request->toDate;

        $dataArray[] = array('PRODUKTI','SASIA','TOTALI');
        foreach($data as $d) {
            $dataArray[] = array(
                'PRODUKTI'  => $d['product_name'],
                'SASIA'     => $d['lit'] . ' litra',
                'TOTALI'    => $d['money'] . ' Euro',
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
                    'DATA',
                    'LLOJI',
                    'PERSONI',
                    'BONUS PERSONI',
                    'MBUSHJA',
                    'PAGESA',
                    'GJENDJA',
                    '       ',
                    'Datat e zgjedhura për paraqitjen e të dhënave',
                ));

                $sheet->cell('A2', function($cell) use( $startDate ){
                        $cell->setValue($startDate);
                });

                $sheet->cell('B2', function($cell) use( $totalAmount ){
                        $cell->setValue('GJENDJA');
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
                        $row->created_at,
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
        $payments   = self::generate_data($request);
        $balance    = self::generate_balance($request);
        $data       = self::getGeneralData($request);
        $company    = Company::where('status', 4)->first();
        $date 		= $request->fromDate;
        $date_to    = $request->toDate;
        $bonus_user = $request->bonus_user;
        $inc_transactions = $request->input('inc_transactions');
        $company_checked  = $request->input('company');
		$exc_balance  	  = $request->input('exc_balance');

        if(!isset($inc_transactions) || $inc_transactions == 'No'){
            $total_transactions = $payments->groupBy(function($val) {
                return \Carbon\Carbon::parse(date('Y-m-d H:i', $val->date))->format('Y-m-d');
            });
        }

        if(isset($request->user)){
            $user_details = Users::whereIN('id',$request->user)->get();
			//$payment_date = Payments::where('user_id', $id)->where('status', 1)->first()->pluck('date');
        }

        if(isset($request->bonus_user) && !isset($request->user)){
            $user_details = Users::whereIN('id',$request->bonus_user)->get();
        }

        if(isset($request->company)){
            $id = $request->company;
            $company_details = Company::where('id',$id)->first();
			//$payment_date = Payments::where('company_id', $id)->where('status', 1)->first()->pluck('date');
        }

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date','date_to','bonus_user','data','inc_transactions', 'company','user_details','company_details','total_transactions','company_checked', 'exc_balance'));
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

        $transactions = Transaction::select("transactions.product_id",DB::RAW(" 'T' as type"),
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
            $transactions->whereIn('user_id',$user)->orWhere('companies.id','=',$company);
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

		if($request->input('exc_balance')){
			$transactions->orderBy('transactions.created_at');
			return $transactions->get();
        }

        $payments = Payments::select("payments.user_id",DB::RAW(" 'P' as type")
                ,"payments.amount","payments.date",
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
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            //->where('users.type','1')
            ->groupBy('products.pfc_pr_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('user_id',$user)->where('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $products = $products->get();

        return $products;
    }

	public static function getGeneralDataTotalizers(Request $request){
        /* if(!$request->input('fromDate')){
			$from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
		}else{
			$from_date  = strtotime($request->input('fromDate'));
			$to_date    = strtotime($request->input('toDate'));
        }

        if(!$request->input('shift')){
            $from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
        }else if(!$request->input('fromDate') && $request->input('shift')){
            $from_date  = str_replace(' ', '', explode("-", $request->input('shift'))[0]);
			$to_date    = str_replace(' ', '', explode("-", $request->input('shift'))[1]);
        }*/
        $from_date  = $request->input('fromDate');
        $to_date    = $request->input('toDate');
        
        $user       = $request->input('user');
        $company    = $request->input('company');
        $last_payment    = $request->input('last_payment');
		if($last_payment == 'Yes'){
            $from_date = self::last_payment_date($request);
        }

        $products = Transactions::select(DB::raw('MAX(products.name) as product_name'), 'transactions.sl_no', 'transactions.channel_id', DB::raw('MAX(products.pfc_pr_id) as product_id'),
            DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'), DB::raw('Max(CAST(dis_tot as SIGNED)) as max_totalizer'), DB::raw('MIN(CAST(dis_tot as SIGNED)) as min_totalizer'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('transactions.sl_no')
            ->groupBy('transactions.channel_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $products = $products->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $products = $products->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $products = $products->whereIn('user_id',$user)->where('companies.id','=',$company);
        }

        //if ($from_date && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        //}

        $products = $products->get();


		$min_totalizers = Transactions::select('transactions.sl_no', 'transactions.channel_id', DB::raw('MAX(CAST(dis_tot as SIGNED)) as totalizer'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('transactions.sl_no')
            ->groupBy('transactions.channel_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $min_totalizers = $min_totalizers->whereIn('user_id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $min_totalizers = $min_totalizers->where('companies.id','=',$company);
        }

        if($request->input('user') && $request->input('company')){
            $min_totalizers = $min_totalizers->whereIn('user_id',$user)->where('companies.id','=',$company);
        }

        //if ($request->input('fromDate') && $request->input('toDate')) {
            $min_totalizers = $min_totalizers->where('transactions.created_at', '<', $from_date);
        //}

        $min_totalizers = $min_totalizers->get();
		foreach($products as $p){
			foreach($min_totalizers as $mt){
					if($p->channel_id == $mt->channel_id && $p->sl_no == $mt->sl_no){
							$p->min_totalizer = $mt->totalizer;
					}
			}
		}

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
        $query = Transactions::select(DB::RAW('user1.name as user_name'),DB::RAW('user2.name as bonus_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.money','transactions.created_at','transactions.id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users as user1', 'user1.id', '=', 'transactions.user_id')
            ->leftJoin('users as user2', 'user2.id', '=', 'transactions.bonus_user_id')
            ->leftJoin('companies', 'companies.id', '=', 'user1.company_id');

        if ($request->input('user')) {
            $query = $query->whereIn('user1.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
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
        $company_checked    = $request->input('company');
		$date_to			= $request->input('date_to');
        if(isset($request->company)){
            $company_details = Company::find($request->company);

        }

		if(count($payments) == 0){
			return false;
		}
        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','balance','date', 'date_to', 'data','inc_transactions', 'company','user_details','company_details','company_checked', 'exc_balance'));
        $file_name  = 'Transaction - '.date('Y-m-d', time());


        Mail::send('emails.report',["data"=>"Raport Transaksionesh - Nesim Bakija"],function($m) use($pdf, $company_details){
            // Send to multiple emails if divided by comma
			$email = array_map('trim', explode(',',$company_details->email) );

            $m->to($email)->subject('Raport Transaksionesh - Nesim Bakija');
            $m->attachData($pdf->output(),'Raporti - Nesim Bakija.pdf');
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

    public static function printFunction(Request $request)
    {
		$recepit = new PrintFuelRecept($request->input('id'));
        dispatch($recepit);
		return json_encode(array('response'=>true));
    }
}
