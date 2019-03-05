<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Rfid;
use App\Models\Dispaneser;
use App\Models\products;
use App\Services\TransactionService;
use Excel;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions   = Transaction::all();
        $users          = User::pluck('name','id')->all();

        return view('/admin/transactions/home',compact('transactions','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users       = User::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','id')->all();
        
        return view('/admin/transactions/create',compact('users','dispanesers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaction::create($request->all());

        session()->flash('info','Success');

        return redirect('/admin/transactions');
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
        $transaction = Transaction::findOrFail($id);
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $users       = User::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();

        return view('/admin/transactions/edit',compact('transaction','dispanesers','users','products'));
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
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }
	
	public function read()
    {
        TransactionService::read();
    }

    public function excel_export(Request $request){

        $from_date  = strtotime($request->input('from_date'));
        $to_date    = strtotime($request->input('to_date'));
        $user       = $request->input('user');

        $getRfid    = Rfid::where('user_id',$user)->get();

        foreach ($getRfid as $rfid) {
            $getID[] =  $rfid->id;
        }

        if(!empty($getID)) {
            $getData    = Transaction::whereBetween('created_at',[$from_date, $to_date])->whereIn('rfid_id',$getID)->get();
  
            // Convert object to an array 
            foreach($getData as $object){
                $exportData[] = $object->toArray();
            }

            $filename = "Transaction - ".date('d-m-Y') . ".xls";

            $show_coloumn = false;

            $title = "PETROTEK Export File\nTable: Transactions \nGenerated: ".date('Y-m-d');
            
            if(!empty($exportData)) {
                foreach($exportData as $record) {
                    if(!$show_coloumn) {
                        // display field/column names in first row
                        echo implode("\t", array_keys($record)) . "\n";
                        $show_coloumn = true;
                    }
                        echo implode("\t", array_values($record)) . "\n";
                    }   
            }

            print "\n$title\n";
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=".$filename.".xls");
            
        } else{
            $message = "Nothing to show!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        };

        
        
    }
}
