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

        if(empty($tr_location) || $tr_location == NULL){
            $tr_location = storage_path()."/logs/Transactions.txt";
        }else{
            $tr_location = $tr_location."/Transactions.txt";
        }

        if($company->print_transaction == 1){

            $transactions = Transaction::select(DB::RAW('users.name as username'),DB::RAW('users.rfid as rfid'),
            'transactions.price', 'transactions.lit','transactions.money','transactions.id')
                ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
                ->where('transactions.printed',0)
                ->get();

            $fp = fopen($tr_location, "a");

            foreach($transactions as $transaction){

                // Print data to txt file
                fwrite($fp, $transaction['username'].' '.$transaction['rfid'].' '.$transaction['lit'].' '.$transaction['price'].' '.$transaction['money'].PHP_EOL);

                // Update printed field to exported(1)
                Transaction::where('id',$transaction['id'])->update(['printed' => 1]);
            }

            fclose($fp);
        }
    }
}
