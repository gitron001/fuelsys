<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Tank;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\Pump;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request) {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $stock      = new Stock;

        if($request->ajax() == false){
            $stock  = $stock->orderBy('date','DESC')
                        ->paginate(15);
            return view('/admin/stock/home',compact('stock'));
        } else {
            $stock  = $stock->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/stock/table_data',compact('stock'))->render();
        }
    }

    public function create() {
        $tanks = Tank::select('name','id','product_id')->where('status', 1)->get();
        return view('/admin/stock/create',compact('tanks'));
    }

    public function store(Request $request) {
        foreach(array_combine($request->input('tank'), $request->input('amount')) as $tank => $amount){
            if(!empty($tank) && !empty($amount) && $amount !== 0){

                $stock = new Stock();
                $stock->date    = strtotime($request->input('date'));
                $stock->tank_id = $tank;
                $stock->amount  = $amount;
                $stock->save();
            }
        }

        session()->flash('info','Success');
        return redirect('/admin/stock/create');
    }

    public function edit($id) {
        $stock = Stock::findOrFail($id);
        $tanks = Tank::all();

        return view('/admin/stock/edit',compact('tanks','stock'));
    }

    public function update(Request $request, $id) {
        $stock = Stock::findOrFail($id);
        $stock['date'] = strtotime($request->input('date'));

        $stock->update($request->all());

        session()->flash('info','Success');

        return redirect()->back();
    }

    public function destroy($id) {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        session()->flash('info','Success');

        return redirect('/admin/stock');
    }

    public function delete_all(Request $request) {
        $stock_id_array = $request->input('id');
        $stock = Stock::whereIn('id',$stock_id_array);
        if($stock->delete()){
            echo "Data deleted";
        }
    }

    public function info(){
		set_time_limit(500);
        $tanks              = Tank::all();
		$sales 				= Transaction::select(DB::RAW('sum(lit) as total_lit'), DB::RAW('max(tank_id) as tank_id'))
							 ->join('pumps', function ($join) {
									$join->on('transactions.sl_no', '=', 'pumps.nozzle_id')
									->on('transactions.channel_id', '=', 'pumps.channel_id');	 
							   })
							  ->groupBy('pumps.tank_id')
							  ->get();
		
        return view('admin.stock.stock-info',compact('tanks','sales'));

    }
}
