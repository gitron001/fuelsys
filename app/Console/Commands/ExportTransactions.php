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

            $transactions = Transaction::select(DB::RAW('products.name as product'),DB::RAW('products.price as product_price'),DB::RAW('u2.name as bonus_user'),DB::RAW('u1.name as staff_name'),DB::RAW('u2.rfid as bonus_rfid'),DB::RAW('u1.rfid as staff_rfid'),
            'transactions.price', 'transactions.lit','transactions.money','transactions.id','transactions.channel_id','transactions.sl_no','transactions.tr_no','transactions.product_id','transactions.lit','transactions.price','transactions.money','transactions.created_at','transactions.bonus_user_id','transactions.user_id','transactions.channel_id')
                ->leftJoin('products', 'products.id', '=', 'transactions.product_id')
                ->leftJoin('users AS u1', 'u1.id', '=', 'transactions.user_id')
                ->leftJoin('users AS u2', 'u2.id', '=', 'transactions.bonus_user_id')
                ->where('transactions.printed',0)
                ->get();


            if(!file_exists($tr_location."/export.txt")){
                $fp = fopen($tr_location."/export.txt", "a");
                fwrite($fp, 'ID;KOHA;IDDISPENSER;IDARTIKULLI;EMRIARTIKULLI;IDKLIENTI;IDSHITESI;EMRISHITESI;SASIA;CMIMI;CMIMIZBRITJE;TOTALI' .PHP_EOL);

                foreach($transactions as $transaction){

                    fwrite($fp, $transaction['id'].';'.date("d.m.Y H:i:s",strtotime($transaction['created_at'])).';'.$transaction['channel_id'].';'.$transaction['product_id'].';'.$transaction['product'].';'.(!empty($transaction['bonus_rfid']) ? $transaction['bonus_rfid'] : 0).';'.$transaction['staff_rfid'].';'.$transaction['staff_name'].';'.$transaction['lit'].';'.($transaction['product_price'] / 1000).';'.$transaction['price'].';'.$transaction['money'].PHP_EOL);

                    Transaction::where('id',$transaction['id'])->update(['printed' => 1]);
                }

                fclose($fp);
            }else{
                $fp = fopen($tr_location."/export.txt", "a");

                foreach($transactions as $transaction){

                    fwrite($fp, $transaction['id'].';'.date("d.m.Y H:i:s.u",strtotime($transaction['created_at'])).';'.$transaction['channel_id'].';'.$transaction['product_id'].';'.$transaction['product'].';'.(!empty($transaction['bonus_rfid']) ? $transaction['bonus_rfid'] : 0).';'.$transaction['staff_rfid'].';'.$transaction['staff_name'].';'.$transaction['lit'].';'.($transaction['product_price'] / 1000).';'.$transaction['price'].';'.$transaction['money'].PHP_EOL);

                    Transaction::where('id',$transaction['id'])->update(['printed' => 1]);
                }

                fclose($fp);
            }


        }
    }
}
