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
use Carbon\Carbon;

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
			
			$company    	= Company::where('status',4)->first();
			
			if(!isset($company->id) || $company->printer_id == "" || $company->printer_id == NULL){
				return true;
			}		
			
			if (filter_var($company->printer_id, FILTER_VALIDATE_IP)) {
				$connector      = new NetworkPrintConnector($company->printer_id, 9100);
			}else{
				$connector 		= $company->printer_id;
			}
            $transaction    = Transaction::where('id', $id)->first();
            $image          = public_path().'/images/company/'.$company->images;            
            $printer        = new Printer($connector);

			if(file_exists($image) && !empty($company->images)){
				if(exif_imagetype($image) == IMAGETYPE_PNG){
					$logo           = EscposImage::load(public_path().'/images/nesim-bakija.png', false);
					  /* Print top logo */
					$printer -> setJustification(Printer::JUSTIFY_CENTER);
					$printer -> graphics($logo);
					$printer->text("\n");
				}
			}
			
			$date           = date("F j, Y, H:i", $transaction['created_at']->timestamp);
          

            /* Name & Info of Company */
            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setEmphasis(true);
            $printer->text($company->name.".\n");
            $printer->setEmphasis(false);
            $printer->selectPrintMode();
            $printer->text("\n");
            $printer->text("$company->address $company->city, $company->country\n"); // blank line
            $printer->text("NRB. $company->bis_number\n");
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
			
			return 'PRINT'; 
			
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
