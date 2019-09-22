<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Transaction;
use App\Mail\TransactionMail;
use Mail;

class SendTransactionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Read email and send transaction with ID
        $mailable = new TransactionMail($this->request['id']);
        
        // Send email to user
        if(isset($this->request['user_email'])){
            Mail::to($this->request['user_email'])->send($mailable);
        }

        // Send email to company
        if(isset($this->request['company_email'])){
            Mail::to($this->request['company_email'])->send($mailable);
        }
    }
}
