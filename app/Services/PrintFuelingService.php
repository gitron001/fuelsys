<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
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

class PrintFuelingService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public static function printFunction($id)
    {
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
            if($transaction->receipt_no != 0){
                $printer->text("Fat. NR. $transaction->receipt_no\n");
            }
            $printer->text("________________________________________________\n");
            $printer -> feed(2);


            $printer->setLineSpacing(32);
            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->text("PRODUKTI                LIT      ÇMIMI  TOTALI  \n");
            $printer->setEmphasis(false);
            $printer->text("------------------------------------------------\n");

            $total = ($transaction['lit']*($transaction['price']));
            $totalPrice = round($total,2).' E ';
            $transaction->product->name = substr($transaction->product->name, 0, 18);
            $item = self::singleItem($transaction->product->name, $transaction['lit'] ,$transaction['price'] , $totalPrice);

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
			
			return true; 
			
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function singleItem($name = '', $lit, $price, $total = '') {
        $rightCols = 10;
        $leftCols = 22;

        $left = str_pad($name, $leftCols) ;

        $right = str_pad(' '.$lit.'     '.$price.'   ' . $total, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }

}
