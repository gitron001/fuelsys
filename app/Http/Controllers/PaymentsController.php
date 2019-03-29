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

    
    public function printFunction($id)
    {
        $recepit = new PrintFuelRecept($id);
        $this->dispatch($recepit);


        dd('Hell YEAHHH' . $id);
        try {
            
            $connector      = new NetworkPrintConnector("192.168.1.100", 9100);
            $transaction    = Transaction::where('id', $id)->first();
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
            $printer->text("________________________________________________\n");
            $printer -> feed(2);


            $printer->setLineSpacing(32);
            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->text("PRODUKTI                LIT      ÇMIMI  TOTALI  \n");     
            $printer->setEmphasis(false);
            $printer->text("------------------------------------------------\n");

            $total = ($transaction['lit']*($transaction['price'] / 1000));
            $totalPrice = round($total,2).' E ';
            $transaction->product->name = substr($transaction->product->name, 0, 18);
            $item = new item($transaction->product->name, $transaction['lit'] ,$transaction['price'] , $totalPrice);

            $printer->textRaw($item);

            $printer->text("------------------------------------------------\n");

            $printer -> feed(2);
            $printer->text("Kilometrat: ____________________________________\n");
            $printer->text("\n"); // blank line
            $printer->text('Përdoruesi: '.$transaction->users->name. "\n");
            $printer->text("\n"); // blank line

            if($transaction->users->company->name){
                $printer->text('Kompania: '.$transaction->users->company->name. "\n");
                $printer->text("\n");
                $printer->text('Makina: '.$transaction->users->vehicle. "\n");
                $printer->text("\n"); 
                $printer->text('Tabelat: '.$transaction->users->plates. "\n");
                $printer->text("\n"); 
            }

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
}

class item {
    private $name;
    private $price;
    private $dollarSign;

    public function __construct($name = '', $lit, $price, $total = '' )
    {
        $this -> name   = $name;
        $this -> price  = $price;
        $this -> lit    = $lit;
        $this -> total  = $total;
    }

    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 22;
        
        $left = str_pad($this -> name, $leftCols) ;

        $lit = $this -> lit;
        $price = $this -> price/1000;
       
        $right = str_pad(' '.$lit.'     '.$price.'   ' . $this -> total, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}
