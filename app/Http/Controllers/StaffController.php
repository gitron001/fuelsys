<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Transaction as Transactions;
use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchWithPagination()
    {
        $users = Users::where('type','1')->pluck('name','id');
/*
        $transactions = Transactions::select(DB::RAW('users.name as user_name'), DB::raw('SUM(money) as money'),DB::RAW('products.name as product'), DB::RAW('products.price as product_price'), DB::raw('SUM(lit) as total'))
            ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where('users.type','1')
            ->groupBy('users.name')
            ->groupBy('transactions.product_id')
            ->paginate(15);*/

        // Transactions without product name and price
        $users = Transactions::select(DB::RAW('users.id as user_id'))
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where('users.type','1')
            ->groupBy('users.id')
            ->get();

        //$Users_array[$users->id] = array('name' => $users->name);
        
        $staffData = [];
        foreach($users as $value) {
            $staffData[$value->user_id] = $value->user_id;
        }

        foreach ($staffData as $key => $value) {
            $transactions = Transactions::select(DB::RAW('users.name as user_name'), DB::raw('SUM(money) as money'), DB::raw('SUM(lit) as total'), DB::RAW('users.name as user_name'),DB::raw('group_concat(DISTINCT products.name SEPARATOR " | ") as product'))
            ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->where('users.type','1')
            ->where('transactions.user_id',$key)
            ->groupBy('users.name')
            ->get();
            foreach($transactions as $value){
                $staffData[$key] = $value;
            }
        }

        return view('admin.staff',compact('users','staffData'));
    }
}
