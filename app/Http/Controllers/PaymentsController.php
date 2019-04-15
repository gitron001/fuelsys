<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Company;
use App\Models\Users;
use App\Models\PFC;
use App\Models\Transaction;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use DateTime;
use App\Jobs\PrintFuelRecept;
use Config;

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
        $payments   = new Payments();
        $user       = $request->input('user_id');
        $company    = $request->input('company_id');

        if($user){
            $user = Users::find( $user );
            $user->limit_left += $request->input('amount');
            $user->save();
        }elseif($company){
            $company = Company::find( $company );
            $company->limit_left += $request->input('amount');
            $company->save();
        }
        
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
    public function update(Request $request, $id) {

        $payments = Payments::findOrFail($id);

        if($request->input('checkbox') == 'user'){
            $user_id      = $request->input('user_id');
            $company_id   = 0;
        }else{
            $user_id      = 0;
            $company_id   = $request->input('company_id');   
        }
        $amount  = $request->input('amount');
        if($payments->amount != $amount && $payments->user_id == $user_id && $request->input('checkbox')== 'user'){
            $limit_difference = $amount - $payments->amount;
            $user = Users::find($request->input('user_id'));
            $user->limit_left += $limit_difference;
            $user->save();
        }elseif($payments->amount != $amount && $payments->company_id == $company_id && $request->input('checkbox') != 'user'){
            $limit_difference = $amount - $payments->amount;
            $company = Company::find($request->input('company_id'));
            $company->limit_left += $limit_difference;
            $company->save();
        }

        if($payments->user_id != $user_id){
            if($payments->user_id != 0){
                $prev_user = Users::find($payments->user_id);
                $prev_user->limit_left -= $payments->amount;
                $prev_user->update();
            }

            if($user_id != 0){
                $new_user = Users::find($request->input('user_id'));
                $new_user->limit_left += $request->input('amount'); 
                $new_user->save();
            }
        }

        if($payments->company_id != $company_id){
            if($payments->company_id != 0){
                $prev_company = Company::find($payments->company_id);
                $prev_company->limit_left -= $payments->amount;
                $prev_company->update();
            }

            if($company_id != 0){
                $new_company = Company::find($request->input('company_id'));
                $new_company->limit_left += $request->input('amount'); 
                $new_company->save();
            }
        }

        $payments->user_id      = $user_id;
        $payments->company_id   = $company_id;   
        $payments->date         = strtotime($request->input('date'));
        $payments->amount       = $amount;
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

        if($payments->user_id != 0){
            $user = Users::find($payments->user_id);
            $user->limit_left -=  $payments->amount;
            $user->save();
        }elseif($payments->company_id != 0){
            $company = Company::find($payments->company_id);
            $company->limit_left -= $payments->amount;
            $company->save();
        }
        $payment->delete();
        session()->flash('info','Success');

        return redirect('/admin/payments');
    }
}


