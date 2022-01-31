<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Http\Controllers\TransactionController;

class SendMonthlyCompanyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:monthlyEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Monthly email to Companies about their Transactions';

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
        $companies  = Company::select('id','email','daily_at')->where('send_email',1)->where('monthly_report',1)->get();
        $first_day  = Carbon::now()->startOfMonth()->subMonth();
        $last_day   = Carbon::now()->subMonth()->endOfMonth();

        foreach($companies as $company){

            $data = [
                'company'  => $company->id,
                'fromDate' => $first_day,
                'toDate'   => $last_day,
                'inc_transactions' => 'Yes',
                'inc_per_user' => 'Yes',
            ];

            $request = new Request($data);
            $controller = new TransactionController();
            $controller->generateDailyReport($request);

        }
    }
}
