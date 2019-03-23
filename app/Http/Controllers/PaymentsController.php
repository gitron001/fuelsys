<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Company;
use App\Models\Users;
use App\Models\PFC;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments   = Payments::orderBy('created_at', 'desc')->paginate(15);
        $users      = Users::pluck('name','id')->all();
        $pfcs       = PFC::where('status', 1)->get();
        return view('/admin/payments/home',compact('payments','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = Company::pluck('name','id')->all();
        $users      = Users::pluck('name','id')->all();

        return view('/admin/payments/create',compact('companies','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = new Payments();

        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $request->input('amount');
        $payments->user_id      = $request->input('user_id');
        $payments->company_id   = $request->input('company_id');
        $payments->created_at   = now()->timestamp;
        $payments->updated_at   = now()->timestamp;
        $payments->save();

        session()->flash('info','Success');

        return redirect('/admin/payments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment    = Payments::findOrFail($id);
        $companies  = Company::pluck('name','id')->all();
        $users      = Users::pluck('name','id')->all();
        return view('/admin/payments/edit',compact('payment','companies','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payments = Payments::findOrFail($id);

        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $request->input('amount');
        $payments->user_id      = $request->input('user_id');
        $payments->company_id   = $request->input('company_id');
        $payments->updated_at   = now()->timestamp;
        $payments->update();

        session()->flash('info','Success');

        return redirect('/admin/payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->delete();
        session()->flash('info','Success');

        return redirect('/admin/payments');
    }

    /*
    public function test()
    {
        try {
            // Enter the share name for your USB printer here
            //$connector = null;
            //$connector = new WindowsPrintConnector("T1");
            $connector = new NetworkPrintConnector("192.168.1.100", 9100);


            $printer = new Printer($connector);
            $printer -> text("Hello World!\n");
            $printer -> cut();
            

            $printer -> close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }*/
}
