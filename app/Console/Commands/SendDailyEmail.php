<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Http\Controllers\TransactionController;

class SendDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Daily Email to Companies';

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
		$hour 			= date('H');
        $companies  	= Company::select('id','email','daily_at')->where('send_email',1)->where('daily_at',$hour)->get();
        $current_time   = date('H');
        $from_date      = date('Y-m-d H:00:00', strtotime('- 1 day', strtotime(date("Y-m-d $hour:00:00"))));
        $to_date        = date("Y-m-d $hour:00:00");
        
        foreach($companies as $company){
            $data = [
                'company'  => $company->id,
                'fromDate' => $from_date,
                'toDate'   => $to_date,
                'inc_transactions' => 'Yes',
                'exc_balance' => 'Yes',
                'date' => $from_date,
                'date_to' => $to_date,
            ];

            $request = new Request($data);
            $controller = new TransactionController();
            $controller->generateDailyReport($request);
        }
		echo 'RUN AT'.$from_date;
    }
}
