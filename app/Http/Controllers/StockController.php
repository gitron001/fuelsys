<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Tank;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {
        $tanks = Tank::select('name','id','product_id')->where('status', 1)->get();
        return view('/admin/stock/create',compact('tanks'));
    }

    public function store(Request $request) {
        foreach(array_combine($request->input('tank'), $request->input('amount')) as $tank => $amount){
            if(!empty($tank) && !empty($amount) && $amount !== 0){

                $stock = new Stock();

                $stock->tank_id = $tank;
                $stock->amount  = $amount;
                $stock->save();
            }
        }

        session()->flash('info','Success');
        return redirect('/stock');
    }

    public function info(){

        $tanks              = Tank::all();
        $stock_data         = Stock::select([DB::raw("SUM(amount) as amount"),DB::raw("tank_id")])->groupBy('tank_id')->get();
        $first_item         = Stock::select('created_at')->first();
        if(!empty($first_item)) {
            $sales          = Transaction::select([DB::raw("SUM(lit) as total_lit"),DB::raw("product_id")])->where('created_at','>=',strtotime($first_item->created_at))->groupBy('product_id')->get();
        }
        return view('admin.stock.stock-info',compact('tanks','stock_data','first_item','sales'));

    }
}
