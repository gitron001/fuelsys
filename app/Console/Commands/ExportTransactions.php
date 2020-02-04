<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\Company;
use DB;

class ExportTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Transactions Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $company        = Company::where('status',4)->first();
        $tr_location    = $company->transaction_location;


        if($company->print_transaction == 1){

            $transactions = Transaction::select(DB::RAW('products.name as product'),
            'transactions.price', 'transactions.lit','transactions.money','transactions.id','transactions.channel_id','transactions.sl_no','transactions.tr_no','transactions.product_id','transactions.lit','transactions.price','transactions.money','transactions.created_at')
                ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
                ->orderBy('transactions.id','DESC')
                ->first();

            if(empty($tr_location) || $tr_location == NULL){
                $tr_location = storage_path()."/logs/Trans_".$transactions['id']."_".date("d-m-Y").".txt";
            }else{
                $tr_location = $tr_location."/Trans_".$transactions['id']."_".date("d-m-Y").".txt";
            }

            $fp = fopen($tr_location, "a");

            fwrite($fp, 'Kanali, Doreza, SeqNumber, GradeId, Malli, Sasia, Cmimi, Shuma, ZbritjaVlere, Zbritja%,  ShumaMeZbritje, Data, Totali, StartTime, FinishTime;' .PHP_EOL);

            fwrite($fp, $transactions['channel_id'].','.$transactions['sl_no'].','.$transactions['tr_no'].','.$transactions['product_id'].','.$transactions['product'].','.$transactions['lit'].','.$transactions['price'].','.$transactions['money'].',0,0,'.$transactions['money'].','.date("d/m/Y h:i:s").',0,'.date("d/m/Y h:i:s",strtotime($transactions['created_at'])).','.date("d/m/Y h:i:s",strtotime($transactions['created_at'])).';');

            fclose($fp);
        }
    }
}
