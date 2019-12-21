<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Models\Payments;
use App\Models\Company;
use App\Models\Users;
use App\Models\PFC;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use DateTime;

class PrintPaymentService extends ServiceProvider
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
			} else {
				$connector      = new Printer($company->printer_id);
			}
			
            $payment        = Payments::where('id', $id)->first();

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

            $date           = date("F j, Y, H:i", time());

            /* Print top logo */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> graphics($logo);
            $printer->text("\n");

            /* Name & Info of Company */
            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setEmphasis(true);
            $printer->text($company->name.".\n");
            $printer->setEmphasis(false);
            $printer->selectPrintMode();
            $printer->text("\n");
            $printer->text("$company->address $company->city, $company->country\n"); // blank line
            $printer->text("NRB. $company->bis_number\n");
            /*if($transaction->receipt_no != 0){
                $printer->text("Fat. NR. $transaction->receipt_no\n");
            }*/
            $printer->text("________________________________________________\n");
            $printer -> feed(2);


            $printer->setLineSpacing(32);
            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->text("DATA                            PAGESA  \n");
            $printer->setEmphasis(false);
            $printer->text("------------------------------------------------\n");

            $total = $payment['amount'];
            //$totalPrice = round($total,2).' E ';
            $client = $payment->user->name;
		
			//$transaction->product->name = substr($transaction->product->name, 0, 18);
            $limit_left = ($payment->user->name == 0) ? $payment->company->limit_left : $payment->user->limit_left;
			$item = self::singleItem(date('d M Y', $payment->date), number_format($payment['amount'], 2), $limit_left);

            $printer->textRaw($item);
            $printer->text("------------------------------------------------\n");

            $printer -> feed(2);

			if($payment->company->name == ""){
				$printer->text('Pagoj: '.$payment->user->name. "\n");				
			}else{
				$printer->text('Pagoj: '.$payment->company->name ."\n");				
			}
            $printer->text('Krijuar nga: '.$payment->paymentCreator->name. "\n");
            if(!empty($payment->paymentEditor->name)){
                $printer->text('Edituar nga: '.$payment->paymentEditor->name. "\n");
            };
            $printer->text("\n"); // blank line

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
    public static function singleItem($name = '', $lit, $price, $limit_left = '') {
        $rightCols = 10;
        $leftCols = 22;

        $left = str_pad($name, $leftCols) ;

        $lit = $lit;

        $right = str_pad(' '.$lit.'     '.$price.'   ', $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }	

}
