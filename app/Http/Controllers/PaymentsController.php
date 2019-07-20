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
    public function index(Request $request)
    {
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
        $user           = $request->input('user');
        $company        = $request->input('company');

        $query          = Payments::orderBy('date', 'DESC');

        if ($request->input('user')) {
            $query = $query->whereIn('user_id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('company_id',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('date',[$from_date, $to_date]);
        }

        $payments = $query->paginate(15);

        return view('/admin/payments/home',compact('payments','users','companies'));
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
		
		self::printFunction($id);
		
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

        if($payment->user_id != 0){
            $user = Users::find($payment->user_id);
            $user->limit_left -=  $payment->amount;
            $user->save();
        }elseif($payment->company_id != 0){
            $company = Company::find($payment->company_id);
            $company->limit_left -= $payment->amount;
            $company->save();
        }
        $payment->delete();
        session()->flash('info','Success');

        return redirect('/admin/payments');
    }

    public static function printFunction($id)
    {
		
        try {

            $connector      = new NetworkPrintConnector("192.168.1.100", 9100);
            $payment        = Payments::where('id', $id)->first();
            $image          = public_path().'/images/nesim-bakija.png';
            $logo           = EscposImage::load($image, false);
            $printer        = new Printer($connector);
            $date           = date("F j, Y, H:i", strtotime('+1 hour'));

            /* Print top logo */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> graphics($logo);
            $printer->text("\n");

            /* Name & Info of Company */
            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setEmphasis(true);
            $printer->text("Nesim Bakija SH.P.K.\n");
            $printer->setEmphasis(false);
            $printer->selectPrintMode();
            $printer->text("\n");
            $printer->text("Rruga Skënderbeu, Gjakovë, Kosovë\n"); // blank line
            $printer->text("NRB. 810235722\n");
            /*if($transaction->receipt_no != 0){
                $printer->text("Fat. NR. $transaction->receipt_no\n");
            }*/
            $printer->text("________________________________________________\n");
            $printer -> feed(2);


            $printer->setLineSpacing(32);
            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->text("DATA                PAGESA      TOTALI  \n");
            $printer->setEmphasis(false);
            $printer->text("------------------------------------------------\n");

            $total = $payment['amount'];
            //$totalPrice = round($total,2).' E ';
            $client = ($payment->user->name == 0) ? $payment->company->name : $payment->user->name;
		
			//$transaction->product->name = substr($transaction->product->name, 0, 18);
            $limit_left = ($payment->user->name == 0) ? $payment->company->limit_left : $payment->user->limit_left;
			$item = self::singleItem(date('d M Y', $payment->date), $payment['amount'], $limit_left);

            $printer->textRaw($item);

            $printer->text("------------------------------------------------\n");

            $printer -> feed(2);
            $printer->text('Klienti: '.$client. "\n");
            $printer->text("\n"); // blank line

            /*if($transaction->users->company->name){
                $printer->text('Kompania: '.$transaction->users->company->name. "\n");
                $printer->text("\n");
                $printer->text('Makina: '.$transaction->users->vehicle. "\n");
                $printer->text("\n");
                $printer->text('Tabelat: '.$transaction->users->plates. "\n");
                $printer->text("\n");
            }*/

            /* Footer */
            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> text("Ju faleminderit / Thank You\n");
            $printer -> feed(2);
            $printer -> text($date . "\n");

            $printer -> cut();
            $printer -> close();

        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }
	

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function singleItem($name = '', $lit, $price, $limit_left = '') {
        $rightCols = 10;
        $leftCols = 22;

        $left = str_pad($name, $leftCols) ;

        $lit = $lit;

        $right = str_pad(' '.$lit.'     '.$price.'   ' . $limit_left, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }	
}


