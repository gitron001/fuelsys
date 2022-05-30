<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Mail;
use Excel;
use Artisan;
use App\Models\Tank;
use App\Models\Stock;
use App\Models\Users;
use App\Models\Banks;
use App\Models\Shifts;
use App\Models\Company;
use App\Models\Expenses;
use App\Models\Payments;
use App\Models\Categories;
use App\Models\POSPayments;
use App\Models\TankHistory;
use App\Jobs\SendShiftEmail;
use Illuminate\Http\Request;
use App\Models\Transaction as Transactions;
use App\Models\Dispaneser as Dispaneser;
use App\Models\RunninProcessModel as RunningProcessesModel;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Http\Controllers\TransactionController as TransactionController;



class StaffController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
		set_time_limit(500);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    **/
    public function export_excel(Request $request){

        $request                = self::setDates($request);

        $totalizer_totals   = TransactionController::getGeneralDataTotalizers($request);
        $products           = self::show_products_info($request);

        $staffData          = self::show_staff_info($request)['staffData'];
        $product_name       = self::show_staff_info($request)['product_name'];
        array_unshift($product_name , trans('adminlte::adminlte.user')); // Append "Perdoruesi" in the beginning of the array
        array_push($product_name,'Euro'); // Append "Euro" in the end of the array

        $companyData            = self::show_companies_info($request)['companyData'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        array_unshift($product_name_company , trans('adminlte::adminlte.company')); // Append "Kompania" in the beginning of the array
        array_push($product_name_company,'Euro'); // Append "Euro" in the end of the array


        $file_name  = 'Staff_View_Excel - '.date('Y-m-d h-i', strtotime("now"));

        $myFile = Excel::create($file_name, function($excel) use( $products,$totalizer_totals,$staffData,$product_name,$companyData,$product_name_company )
        {
            $excel->getDefaultStyle()
                    ->getAlignment()
                    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            // Total SECTION
            $excel->sheet('Total', function($sheet) use( $products,$totalizer_totals )
            {

                $sheet->cell('A1:E1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->appendRow(array(
                    trans('adminlte::adminlte.product'),
                    trans('adminlte::adminlte.price'),
                    trans('adminlte::adminlte.amount'),
                    trans('adminlte::adminlte.staff_details.quantity_with_numbers'),
                    trans('adminlte::adminlte.change'),
                ));

                $totalizer_sales = array();
                foreach($totalizer_totals as $product) {
                    if(isset($totalizer_sales[$product['product_id']])){
					    $totalizer_sales[$product['product_id']] += number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
				    }else{
					    $totalizer_sales[$product['product_id']]  = number_format(($product['max_totalizer'] - $product['min_totalizer'])/100, 2, '.', '');
                    }
                }

                foreach ($products as $product) {
                    $sheet->appendRow(array(
                        $product['p_name'],
                        $product['product_price'],
                        $product['totalLit'],
                        $totalizer_sales ? $totalizer_sales[$product['product_id']] : '',
                        $totalizer_sales ? number_format($totalizer_sales[$product['product_id']], 2, '.', '') - number_format($product['totalLit'], 2, '.', '') . " litra" : '',
                    ));
                }

            });

            // Staff SECTION
            $excel->sheet('Staff', function($sheet) use( $staffData,$product_name )
            {
                $sheet->cell('A1:E1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                // Header of Excel File
                $sheet->appendRow(
                    $product_name
                );

                $i = 0;
                $total_staff = 0;
                $product_totals = array();
                $final_data_array = array(); // Main array
                $product_name = array_slice($product_name, 1, -1); // Remove the first(Perdoruesi) and last(Euro) item of the array
                foreach ($staffData as $transaction) {
                    // PERDORUESI row
                    $final_data_array[][$i] =  $transaction['user_name'];

                    // Euro Diesel , Euro Super , Propan-Butan rows
                    foreach($product_name as $key => $value){
                        $lit = !empty($transaction[$key]) ? $transaction[$key][0] ." litra / " : '0 litra / ';
                        $euro = !empty($transaction[$key][0]) ? number_format($transaction[$key][0] *  $transaction[$key][1], 2). " Euro" : '0 Euro';
                        $final_data_array[$i][] = $lit . $euro ;

                        if(isset($transaction[$key])){
                            if(isset($product_totals[$key])){
                            $product_totals[$key]['lit'] += $transaction[$key][0];
                            $product_totals[$key]['money'] += $transaction[$key][0] * $transaction[$key][1];
                            }else{
                            $product_totals[$key]['lit'] = $transaction[$key][0];
                            $product_totals[$key]['money'] = $transaction[$key][0] * $transaction[$key][1];
                            }
                        }
                    }

                    // EURO row
                    $final_data_array[$i][] = number_format($transaction['totalMoney'],2)." Euro";
                    $total_staff += $transaction['totalMoney'];
                    $i++;
                }

                // Append last row of table (TOTAL)
                $total_data = array("TOTAL");
                foreach($product_name as $key => $value){
                    $total_data[] = $product_totals[$key]['lit'] ." Lit / " . number_format($product_totals[$key]['money'], 2, '.', '') ." Euro";
                }
                $total_data[] = number_format($total_staff,2). " Euro";

                // Append last row(TOTAL) of table to main array of data
                $final_data_array[] = $total_data;

                // Print Excel file
                foreach ($final_data_array as $fd) {
                    $sheet->appendRow($fd);
                }
            });

            // Companies SECTION
            $excel->sheet('Companies', function($sheet) use( $companyData,$product_name_company )
            {
                $sheet->cell('A1:E1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                // Header of Excel File
                $sheet->appendRow(
                    $product_name_company
                );

                $i = 0;
                $total_staff = 0;
                $product_totals = array();
                $final_data_array = array(); // Main array
                $product_name_company = array_slice($product_name_company, 1, -1); // Remove the first(Perdoruesi) and last(Euro) item of the array
                foreach ($companyData as $transaction) {
                    // PERDORUESI row
                    $final_data_array[][$i] =  $transaction['company_name'];

                    // Euro Diesel , Euro Super , Propan-Butan rows
                    foreach($product_name_company as $key => $value){
                        $lit = !empty($transaction[$key]) ? $transaction[$key][0] ." litra / " : '0 litra / ';
                        $euro = !empty($transaction[$key][0]) ? number_format($transaction[$key][0] *  $transaction[$key][1], 2). " Euro" : '0 Euro';
                        $final_data_array[$i][] = $lit . $euro ;

                        if(isset($transaction[$key])){
                            if(isset($product_totals[$key])){
                            $product_totals[$key]['lit'] += $transaction[$key][0];
                            $product_totals[$key]['money'] += $transaction[$key][0] * $transaction[$key][1];
                            }else{
                            $product_totals[$key]['lit'] = $transaction[$key][0];
                            $product_totals[$key]['money'] = $transaction[$key][0] * $transaction[$key][1];
                            }
                        }
                    }

                    // EURO row
                    $final_data_array[$i][] = number_format($transaction['totalMoney'],2)." Euro";
                    $total_staff += $transaction['totalMoney'];
                    $i++;
                }

                // Append last row of table (TOTAL)
                $total_data = array("TOTAL");
                foreach($product_name_company as $key => $value){
                    $total_data[] = $product_totals[$key]['lit'] ." Lit / " . number_format($product_totals[$key]['money'], 2, '.', '') ." Euro";
                }
                $total_data[] = number_format($total_staff,2) . " Euro";

                // Append last row(TOTAL) of table to main array of data
                $final_data_array[] = $total_data;

                // Print Excel file
                foreach ($final_data_array as $fd) {
                    $sheet->appendRow($fd);
                }
            });

        });

	
		

        $myFile = $myFile->string('xlsx');
        $response =  array(
           'name' => $file_name,
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }

    public function staff_view(Request $request){
        $users          		= self::additional_data($request)['users'];
        $banks          		= self::additional_data($request)['banks'];

        $request      			= self::setDates($request);

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();

        $staffData              = self::show_staff_info($request)['staffData'];
        $product_name           = self::show_staff_info($request)['product_name'];

        $companyData            = self::show_companies_info($request)['companyData'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        $companies              = self::show_companies_info($request)['companies'];

        $products               = self::show_products_info($request);

        $expenses               = self::show_expenses_info($request);

        $pos_sales              = self::show_pos_sales_info($request);

        $payments               = self::show_payments_info($request);
		$tanks					=  array(); //Tank::where('status', 1)->get();
		$tank_details			= self::show_tank_info($request);
		$categories		        = Categories::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        $totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
		$stock_details			= array();
		$prev_stock_details		= array();

        return view('admin.staff.staff_view',compact('shift','staffData','products','product_name','companies', 'totalizer_totals','companyData','product_name_company','expenses','payments','users','banks','tank_details','stock_details','tanks','prev_stock_details','pos_sales','categories'))->withModel($tanks);;
    }

    public function expenses(Request $request){
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $expenses               = self::show_expenses_info($request);

        return view('admin.staff.staff_view',compact('shift','expenses','users','banks'));
    }

    public function payments(Request $request){
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $payments               = self::show_payments_info($request);

        return view('admin.staff.staff_view',compact('shift','payments','users','banks'));
    }

    public function dispensers(Request $request){
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $products               = self::show_products_info($request);
        $totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
		$stocks					= self::get_incoming_stock($request);
		$tanks					= Tank::where('status', 1)->get();

        return view('admin.staff.staff_view',compact('shift','products', 'totalizer_totals','stocks','users','banks'));
    }

    public function companies(Request $request){
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $companyData            = self::show_companies_info($request)['companyData'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        $companies              = self::show_companies_info($request)['companies'];

        return view('admin.staff.staff_view',compact('shift','companyData', 'product_name_company', 'companies','users','banks'));
    }

	public function products(Request $request){
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
        $products               = self::show_products_info($request, 'products_view');
        $products_average       = self::show_products_average_info($request);
        $totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);

        return view('admin.staff.staff_view',compact('shift','products', 'totalizer_totals','products_average','users','banks'));

	}

    public static function show_payments_info($request, $view_type = null){
        $payments = Payments::select(DB::raw('SUM(amount) as total'),DB::RAW('companies.name as company'), DB::RAW('created_by'), DB::RAW('u1.name as user'),DB::RAW('u2.name as created_by'),'date','description')
            ->leftJoin( DB::RAW('users u1'), 'u1.id', '=', 'payments.user_id')
            ->leftJoin( DB::RAW('users u2'), 'u2.id', '=', 'payments.created_by')
            ->leftJoin('companies', 'companies.id', '=', 'payments.company_id')
            ->groupBy('payments.id');

        $payments = $payments->whereBetween('payments.date',[$request->input('fromDate'), $request->input('toDate')]);

        $payments = $payments->orderBy('payments.date');

        $payments = $payments->get();

        return $payments;
    }

    public static function show_tank_info($request, $view_type = null){
        $tank_details = TankHistory::select('*');

        if(!empty($request->shift)){
            $tank_details = $tank_details->where('tank_history.shift_id',$request->shift);
        }else{
            $tank_details = $tank_details->whereBetween('tank_history.date',[$request->input('fromDate'), $request->input('toDate')]);
        }

        $tank_details = $tank_details->orderBy('tank_history.name');

        $tank_details = $tank_details->get();

        return $tank_details;
    }

	public static function stock(Request $request){
        $staffData              = self::show_staff_info($request)['staffData'];
        $product_name           = self::show_staff_info($request)['product_name'];
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];
		$tanks					= Tank::where('status', 1)->get();
		$shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
		$totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
		$products               = self::show_products_info($request);
		$stocks					= self::get_incoming_stock($request);
		$categories				= self::get_incoming_stock($request);

		return view('admin.staff.staff_view',compact('shift','tanks','totalizer_totals','products','stocks','staffData','product_name','users','banks', 'categories'));

	}

    public static function show_stock_info($request, $view_type = null){
        $prev_stock_details = Stock::select(DB::RAW('tanks.name as tank_name'),DB::raw('SUM(amount) AS amount'),'tank_id','product_id')
            ->leftJoin('tanks', 'tanks.id', '=', 'stocks.tank_id')
            ->groupBy('stocks.tank_id');

        $prev_stock_details = $prev_stock_details->where('stocks.date','<',$request->input('fromDate'));

        $prev_stock_details = $prev_stock_details->get();

        $stock_details = Stock::select(DB::RAW('tanks.name as tank_name'),DB::raw('SUM(amount) AS amount'),'tank_id','product_id')
            ->leftJoin('tanks', 'tanks.id', '=', 'stocks.tank_id')
            ->groupBy('stocks.tank_id');

        $stock_details = $stock_details->whereBetween('stocks.date',[$request->input('fromDate'), $request->input('toDate')]);

        $stock_details = $stock_details->get();

        $sales  = Transactions::select(DB::RAW('sum(lit) as total_lit'), DB::RAW('max(tank_id) as tank_id'))
                    ->join('pumps', function ($join) {
                        $join->on('transactions.sl_no', '=', 'pumps.nozzle_id')
                        ->on('transactions.channel_id', '=', 'pumps.channel_id');
                    })
                    ->groupBy('pumps.tank_id');

        $sales = $sales->where('transactions.created_at','<',$request->input('fromDate'));

        $sales = $sales->get();


        return ['prev_stock_details' => $prev_stock_details, 'stock_details' => $stock_details, 'sales' => $sales];
    }

    public static function show_expenses_info($request, $view_type = null){
        $expenses = Expenses::select(DB::raw('SUM(amount) as total'), DB::RAW('user_id as user'), DB::RAW('users.name as name'),'description','date')
            ->leftJoin('users', 'users.id', '=', 'expenses.user_id')
            ->groupBy('expenses.id');

        $expenses = $expenses->whereBetween('expenses.date',[$request->input('fromDate'), $request->input('toDate')]);

        $expenses = $expenses->orderBy('expenses.user_id');

        $expenses = $expenses->get();

        return $expenses;
    }

    public static function show_pos_sales_info($request, $view_type = null){
        $pos_sales = POSPayments::select(DB::raw('SUM(amount) as total'), DB::RAW('bank_id as bank'), DB::RAW('banks.name as name'),'date')
            ->leftJoin('banks', 'banks.id', '=', 'pos_payments.bank_id')
            ->groupBy('pos_payments.id');

        $pos_sales = $pos_sales->whereBetween('pos_payments.date',[$request->input('fromDate'), $request->input('toDate')]);

        $pos_sales = $pos_sales->orderBy('pos_payments.date');

        $pos_sales = $pos_sales->get();

        return $pos_sales;
    }

    public static function show_products_info($request, $view_type = null){

        $products 	= Transactions::select(DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'), DB::raw('count(transactions.id) as transNR'), DB::RAW('MAX(products.name) as p_name'), DB::RAW('MAX(products.pfc_pr_id) as product_id'), DB::RAW('max(transactions.price) as product_price'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('products.pfc_pr_id');

		if($view_type == 'products_view'){
			$products = $products->groupBy('transactions.price');
		}

        $products = $products->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);

        $products = $products->orderBy('products.pfc_pr_id');

        $products = $products->get();

        return $products;
    }
	
	
	public static function show_products_info_daily(Request $request){
		
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
		
        $products 	= Transactions::select(DB::raw("DATE_FORMAT(FROM_UNIXTIME(transactions.created_at), '%e %b %Y') as date"), DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'),DB::raw('SUM(lit) as totalLit'), DB::RAW('MAX(products.name) as p_name'), DB::RAW('MAX(products.pfc_pr_id) as product_id'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('date')
            ->groupBy('transactions.price')
            ->groupBy('products.pfc_pr_id');

        $products = $products->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);

        $products = $products->orderBy('transactions.created_at');

        $products = $products->get();
		$categories		        = Categories::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
	
		return view('admin.staff.staff_view',compact('shift', 'products', 'users', 'banks','categories'));		
    }
	
	public static function show_products_info_daily_excel(Request $request){
		
        $request                = self::setDates($request);
        $users                  = self::additional_data($request)['users'];
        $banks                  = self::additional_data($request)['banks'];

        $shift                  = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->get();
		
        $products 	= Transactions::select(DB::raw("DATE_FORMAT(FROM_UNIXTIME(transactions.created_at), '%e %b %Y') as date"), DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'),DB::raw('SUM(lit) as totalLit'), DB::RAW('MAX(products.name) as p_name'), DB::RAW('MAX(products.pfc_pr_id) as product_id'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('date')
            ->groupBy('transactions.price')
            ->groupBy('products.pfc_pr_id');

        $products = $products->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);

        $products = $products->orderBy('transactions.created_at');

        $products = $products->get();
	
		$file_name  = 'Product_Sales - '.date('Y-m-d h-i', strtotime("now"));

        $myFile = Excel::create($file_name, function($excel) use( $products )
        {
            $excel->getDefaultStyle()
                    ->getAlignment()
                    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            // Total SECTION
            $excel->sheet('Total', function($sheet) use( $products)
            {

                $sheet->cell('A1:E1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->appendRow(array(
                    trans('adminlte::adminlte.date'),
                    trans('adminlte::adminlte.product'),
                    trans('adminlte::adminlte.price'),
                    trans('adminlte::adminlte.amount'),
                    trans('adminlte::adminlte.total'),
                ));

                foreach ($products as $product) {
                    $sheet->appendRow(array(
                        $product['date'],
                        $product['p_name'],
                        number_format($product['totalMoney']/$product['totalLit'], 2, '.', '' ),
                        $product['totalMoney'],
                        $product['totalLit'],
                    ));
                }

            });


        });
				
        $myFile = $myFile->string('xlsx');
        $response =  array(
           'name' => $file_name,
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }

    public static function show_products_average_info($request, $view_type = null){
        $products 	= Transactions::select(DB::RAW('products.name as p_name'), DB::RAW('AVG(transactions.price) as product_price'), DB::RAW('SUM(transactions.lit) as totalLit'), DB::RAW('products.pfc_pr_id as product_id'), DB::raw('count(transactions.id) as transNR'),DB::RAW('MAX(products.pfc_pr_id) as product_id'),DB::raw('avg(money) as totalMoney'))
                ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
                ->groupBy('products.pfc_pr_id');

        if($view_type == 'products_view'){
            $products = $products->groupBy('transactions.price');
        }

        $products = $products->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);

        $products = $products->orderBy('products.pfc_pr_id');

        $products = $products->get();

        return $products;
    }

    public static function show_staff_info($request){
        $user       = $request->input('user');

		$staffData = [];
        $transactions = Transactions::select(DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.id as user_id'),DB::raw('AVG(transactions.price) as product_price'), DB::raw('max(products.name) as product'), DB::raw('max(users.name) as user_name'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->whereIn('users.type',['1', '3', '4'])
            ->groupBy('users.id')
            ->groupBy('products.id');
            //->groupBy('transactions.price')

        if ($request->input('user')) {
            $transactions = $transactions->whereIn('users.id',$user);
        }

        $transactions = $transactions->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);

        $transactions = $transactions->get();

        $product_name = array();
        foreach($transactions as $tr){
                if(!isset($staffData[$tr->user_id])){
                    $staffData[$tr->user_id] = array();
                    $staffData[$tr->user_id]['totalMoney'] = 0;
                }
                $staffData[$tr->user_id]['user_name'] = $tr->user_name;
                //$staffData[$tr->user_id][$tr->product.'_'.$tr->product_price] = [$tr->total,$tr->product_price];
                $staffData[$tr->user_id][$tr->product] = [$tr->total,$tr->product_price,$tr->money];
                $staffData[$tr->user_id]['totalMoney'] += ($tr->money);
                $product_name[$tr->product] = $tr->product;
                //$product_name[$tr->product.'_'.$tr->product_price] = $tr->product;
        }

        return array('staffData'=>$staffData,'product_name' => $product_name);
    }

    public static function show_companies_info($request){
        $companyData = [];
		$companies 	= Transactions::select(DB::raw('max(companies.name) as company_name'),DB::raw('companies.id as company_id'),DB::raw('SUM(money) as money'),DB::raw('SUM(lit) as total'), DB::RAW('MAX(products.name) as p_name'),DB::raw('max(products.name) as product'),DB::raw('AVG(transactions.price) as product_price'))
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('companies', 'users.company_id', '=', 'companies.id')
            ->join('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('companies.id')
            ->groupBy('products.id');

        $companies  = $companies->whereBetween('transactions.created_at',[$request->input('fromDate'), $request->input('toDate')]);
        $companies  = $companies->get();

        $product_name_company = array();
            foreach($companies as $company){
                    if(!isset($companyData[$company->company_id])){
                        $companyData[$company->company_id] = array();
                        $companyData[$company->company_id]['totalMoney'] = 0;
                    }
					$companyData[$company->company_id]['company_name'] = $company->company_name;
					$companyData[$company->company_id][$company->product] = [$company->total,$company->product_price];
					$companyData[$company->company_id]['totalMoney'] += ($company->total * $company->product_price);
                    $product_name_company[$company->product] = $company->product;
            }

        return array('product_name_company' => $product_name_company,'companyData' => $companyData,'companies'=>$companies);
    }

    public function close_shift(){

        $active_dispansers  = Dispaneser::where('status', 3)->count();
        if($active_dispansers > 0){
            $data['response'] = '-2';

            return json_encode($data);
        }
        $last_id = Shifts::select('id')->where('end_date',NULL)->orderBy('created_at', 'desc')->first();
		$current_time = now()->timestamp;

        if(empty($last_id)){
            Shifts::insert(
                ['start_date' => strtotime(date("Y-m-d H:i:s", strtotime('-8 hours', time()))),'end_date' => $current_time,'created_at' => $current_time, 'updated_at' => $current_time]
            );

            Shifts::insert(
                ['start_date' => now()->addSeconds(1)->timestamp, 'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
            );
        }else{

            Shifts::where('id',$last_id->id)
                ->update(
                    ['end_date' => now()->timestamp, 'updated_at' => now()->timestamp]
                );

            Shifts::insert(
                ['start_date' => now()->addSeconds(1)->timestamp, 'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
            );

        }

        $request = Shifts::select(DB::raw('start_date AS fromDate'),DB::raw('end_date AS toDate'),DB::raw("'staff' as url"),DB::raw("'email_sent' as email_sent"),'id')->orderBy('created_at', 'desc')
            ->skip(1)
            ->take(1)
            ->first()
            ->toArray();
        $request = new Request($request);
	
        // Send closed shift in email
        if(!empty($request)){
            $email = new SendShiftEmail($request);
            dispatch($email);
        }

        $last_id = Shifts::select('id','start_date')->where('end_date','!=',NULL)->orderBy('created_at', 'desc')->first();
        $tanks_details = Tank::all();

        Artisan::call("running:processes");

        foreach($tanks_details as $tank){
            DB::table('tank_history')->insert(
                array(
                    'shift_id'      => $last_id->id,
                    'name'          => $tank->name,
                    'product_id'    => $tank->product_id,
                    'quantity'      => $tank->quantity,
                    'pfc_tank_id'   => $tank->pfc_tank_id,
                    'capacity'      => $tank->capacity,
                    'fuel_level'    => $tank->fuel_level,
                    'water_level'   => $tank->water_level,
                    'product_id'    => $tank->product_id,
                    'status'        => $tank->status,
                    'date'          => ($last_id->start_date + 1),
                    'created_at'    => ($current_time),
                    'updated_at'    => ($current_time),
                )
            );
        }

        $data['response'] = true;
        $data['shift_id'] = $last_id;

        return json_encode($data);

    }

    public function close_shift_additional_data() {
        $users          = Users::where('status',1)->where('type',1)->orderBy('name','asc')->pluck('name','id')->all();
        $banks          = Banks::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
		$categories		= Categories::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
		
        return view('/admin/staff/shift_additional_data',compact('users','banks','categories'))->render();
    }

    public function save_additional_data(Request $request){
        $users = Users::where('status',1)->where('type',1)->orderBy('name','asc')->pluck('name','id')->all();
        $banks = Banks::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();
        $shift = Shifts::select('id', 'start_date','end_date')->orderBy('start_date', 'DESC')->skip(1)->take(1)->first();

        // Save expenses
        if(array_values($request->input('expense_user_id'))[0] !== NULL && array_values($request->input('expense_amount'))[0] !== NULL){
            for($i = 0; $i < count($request->input('expense_user_id')); $i++) {
                $expenses   = new Expenses();

                $expenses->date         = $shift->end_date - 1;
                $expenses->amount       = $request->input('expense_amount')[$i];
				$expenses->expense_type = $request->input('expense_categories')[$i];
                $expenses->description  = $request->input('expense_description')[$i];
                $expenses->user_id      = $request->input('expense_user_id')[$i];
                $expenses->created_at   = $shift->end_date - 1;
                $expenses->created_by   = Auth::user()->id;
                $expenses->updated_at   = $shift->end_date - 1;
                $expenses->save();
            }
        }

        // Save paymets
        if(array_values($request->input('payment_user_id'))[0] !== NULL && array_values($request->input('payment_amount'))[0] !== NULL){
            for($i = 0; $i < count($request->input('payment_user_id')); $i++) {
                $payments   = new Payments();

                $payments->date         = $shift->end_date - 1;
                $payments->amount       = $request->input('payment_amount')[$i];
				$payments->payment_type = $request->input('payment_categories')[$i];
                $payments->description  = $request->input('description');
                $payments->user_id      = $request->input('payment_user_id')[$i];
                $payments->type         = 1;
                $payments->created_at   = $shift->end_date - 1;
                $payments->created_by   = Auth::user()->id;
                $payments->updated_at   = $shift->end_date - 1;
                $payments->save();
            }
        }


        // Save banks
        if(array_values($request->input('bank_id'))[0] !== NULL && array_values($request->input('bank_amount'))[0] !== NULL){
            for($i = 0; $i < count($request->input('bank_amount')); $i++) {
                $payments   = new POSPayments();

                $payments->date         = $shift->end_date - 1;
                $payments->amount       = $request->input('bank_amount')[$i];
                $payments->bank_id      = $request->input('bank_id')[$i];
                $payments->created_by   = Auth::user()->id;
                $payments->created_at   = $shift->end_date - 1;
                $payments->updated_at   = $shift->end_date - 1;
                $payments->save();
            }
        }

        return redirect('/admin/staff');
    }

    public static function additional_data(Request $request){
        $users          = Users::where('status',1)->where('type',1)->orderBy('name','asc')->pluck('name','id')->all();
        $banks          = Banks::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        return ['users' => $users, 'banks' => $banks];
    }

	public static function get_incoming_stock($request){
		return Stock::select(DB::Raw('amount as liters'), 'reference_number', 'created_at', 'date', 'tank_id')
										->whereBetween('stocks.date', [$request->input('fromDate'), $request->input('toDate')])
										->orderBy('stocks.date', 'ASC')
										->get();
	}

    public function send_shift_email(Request $request){
        // Check if user has select shift or data range
        if(!empty($request->shift)){
            $shift       = Shifts::select('id', 'start_date','end_date')->where('id',$request->input('shift'))->first();

            $data = [
                "fromDate"  => $shift->start_date,
                "toDate"    => $shift->end_date,
                "url"       => "staff",
                "id"        => $shift->id
            ];
        }else {
            $data = [
                "fromDate"  => strtotime($request->fromDate),
                "toDate"    => strtotime($request->toDate),
                "url"       => "staff",
                "id"        => $shift->id
            ];
        }

        $request = new Request($data);

        self::email($request);

        $data['response'] = true;

        return json_encode($data);
    }

    public static function email($request){
        $product_name           = self::show_staff_info($request)['product_name'];
        $staffData              = self::show_staff_info($request)['staffData'];
        $products               = self::show_products_info($request);
        $companies              = self::show_companies_info($request)['companies'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        $companyData            = self::show_companies_info($request)['companyData'];
        $payments               = self::show_payments_info($request, 'payments_data');
        $expenses               = self::show_expenses_info($request, 'expenses_data');
        $pos_sales              = self::show_pos_sales_info($request, 'pos_sales_data');
        $totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
        $company                = Company::where('status',4)->first();
		$tanks 					= array();
		$pos_sales  			= array();

        if(!empty($company->email)){
            $pdf = PDF::loadView('admin.staff.pdf_report',compact('request','totalizer_totals','products','staffData','product_name','companyData','product_name_company','companies','company','payments','expenses','tanks','pos_sales'));


            $file_name  = 'Raport - '.date('Y-m-d', time()).'.pdf';

            Mail::send('emails.report',["data"=> "Raport"],function($m) use($pdf, $company){
                // Send to multiple emails if divided by comma
                $email = array_map('trim', explode(',',$company->email) );

                $m->to($email)->subject('Raport Transaksionesh - '.$company->name);
                $m->attachData($pdf->output(),'Raport - '.$company->name.'.pdf');
            });

            if( count(Mail::failures()) == 0 ) {
                Shifts::where('id',$request->id)
                ->update(
                    ['email_sent' => 1, 'updated_at' => now()->timestamp]
                );
            }
        }
    }

    public static function setDates($request){
        if(!$request->input('search_type') || $request->input('search_type') == 'shifts'){
            if(!$request->input('shift')){
                $shift       = Shifts::select('id', 'start_date','end_date')->where('end_date',NULL)->latest('id')->first();
            }else{
                $shift       = Shifts::select('id', 'start_date','end_date')->where('id',$request->input('shift'))->first();
            }
			//Create new shift is there is none.
			if(!isset($shift->start_date)){
				$transaction  = Transactions::select('created_at')->orderBy('id','asc')->first();
				if(!isset($transaction->created_at)){
					$shift_start = time();
				}else{
					$shift_start = strtotime($transaction->created_at) - 10;
				}
				Shifts::insert(
					['start_date' => $shift_start, 'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
				);
                $shift       = Shifts::select('id', 'start_date','end_date')->where('end_date',NULL)->latest('id')->first();
			}
            $request->merge(['fromDate' => $shift->start_date]);
            if($shift->end_date == NULL){
                $request->merge(['toDate' => time()]);
            }else{
                $request->merge(['toDate' => $shift->end_date]);
            }
        }else{
            $request->merge(['fromDate' => strtotime($request->input('fromDate')) ]);
            $request->merge(['toDate' => strtotime($request->input('toDate')) ]);
        }

        return $request;
    }

    public function create_shift($hours, $end_hour){
        $first_transaction_date = Transactions::select('created_at')->orderBy('created_at','ASC')->first();
        $end_date = strtotime(date('Y-m-d H:i:s',strtotime("-1 days")));
		$shift_array = array();
		echo (strtotime($first_transaction_date->created_at));
		$first_shift	= strtotime(date('Y-m-d '.$end_hour.':00:00', strtotime($first_transaction_date->created_at)));
		echo '<br>';
		echo ($first_shift);
		echo ($first_shift);
		$now 		= time();
		//exit();
		while(true){
			$end_time	= strtotime('+ '.$hours.' Hours', $first_shift);
			if($end_time > $now){
				Shifts::insert(
					['start_date' => $first_shift,'end_date' => null,'created_at' => $end_time, 'updated_at' => $end_time]
				);
				break;
			}
			Shifts::insert(
				['start_date' => $first_shift,'end_date' => $end_time,'created_at' => $end_time, 'updated_at' => $end_time]
			);
			$first_shift = $end_time+1;

		}

    }

    public function export_pdf(Request $request){

        $request                = self::setDates($request);

        $company                = Company::where('status', 4)->first();

        //$shift                  = Shifts::select('id', 'start_date','end_date')->get();
		$shift					= null;
		$stocks					= null;
		$tanks   				= array();
		$p_dialy   				= array();
		
		if($request->input('url') == 'staff'){
			$staffData              = self::show_staff_info($request)['staffData'];
			$product_name           = self::show_staff_info($request)['product_name'];
            $expenses               = self::show_expenses_info($request, 'expenses_data');
            $payments               = self::show_payments_info($request, 'payments_data');
            $pos_sales              = self::show_pos_sales_info($request, 'pos_sales_data');
			$stocks					= self::get_incoming_stock($request);
		}else{
			$staffData              = null;
			$product_name           = null;
            $expenses               = null;
            $payments               = null;
		}

		if($request->input('url') == 'staff' || $request->input('url') == 'companies'){
			$companyData            = self::show_companies_info($request)['companyData'];
			$product_name_company   = self::show_companies_info($request)['product_name_company'];
			$companies              = self::show_companies_info($request)['companies'];
		}else{
			$companyData            = null;
			$product_name_company   = null;
			$companies              = null;
		}

		if($request->input('url') == 'staff' || $request->input('url') == 'dispensers'){
			$products               = self::show_products_info($request);
			$totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
		}else{
			$products            = null;
			$totalizer_totals   = null;

		}

		if($request->input('url') == 'products'){
            $products               = self::show_products_info($request, 'products_view');
            $products_average       = self::show_products_average_info($request);
		}

        if($request->input('url') == 'expenses'){
            $expenses               = self::show_expenses_info($request, 'expenses_data');
		}

        if($request->input('url') == 'pos-sales'){
            $pos_sales              = self::show_pos_sales_info($request, 'pos_sales_data');
		}

        if($request->input('url') == 'payments'){
            $payments               = self::show_payments_info($request, 'payments_data');
		}

		if($request->input('url') == 'stock'){
			$tanks					= Tank::where('status', 1)->get();
			$stocks					= self::get_incoming_stock($request);
			$staffData              = self::show_staff_info($request)['staffData'];
			$product_name           = self::show_staff_info($request)['product_name'];
			$totalizer_totals       = TransactionController::getGeneralDataTotalizers($request);
			$products               = self::show_products_info($request);
		}


		if($request->input('url') == 'products-daily'){
			$stocks					= self::show_products_info_daily($request, 'excel');
		}
		
        $pdf = PDF::loadView('admin.staff.pdf_report',compact('request','totalizer_totals','products','staffData','product_name','companyData','product_name_company','shift','companies','company','products_average','expenses','payments','tanks','stocks','pos_sales', 'p_dialy'));
        $file_name  = 'Staff-PDF - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);


        $myFile = $pdf->download($file_name.'.pdf');
        $response =  array(
           'name' => $file_name,
           'file' => "data:application/pdf;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }
}
