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
use Carbon\Carbon;
use Excel;
use DB;
use DateTime;
use PDF;
use Mail;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions   = Transactions::orderBy('created_at', 'desc')->paginate(15);
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        return view('/admin/reports/home',compact('transactions','users','companies'));
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
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
        $user           = $request->input('user');
        $company        = $request->input('company');
        $sort_by        = "transactions".".".$request->get('sortby');
        $sort_type      = $request->get('sorttype');
        $last_payment   = $request->input('last_payment');

        $query = Transactions::select(DB::RAW('users.name as user_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),'transactions.price', 'transactions.lit','transactions.money','transactions.created_at')
                    ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
                    ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
                    ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $query = $query->whereIn('users.id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $query = $query->where('companies.id',$company);
        }

        if($request->input('user') && $request->input('company')){
            $query = $query->whereIn('users.id',$user)->orWhere('companies.id',$company);
        }

        if($last_payment == 'Yes'){
            
            $payments = Payments::where('user_id',$user )->orWhere('company_id',$company)->orderBy('date', 'desc')->limit('5')->get();

            if(count($payments) != 0){
                $p_date = $payments[0]->date;
                $trans_query = clone $query;
                $check_transactions = $trans_query->where('transactions.created_at','>', $p_date)->count();
                if($check_transactions == 0){
                    if(!isset($payments[1]->date)){ return false; }
                    $p_date = $payments[1]->date;
                    unset($trans_query);
                    $trans_query = clone $query;
                    $check_transactions = $trans_query->where('transactions.created_at','>', $p_date)->count();
                }

                if($check_transactions == 0){
                    if(!isset($payments[2]->date)){ return false; }
                    $p_date = $payments[2]->date;
                    unset($trans_query);
                    $trans_query = clone $query;
                    $check_transactions = $trans_query->where('transactions.created_at','>', $p_date)->count();
                }

                if($check_transactions == 0){
                    if(!isset($payments[3]->date)){ return false; }
                    $p_date = $payments[3]->date;
                    unset($trans_query);
                    $trans_query = clone $query;
                    $check_transactions = $trans_query->where('transactions.created_at','>', $p_date)->count();
                }
                if($check_transactions == 0){
                    if(!isset($payments[4]->date)){ return false; }
                    $p_date = $payments[4]->date;
                    unset($trans_query);
                    $trans_query = clone $query;
                    $check_transactions = $trans_query->where('transactions.created_at','>', $p_date)->count();
                }
            }
        }

        if(isset($p_date)){
            $from_date = $p_date;
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }
        

        if($request->ajax() == false){
            $query->orderBy('transactions.created_at', 'DESC');
            $transactions = $query->paginate(15);
            return view('/admin/reports/home',compact('transactions','users','companies'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $transactions = $query->paginate(15);
            return view('/admin/reports/table_data',compact('transactions','users','companies'))->render();
        }

        
   }

}
