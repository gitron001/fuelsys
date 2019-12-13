<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Transaction as Transactions;
use App\Http\Controllers\TransactionController as TransactionController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use DB;

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

    public function staff_view(Request $request){
		if(!$request->input('fromDate')){
			$from_date = strtotime('- 1 day', strtotime(date('d-m-Y H:i', time())));
			$to_date =  strtotime(date('d-m-Y H:i', time()));
		}else{
			$from_date  = strtotime($request->input('fromDate'));
			$to_date    = strtotime($request->input('toDate'));
		}

        $user       = $request->input('user');

        $companyData = [];
		$companies 	= Transactions::select('companies.name as c_name','companies.id as c_id',DB::raw('SUM(money) as money'),DB::raw('SUM(lit) as totalLit'), DB::RAW('MAX(products.name) as p_name'),DB::raw('products.name as product'),DB::raw('AVG(transactions.price) as product_price'))
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('companies', 'users.company_id', '=', 'companies.id')
            ->join('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('companies.id')
            ->groupBy('products.id');

        $companies = $companies->whereBetween('transactions.created_at',[$from_date, $to_date]);

        $companies 	 = $companies->get();

        $product_name_company = array();
            foreach($companies as $tr){
                    if(!isset($companyData[$tr->c_id])){
                        $companyData[$tr->c_id] = array();
                        $companyData[$tr->c_id]['totalMoney'] = 0;
                    }
					$companyData[$tr->c_id]['c_name'] = $tr->c_name;
					$companyData[$tr->c_id][$tr->product] = [$tr->totalLit,$tr->product_price];
					$companyData[$tr->c_id]['totalMoney'] += $tr->money;
                    $product_name_company[$tr->product] = $tr->product;
            }


        $usersFilter = Users::where('type','1')->pluck('name','id');

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
					$staffData[$tr->user_id]['totalMoney'] += $tr->money;
                    $product_name[$tr->product] = $tr->product;
                    //$product_name[$tr->product.'_'.$tr->product_price] = $tr->product;
            }

        $products 	= Transactions::select(DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'), DB::raw('count(transactions.id) as transNR'), DB::RAW('MAX(products.name) as p_name'), DB::RAW('MAX(products.pfc_pr_id) as product_id'), DB::RAW('max(transactions.price) as product_price'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->groupBy('products.pfc_pr_id');
            //->groupBy('transactions.price');

		$totalizer_totals = TransactionController::getGeneralDataTotalizers($request);

        if ($request->input('user')) {
            $products = $products->whereIn('transactions.id',$user);
        }

        $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);

        $products = $products->get();

        return view('admin.staff.staff_view',compact('usersFilter','staffData','products','product_name','companies', 'totalizer_totals','companyData','product_name_company'));
    }
}
