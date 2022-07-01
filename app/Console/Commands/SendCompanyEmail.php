<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Http\Controllers\TransactionController;

class SendCompanyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:dailyEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $companies      = Company::select('id','email','daily_at')->where('send_email',1)->get();
        $current_time   = date('H');
        $from_date      = date('Y-m-d 00:00:00');
        $to_date        = date('Y-m-d h:i:s A');

        foreach($companies as $company){
			if($company['daily_at'] == 24){
                $daily_at = 00;
            }else{
                $daily_at = $company['daily_at'];
            }

            if($daily_at == $current_time){

            $data = [
                'company'  => $company->id,
                'fromDate' => $from_date,
                'toDate'   => $to_date,
                'dailyReport' => 1,
                'inc_transactions' => 'Yes',
                'exc_balance' => 'Yes'
            ];

            $request = new Request($data);
            $controller = new TransactionController();
            $controller->generateDailyReport($request);

            }
        }
    }
}
