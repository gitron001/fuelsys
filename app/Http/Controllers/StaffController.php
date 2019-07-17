<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Transaction as Transactions;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function staff_view(Request $request){
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');

        $usersFilter = Users::where('type','1')->pluck('name','id');

        $users = Transactions::select(DB::RAW('users.id as user_id'), 'users.name as user_name',DB::raw('SUM(money) as totalMoney'),DB::raw('SUM(lit) as totalLit'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where('users.type','1')
            ->groupBy('users.id');

        if ($request->input('user')) {
            $users = $users->whereIn('users.id',$user);
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
        
        $transactions = Transactions::select(DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.id as user_id'),DB::raw('transactions.price as product_price'), DB::raw('products.name as product'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->where('users.type','1')
            ->groupBy('users.id')
            ->groupBy('products.id')
            ->groupBy('transactions.price');

        if ($request->input('user')) {
            $transactions = $transactions->whereIn('users.id',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $transactions = $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $transactions = $transactions->get();

        $product_name = array();
        foreach ($staffData as $key => $value) {   
            foreach($transactions as $tr){
                if($key == $tr->user_id){
                    $staffData[$key][$tr->product.'_'.$tr->product_price] = [$tr->total,$tr->product_price];
                    $product_name[$tr->product.'_'.$tr->product_price] = $tr->product; 
                }
            }
        }
        

        $products = Transactions::select(DB::RAW('products.id as product_id'), 'products.name as product_name',
            DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'),'transactions.price as product_price')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->where('users.type','1')
            ->groupBy('products.id')
            ->groupBy('transactions.price');

        if ($request->input('user')) {
            $products = $products->whereIn('users.id',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $products = $products->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $products = $products->get();
    
        return view('admin.staff_view',compact('usersFilter','staffData','products','product_name'));
    }
}
