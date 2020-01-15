<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Models\Users;
use App\Models\Shifts;
use Illuminate\Http\Request;
use App\Models\Transaction as Transactions;
use App\Http\Controllers\TransactionController as TransactionController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;



class StaffController extends Controller
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
    public function export_excel(Request $request){
        $totalizer_totals   = TransactionController::getGeneralDataTotalizers($request);
        $products           = self::show_products_info($request);

        $staffData          = self::show_staff_info($request)['staffData'];
        $product_name       = self::show_staff_info($request)['product_name'];
        array_unshift($product_name , 'Perdoruesi'); // Append "Perdoruesi" in the beginning of the array
        array_push($product_name,'Euro'); // Append "Euro" in the end of the array

        $companyData            = self::show_companies_info($request)['companyData'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        array_unshift($product_name_company , 'Kompania'); // Append "Kompania" in the beginning of the array
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
                    'Produkti',
                    'Cmimi',
                    'Sasia',
                    'Sasia Me Numra',
                    'Ndryshimi',
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
                        $totalizer_sales[$product['product_id']],
                        number_format($totalizer_sales[$product['product_id']], 2, '.', '') - number_format($product['totalLit'], 2, '.', '') . " litra",
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
        $usersFilter = Users::where('type','1')->pluck('name','id');
        $shift       = Shifts::select('start_date','end_date')->where('end_date','!=',NULL)->get();

        $staffData      = self::show_staff_info($request)['staffData'];
        $product_name   = self::show_staff_info($request)['product_name'];

        $companyData            = self::show_companies_info($request)['companyData'];
        $product_name_company   = self::show_companies_info($request)['product_name_company'];
        $companies              = self::show_companies_info($request)['companies'];


        $products           = self::show_products_info($request);
        $totalizer_totals   = TransactionController::getGeneralDataTotalizers($request);

        return view('admin.staff.staff_view',compact('usersFilter','shift','staffData','products','product_name','companies', 'totalizer_totals','companyData','product_name_company'));
    }

    public static function show_products_info($request){
        if(!$request->input('fromDate')){
			$from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
		}else{
			$from_date  = strtotime($request->input('fromDate'));
			$to_date    = strtotime($request->input('toDate'));
        }

        if(!$request->input('shift')){
            $from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
        }else{
            $from_date  = str_replace(' ', '', explode("-", $request->input('shift'))[0]);
			$to_date    = str_replace(' ', '', explode("-", $request->input('shift'))[1]);
        }

        $user       = $request->input('user');

        $products 	= Transactions::select(DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'), DB::raw('count(transactions.id) as transNR'), DB::RAW('MAX(products.name) as p_name'), DB::RAW('MAX(products.pfc_pr_id) as product_id'), DB::RAW('max(transactions.price) as product_price'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('products.pfc_pr_id');
            //->groupBy('transactions.price');

        if ($request->input('user')) {
            $products = $products->whereIn('transactions.user_id',$user);
        }

        $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);

        $products = $products->get();

        return $products;
    }

    public static function show_staff_info($request){
        if(!$request->input('fromDate')){
			$from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
		}else{
			$from_date  = strtotime($request->input('fromDate'));
			$to_date    = strtotime($request->input('toDate'));
        }

        if(!$request->input('shift')){
            $from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
        }else{
            $from_date  = str_replace(' ', '', explode("-", $request->input('shift'))[0]);
			$to_date    = str_replace(' ', '', explode("-", $request->input('shift'))[1]);
        }

        $user       = $request->input('user');

		$staffData = [];
        $transactions = Transactions::select(DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.id as user_id'),DB::raw('AVG(transactions.price) as product_price'), DB::raw('products.name as product'), DB::raw('users.name as user_name'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->whereIn('users.type',['1', '3', '4'])
            ->groupBy('users.id')
            ->groupBy('products.id');
            //->groupBy('transactions.price')

        if ($request->input('user')) {
            $transactions = $transactions->whereIn('users.id',$user);
        }

        $transactions = $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);

        $transactions = $transactions->get();

        $product_name = array();
        foreach($transactions as $tr){
                if(!isset($staffData[$tr->user_id])){
                    $staffData[$tr->user_id] = array();
                    $staffData[$tr->user_id]['totalMoney'] = 0;
                }
                $staffData[$tr->user_id]['user_name'] = $tr->user_name;
                //$staffData[$tr->user_id][$tr->product.'_'.$tr->product_price] = [$tr->total,$tr->product_price];
                $staffData[$tr->user_id][$tr->product] = [$tr->total,$tr->product_price];
                $staffData[$tr->user_id]['totalMoney'] += ($tr->total * $tr->product_price);
                $product_name[$tr->product] = $tr->product;
                //$product_name[$tr->product.'_'.$tr->product_price] = $tr->product;
        }

        return array('staffData'=>$staffData,'product_name' => $product_name);
    }

    public static function show_companies_info($request){
        if(!$request->input('fromDate')){
			$from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
		}else{
			$from_date  = strtotime($request->input('fromDate'));
			$to_date    = strtotime($request->input('toDate'));
        }

        if(!$request->input('shift')){
            $from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
        }else{
            $from_date  = str_replace(' ', '', explode("-", $request->input('shift'))[0]);
			$to_date    = str_replace(' ', '', explode("-", $request->input('shift'))[1]);
        }

        $companyData = [];
		$companies 	= Transactions::select(DB::raw('companies.name as company_name'),DB::raw('companies.id as company_id'),DB::raw('SUM(money) as money'),DB::raw('SUM(lit) as total'), DB::RAW('MAX(products.name) as p_name'),DB::raw('products.name as product'),DB::raw('AVG(transactions.price) as product_price'))
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('companies', 'users.company_id', '=', 'companies.id')
            ->join('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('companies.id')
            ->groupBy('products.id');

        $companies  = $companies->whereBetween('transactions.created_at',[$from_date, $to_date]);
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

        $last_id = Shifts::select('id')->where('end_date',NULL)->orderBy('created_at', 'desc')->first();

        if(empty($last_id)){
            Shifts::insert(
                ['start_date' => strtotime(date("Y-m-d H:i:s", strtotime('-8 hours', time()))),'end_date' => now()->timestamp,'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
            );

            Shifts::insert(
                ['start_date' => now()->timestamp, 'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
            );
        }else{

            Shifts::where('id',$last_id->id)
                ->update(
                    ['end_date' => now()->timestamp, 'updated_at' => now()->timestamp]
                );

            Shifts::insert(
                ['start_date' => now()->timestamp, 'created_at' => now()->timestamp, 'updated_at' => now()->timestamp]
            );

        }

    }
}
