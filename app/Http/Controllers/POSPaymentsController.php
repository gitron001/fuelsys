<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Users;
use App\Models\Banks;
use App\Models\POSPayments;
use Illuminate\Http\Request;


class POSPaymentsController extends Controller
{
    public function index(Request $request) {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $pos_payments = new POSPayments;

        if($request->ajax() == false){
            $pos_payments = $pos_payments->orderBy('date','ASC')
                        ->paginate(15);
            return view('/admin/pos_payments/home',compact('pos_payments'));
        } else {
            $pos_payments = $pos_payments->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/pos_payments/table_data',compact('pos_payments'))->render();
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
}
