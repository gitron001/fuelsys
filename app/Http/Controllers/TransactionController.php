<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Rfid;
use App\Models\PFC;
use App\Models\Dispaneser;
use App\Models\Company;
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
        $transactions   = Transaction::orderBy('created_at', 'desc')->paginate(15);
        $users          = User::pluck('name','id')->all();
        $rfids          = RFID::pluck('rfid_name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        return view('/admin/transactions/home',compact('transactions','users','rfids','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users       = User::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $pfc  = PFC::pluck('name','id')->all();
        
        return view('/admin/transactions/create',compact('users','dispanesers','products','pfc'));
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
        $pfc  = PFC::pluck('name','id')->all();

        return view('/admin/transactions/edit',compact('transaction','dispanesers','users','products','pfc'));
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
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $rfidID     = $request->input('rfid');
        $company    = $request->input('company');

        $query = new Transaction();

        if ($request->input('rfid')) {
            $query = $query->where('rfid_id',$rfidID);
        }

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('created_at',[$from_date, $to_date]);
        }

        if ($request->input('user')) {
            $getRfid    = Rfid::where('user_id',$user)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('rfid_id',$getID);
        }

        if ($request->input('company')) {
            $getRfid    = Rfid::where('company_id',$company)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('rfid_id',$getID);
        }

        $transaction = $query->get();
        
        $file_name  = 'Transaction - '.date('Y-m-d', time());
           
        $myFile = Excel::create($file_name, function($excel) use( $transaction ) 
        {
            $excel->sheet('Transaction', function($sheet) use( $transaction ) 
            {
                $sheet->fromArray(  $transaction  );
            });

        });

        $myFile = $myFile->string('xlsx'); 
        $response =  array(
           'name' => $file_name, 
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);        
    }

    public function search(Request $request) {
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $rfidID     = $request->input('rfid');
        $company    = $request->input('company');

        $query = new Transaction;

        if ($request->input('rfid')) {
            $query = $query->where('rfid_id',$rfidID);
        }

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('created_at',[$from_date, $to_date]);
        }

        if ($request->input('user')) {
            $getRfid    = Rfid::where('user_id',$user)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('rfid_id',$getID);
        }

        if ($request->input('company')) {
            $getRfid    = Rfid::where('company_id',$company)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('rfid_id',$getID);
        }

        $data = $query->get();

        $output = '';
        $total_row = $data->count();
        if($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.$row->rfid->user->name.'</td>
                    <td>'.$row->rfid->rfid_name.'</td>
                    <td>'.$row->product->name.'</td>
                    <td>'.$row->price.'</td>
                    <td>'.$row->lit.'</td>
                    <td>'.$row->money.'</td>
                    <td>'.$row->created_at.'</td>
                </tr>
                ';
            }
        }else {
            $output .= '
            <tr>
                <td align="center" colspan="7">No Data Found</td>
            </tr>
            ';
        }
        $data['table_data'] = $output;

        echo json_encode($data);
    }
}
