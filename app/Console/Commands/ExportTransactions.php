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


        if($company->print_transaction == 1 && !empty($tr_location)){

            $transactions = Transaction::select(DB::RAW('products.name as product'),
            'transactions.price', 'transactions.lit','transactions.money','transactions.id','transactions.channel_id','transactions.sl_no','transactions.tr_no','transactions.product_id','transactions.lit','transactions.price','transactions.money','transactions.created_at')
                ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
                ->where('transactions.printed',0)
                ->get();

            foreach($transactions as $transaction){

                $fp = fopen($tr_location."/Trans_".$transaction['id']."_".date("d-m-Y").".txt", "a");

                fwrite($fp, 'Kanali, Doreza, SeqNumber, GradeId, Malli, Sasia, Cmimi, Shuma, ZbritjaVlere, Zbritja%,  ShumaMeZbritje, Data, Totali, StartTime, FinishTime;' .PHP_EOL);

                fwrite($fp, $transaction['channel_id'].','.$transaction['sl_no'].','.$transaction['tr_no'].','.$transaction['product_id'].','.$transaction['product'].','.$transaction['lit'].','.$transaction['price'].','.$transaction['money'].',0,0,'.$transaction['money'].','.date("d/m/Y h:i:s").',0,'.date("d/m/Y h:i:s",strtotime($transaction['created_at'])).','.date("d/m/Y h:i:s",strtotime($transaction['created_at'])).';');

                Transaction::where('id',$transaction['id'])->update(['printed' => 1]);

                fclose($fp);
            }
        }
    }
}
