<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\PrintPaymentService;

class PrintPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected   $payment_id;

    public function __construct($payment_id)
    {
        //Payment Id to print
        $this->payment_id  = $payment_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        PrintPaymentService::printFunction($this->payment_id); 
    }
}
