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
    public function searchWithPagination(Request $request)
    {
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');

        $usersFilter = Users::where('type','1')->pluck('name','id');

        $users = Transactions::select(DB::RAW('users.id as user_id'), 'users.name as user_name',DB::raw('SUM(money) as totalMoney'))
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
        }
        
        $transactions = Transactions::select(DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.id as user_id'), DB::raw('products.name as product'))
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where('users.type','1')
            ->groupBy('users.id')
            ->groupBy('products.pfc_pr_id')
            ->groupBy('products.name');

        if ($request->input('user')) {
            $transactions = $transactions->whereIn('users.id',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $transactions = $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $transactions = $transactions->get();
            
        foreach ($staffData as $key => $value) {            
            foreach($transactions as $tr){
                if($key == $tr->user_id){
                    $staffData[$key][$tr->product] = $tr->total;
                }
            }
        }


        // Pagination 
        $currentPage = Paginator::resolveCurrentPage();
        $col = collect($staffData);
        $perPage = 15;
        $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $staffData = new Paginator($currentPageItems, count($col), $perPage);
        $staffData->setPath($request->url());
        $staffData->appends($request->all());
        // End Pagination 


        return view('admin.staff',compact('usersFilter','staffData'));
    }
}
