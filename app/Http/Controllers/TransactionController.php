<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\PFC;
use App\Models\Dispaneser;
use App\Models\Company;
use App\Models\Payments;
use App\Models\Products;
use App\Services\TransactionService;
use Excel;
use DB;
use DateTime;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $transactions   = Transaction::orderBy('created_at', 'desc')->paginate(15);
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        return view('/admin/transactions/home',compact('transactions','users','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users       = Users::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $pfc         = PFC::pluck('name','id')->all();
        
        return view('/admin/transactions/create',compact('users','dispanesers','products','pfc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
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
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $transaction = Transaction::findOrFail($id);
        $dispanesers = Dispaneser::pluck('name','id')->all();
        $users       = Users::pluck('name','id')->all();
        $products    = Products::pluck('name','id')->all();
        $pfc         = PFC::pluck('name','id')->all();

        return view('/admin/transactions/edit',compact('transaction','dispanesers','users','products','pfc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
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
    public function destroy($id) {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }
	
	public function read() {
        TransactionService::read();
    }

    public function excel_export(Request $request) {

        $payments = self::generate_data($request);
        
        $file_name  = 'Transaction - '.date('Y-m-d', time());
           
        $myFile = Excel::create($file_name, function($excel) use( $payments ) 
        {
            $excel->sheet('Transaction', function($sheet) use( $payments ) 
            {
                $sheet->appendRow(array(
                    'DATA',
                    'LLOJI',
                    'PERSONI',
                    'MBUSHJA',
                    'PAGESA',
                    'MBETJA',
                ));

                $total = 0;
                $totalToPay = 0;
                $totalAmount = 0;
                $totalPayed = 0;
                foreach ($payments as $row)
                {
                    if($row->money == 0){
                        $fueling = 0;
                        $payment = $row->amount;
                    }else{
                        $fueling = $row->money;
                        $payment = 0;                  
                    }
                    $total = $total + $fueling - $payment;
                    
                    $sheet->appendRow(array(
                        (!empty($row->date)) ? date('m/d/Y h:i:sa',$row->date) : date('m/d/Y h:i:sa',$row->created_at),
                        $row->type,
                        $row->username,
                        $fueling,
                        $payment,
                        $total,
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

   public static function exportPDF(Request $request){
        $payments = self::generate_data($request);

        $pdf = PDF::loadView('admin.pdfReport',compact('payments'));
        $file_name  = 'Transaction - '.date('Y-m-d', time());
        $myFile = $pdf->download($file_name.'.pdf');

        $response =  array(
           'name' => $file_name, 
           'file' => "data:application/pdf;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }

    public static function generate_data($request){
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');


        $transactions = DB::table("transactions")
            ->select("transactions.product_id",DB::RAW(" 'transaction' as type"),
                DB::RAW(" 0 as amount"),DB::RAW(" 0 as date")
                ,"transactions.money",DB::RAW(" 0 as company")
                ,"users.name as username","transactions.created_at")
            ->join('users', 'transactions.user_id', '=', 'users.id');

        if ($request->input('company')) {
            $transactions->where('company_id','=',$company);
        }

        if ($request->input('user')) {
            $transactions->where('user_id','=',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $transactions->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $payments = DB::table("payments")
            ->select("payments.user_id",DB::RAW(" 'payment' as type")
                ,"payments.amount","payments.date",
                DB::RAW(" 0 as money"),"payments.company_id"
                ,"users.name as username","payments.created_at")
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->union($transactions)
            ->orderBy('created_at');

        if ($request->input('company')) {
            $payments->where('payments.company_id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $payments->whereBetween('payments.date',[$from_date, $to_date]);
        }

        if ($request->input('user')) {
            $payments->where('user_id','=',$user);
        }

        $payments = $payments->get();

        return $payments;
    }
    public function search(Request $request) {
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');

        $query = new Transaction;

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('created_at',[$from_date, $to_date]);
        }

        if ($request->input('user')) {
            $getRfid    = Users::where('id',$user)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('user_id',$getID);
        }

        if ($request->input('company')) {
            $getRfid    = Users::where('company_id',$company)->get();

            foreach ($getRfid as $rfid) {
                $getID[] =  $rfid->id;
            }

            $query = $query->whereIn('user_id',$getID);
        }

        $data = $query->get();

        $output = '';
        $total_row = $data->count();
        if($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.($row->users ? $row->users->name : '').'</td>
                    <td>'.($row->users->company ? $row->users->company->name : '').'</td>
                    <td>'.($row->product ? $row->product->name : '').'</td>
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
