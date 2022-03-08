<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Excel;
use App\Models\Users;
use App\Models\Banks;
use App\Models\Company;
use App\Models\POSPayments;
use Illuminate\Http\Request;


class POSPaymentsController extends Controller
{
    public function index(Request $request) {
        $banks = Banks::where('status', 1)->get();

        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $sort_by_date = $request->get('sortby');


        $pos_payments = new POSPayments;

        if($request->get('bank')){
            $pos_payments  = $pos_payments->where('bank_id',$request->get('bank'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $pos_payments = $pos_payments->whereBetween('date',[$from_date, $to_date]);
        }

        if($request->ajax() == false){
            $pos_payments = $pos_payments->orderBy('date','ASC')
                        ->paginate(15);
            return view('/admin/pos_payments/home',compact('pos_payments','banks'));
        } else {
            $pos_payments = $pos_payments->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/pos_payments/table_data',compact('pos_payments','banks'))->render();
        }
    }

    public function create() {

        $banks = Banks::pluck('name','id')->all();
        return view('/admin/pos_payments/create',compact('banks'));
    }

    public function store(Request $request) {
        $payments   = new POSPayments();

        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $request->input('amount');
        $payments->bank_id      = $request->input('banks');
        $payments->created_by   = Auth::user()->id;
        $payments->created_at   = now()->timestamp;
        $payments->updated_at   = now()->timestamp;
        $payments->save();

        session()->flash('info','Success');

        return redirect('/admin/pos-payments');
    }

    public function edit($id) {
        $pos_payment = POSPayments::find($id);
        $banks = Banks::pluck('name','id')->all();
        return view('/admin/pos_payments/edit',compact('pos_payment','banks'));
    }

    public function update(Request $request, $id) {

        $payments = POSPayments::findOrFail($id);

        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $request->input('amount');
        $payments->bank_id      = $request->input('banks');
        $payments->created_by   = Auth::user()->id;
        $payments->edited_by    = Auth::user()->id;
        $payments->updated_at   = now()->timestamp;
        $payments->save();

        session()->flash('info','Success');

        return redirect('/admin/pos-payments');
    }

    public function destroy($id) {
        $payment = POSPayments::findOrFail($id);
        $payment->delete();
        session()->flash('info','Success');

        return redirect('/admin/pos-payments');
    }

    public function exportPDF(Request $request) {
        $company    = Company::where('status', 4)->first();
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $pos_payments = self::generate_data($request);

        $pdf = PDF::loadView('admin.pos_payments.pdf_export',compact('pos_payments','company','from_date','to_date'));
        $file_name  = 'POS Payment - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }

    public function exportExcel(Request $request) {
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $pos_payments = self::generate_data($request);

        $file_name  = 'POS Payments - '.date('Y-m-d h-i', strtotime("now"));
        $myFile = Excel::create($file_name, function($excel) use( $pos_payments ) {

            $excel->sheet('POS Payments', function($sheet) use( $pos_payments ) {

                $sheet->cell('A1:C1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->appendRow(array(
                    trans('adminlte::adminlte.date'),
                    trans('adminlte::adminlte.banks'),
                    trans('adminlte::adminlte.amount')
                ));

                foreach ($pos_payments as $data) {
                    $sheet->appendRow(array(
                        date('m/d/Y H:i', $data->date),
                        $data->bank->name,
                        $data->amount,
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

        $pos_payments = new POSPayments;

        if($request->get('bank')){
            $pos_payments  = $pos_payments->where('bank_id',$request->get('bank'));
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $pos_payments = $pos_payments->whereBetween('date',[$from_date, $to_date]);
        }

        $pos_payments  = $pos_payments->orderBy('date','DESC')->get();

        return $pos_payments;
    }
}
