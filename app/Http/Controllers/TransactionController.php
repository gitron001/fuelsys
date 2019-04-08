<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction as Transactions;
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
use Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $transactions   = Transactions::orderBy('created_at', 'desc')->paginate(15);
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
        $transaction = Transactions::findOrFail($id);
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
        $transaction = Transactions::findOrFail($id);
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
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();
        session()->flash('info','Success');

        return redirect('/admin/transactions');
    }
	
	public function read() {
        TransactionService::read();
    }

    public function excel_export(Request $request) {

        $paymentsAll = self::generate_data($request);
        $payments = $paymentsAll[0];
        $oldPayments = $paymentsAll[1];

        $total = 0;
        $totalToPay = 0;
        $totalAmount = 0;
        $totalPayed = 0;

        $totalAmount = $oldPayments;
        $startDate = $request->fromDate;

        
        $file_name  = 'Transaction - '.date('Y-m-d', time());
           
        $myFile = Excel::create($file_name, function($excel) use( $payments,$totalAmount,$startDate ) 
        {
            $excel->sheet('Transaction', function($sheet) use( $payments,$totalAmount,$startDate ) 
            {

                if($totalAmount != 0){ $total = $totalAmount; }else{ $total = 0; };
                $totalToPay = 0;
                $totalPayed = 0;

                $sheet->appendRow(array(
                    'DATA',
                    'LLOJI',
                    'PERSONI',
                    'MBUSHJA',
                    'PAGESA',
                    'GJENDJA',
                ));

                $sheet->cell('A2', function($cell) use( $startDate ){
                        $cell->setValue($startDate);

                });

                $sheet->cell('B2', function($cell) use( $totalAmount ){
                        $cell->setValue('GJENDJA FILLESTARE');

                });

                $sheet->cell('F2', function($cell) use( $totalAmount ){
                        $cell->setValue($totalAmount);

                });
                
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

                $sheet->appendRow(array(
                    '',
                    '',
                    '',
                    '',
                    'Totali €',
                    $total.' €',
                ));

            });

        });

        Mail::send('emails.report',["data"=>"Raporti Mujor - Nesim Bakija"],function($m) use($myFile){
            $m->to('orgesthaqi96@gmail.com')->subject('Raporti Mujor - Nesim Bakija');
            $m->attach($myFile->store("xls",false,true)['full']);
        });

        $myFile = $myFile->string('xlsx'); 
        $response =  array(
           'name' => $file_name, 
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);       
    }

    public static function exportPDF(Request $request){
        $paymentsAll = self::generate_data($request);

        $payments = $paymentsAll[0];
        $oldPayments = $paymentsAll[1];
        $date = $request->fromDate;

        $pdf = PDF::loadView('admin.reports.pdfReport',compact('payments','oldPayments','date'));
        $file_name  = 'Transaction - '.date('Y-m-d', time());
        

        Mail::send('emails.report',["data"=>"Raporti Mujor - Nesim Bakija"],function($m) use($pdf){
            $m->to('orgesthaqi96@gmail.com')->subject('Raporti Mujor - Nesim Bakija');
            $m->attachData($pdf->output(),'Raporti - Nesim Bakija.pdf');
        });

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
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('company')) {
            $transactions->where('companies.id','=',$company);
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
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->union($transactions)
            ->orderBy('created_at','DESC');

        if ($request->input('company')) {
            $payments->where('companies.id','=',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $payments->whereBetween('payments.date',[$from_date, $to_date]);
        }

        if ($request->input('user')) {
            $payments->where('user_id','=',$user);
        }

        $payments = $payments->get();


        // Get the fuel history
        $tr = Transactions::where('transactions.created_at','<',$from_date);

        if ($request->input('company')) {
            $tr->where('company_id','=',$company);
        }

        if ($request->input('user')) {
            $tr->where('user_id','=',$user);
        }

        $transaction_total = $tr->sum('money');

        $paymentsOLD = Payments::where('payments.date','<',$from_date);;

        if ($request->input('company')) {
            $paymentsOLD->where('payments.id','=',$company);
        }

        if ($request->input('user')) {
            $paymentsOLD->where('user_id','=',$user);
        }

        $paymentsOLD = $paymentsOLD->sum('amount');

        $starting_balance = $transaction_total - $paymentsOLD;

        return [$payments,$starting_balance];
    }

    public function search(Request $request) {

        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');

        $query = Transactions::select(DB::RAW('users.name as user_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.created_at')
            ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user')) {
            $query = $query->where('users.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        $data = $query->get();

        $output = '';
        $total_row = $data->count();
        if($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.$row->user_name.'</td>
                    <td>'.$row->comp_name.'</td>
                    <td>'.$row->product.'</td>
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
