<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Transaction;

class SendTransactionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected   $transaction_id;

    public function __construct($transaction_id)
    {
        //Payment Id to print
        $this->transaction_id  = $transaction_id;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Read email and send transaction with ID 
    }
}
