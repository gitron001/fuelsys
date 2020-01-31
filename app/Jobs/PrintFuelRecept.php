<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\PrintFuelingService;
use App\Models\Transaction;

class PrintFuelRecept implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;   
	/**
     * Create a new job instance.
     *
     * @return void
     */

    protected   $trans_id;

    public function __construct($trans_id)
    {
        //Transaction Id to print
        $this->trans_id  = $trans_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transaction = Transaction::where('id', $this->trans_id)->first();
	
        if($transaction->users->company->name != "" && $transaction->users->company->has_receipt_nr == 1)
            Transaction::generateInvoiceNr($this->trans_id);

        if($transaction->users->company->name != "" && $transaction->users->company->has_receipt == 1)
            PrintFuelingService::printFunction($this->trans_id);

    }
}
