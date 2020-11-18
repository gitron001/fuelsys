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



            if(!file_exists($tr_location."/export.txt")){
                $fp = fopen($tr_location."/export.txt", "a");
                fwrite($fp, 'ID;KOHA;ARTIKULLI;SASIA;CMIMI' .PHP_EOL);

                foreach($transactions as $transaction){

                    fwrite($fp, $transaction['id'].';'.date("d.m.Y h:i:s.u",strtotime($transaction['created_at'])).';'.$transaction['product'].';'.$transaction['lit'].';'.$transaction['price'].PHP_EOL);

                    Transaction::where('id',$transaction['id'])->update(['printed' => 1]);
                }

                fclose($fp);
            }else{
                $fp = fopen($tr_location."/export.txt", "a");

                foreach($transactions as $transaction){

                    fwrite($fp, $transaction['id'].';'.date("d.m.Y h:i:s.u",strtotime($transaction['created_at'])).';'.$transaction['product'].';'.$transaction['lit'].';'.$transaction['price'].PHP_EOL);

                    Transaction::where('id',$transaction['id'])->update(['printed' => 1]);
                }

                fclose($fp);
            }


        }
    }
}
