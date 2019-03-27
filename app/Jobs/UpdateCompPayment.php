<?php

namespace App\Jobs;


use App\Models\Payments;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\PrintFuelingService;
use App\Models\Transaction;
use App\Models\Company;

class UpdateCompPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected   $comp_id;

    public function __construct($comp_id)
    {
        //Company Id to print
        $this->comp_id  = $comp_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $company = Company::find('id', $this->comp_id);

        if(!isset($company->id)){ dd('Company does not exits'); }

        $total_transactions = Transaction::select(DB::raw('sum(price * lit) as sum'))
            ->join('users' ,'users.id', '=', 'transactions.user_id')
            ->where('users.company_id',  $this->comp_id)
            ->where('transactions.created_at', '>', $company->last_balance_update)->get();

        $total_payments = Payments::select(DB::raw('sum(price * lit) as sum'))->where('company_id', $this->comp_id)->where('created_at', '>', $company->last_balance_update)->get();

        $balance        = $total_transactions[0]->sum - $total_payments[0]->sum;

        $starting_balance = number_format($balance+ $company->starting_balance, 2);

        $company->starting_balance = $starting_balance;
        $company->last_balance_update = time();
        $company->save();
    }
}
