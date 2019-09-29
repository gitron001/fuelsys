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
		$hour 		= date('H');
        $companies  = Company::select('id','email','daily_at')->where('send_email',1)->where('daily_at',$hour)->get();
        $dateBegin  = strtotime("first day of last month");  
        $dateEnd    = strtotime("last day of last month");
        $first_day  = date('Y-m-01', $dateBegin);
        $last_day   = date('Y-m-t', $dateEnd);
	
        foreach($companies as $company){
        
            $data = [
                'company'  => $company->id,
                'fromDate' => $first_day,
                'toDate'   => $last_day,
                'inc_transactions' => 'Yes',
            ];

            $request = new Request($data);
            $controller = new TransactionController();
            $controller->generateDailyReport($request);

        }
    }
}
