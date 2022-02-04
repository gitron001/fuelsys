<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Excel;
use App\Models\Pump;
use App\Models\Tank;
use App\Models\Stock;
use App\Models\Company;
use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request) {
        $products = Products::where('status', 1)->get();

        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $stock      = Stock::select('stocks.id','stocks.date','stocks.tank_id','stocks.amount','stocks.reference_number','stocks.created_at','stocks.updated_at','tanks.id','tanks.product_id')
                            ->leftJoin('tanks', 'tanks.id', '=', 'stocks.tank_id');

        if($request->get('product')){
            $stock  = $stock->where('tanks.product_id',$request->get('product'));
        }

        if($request->get('reference_number')){
            $stock  = $stock->where('stocks.reference_number',$request->get('reference_number'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $stock = $stock->whereBetween('stocks.date',[$from_date, $to_date]);
        }

        if($request->ajax() == false){
            $stock  = $stock->orderBy('stocks.date','DESC')
                        ->paginate(15);
            return view('/admin/stock/home',compact('stock','products'));
        } else {
            $stock  = $stock->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/stock/table_data',compact('stock','products'))->render();
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
                $stock->date             = strtotime($request->input('date'));
                $stock->tank_id          = $tank;
                $stock->amount           = $amount;
                $stock->reference_number = $request->input('reference_number');
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

        $stock->date             = strtotime($request->input('date'));
        $stock->tank_id          = $request->input('tank');
        $stock->amount           = $request->input('amount');
        $stock->updated_at       = now()->timestamp;
        $stock->reference_number = $request->input('reference_number');
        $stock->save();

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

    public function exportPDF(Request $request) {
        $company    = Company::where('status', 4)->first();
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $stock = self::generate_data($request);

        $pdf = PDF::loadView('admin.stock.pdf_export',compact('stock','company','from_date','to_date'));
        $file_name  = 'Stock - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }

    public function exportExcel(Request $request) {
        $company    = Company::where('status', 4)->first();
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $stock = self::generate_data($request);

        $file_name  = 'Stock - '.date('Y-m-d h-i', strtotime("now"));
        $myFile = Excel::create($file_name, function($excel) use( $stock ) {

            $excel->sheet('Stock', function($sheet) use( $stock ) {

                $sheet->cell('A1:D1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->appendRow(array(
                    trans('adminlte::adminlte.date'),
                    trans('adminlte::adminlte.stock_details.tank_product'),
                    trans('adminlte::adminlte.amount'),
                    trans('adminlte::adminlte.reference_number')
                ));

                foreach ($stock as $data) {
                    $sheet->appendRow(array(
                        date('m/d/Y H:i', $data->date),
                        $data->tank->name .' | '. $data->tank->product->name,
                        $data->amount,
                        $data->reference_number ? $data->reference_number : '-',
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

    public static function generate_data($request){
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $stock      = Stock::select('stocks.id','stocks.date','stocks.tank_id','stocks.amount','stocks.reference_number','stocks.created_at','stocks.updated_at','tanks.id','tanks.product_id')
                            ->leftJoin('tanks', 'tanks.id', '=', 'stocks.tank_id');

        if($request->get('product')){
            $stock  = $stock->where('tanks.product_id',$request->get('product'));
        }

        if($request->get('reference_number')){
            $stock  = $stock->where('stocks.reference_number',$request->get('reference_number'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $stock = $stock->whereBetween('stocks.date',[$from_date, $to_date]);
        }

        $stock  = $stock->orderBy('stocks.date','DESC')->get();

        return $stock;
    }
}
