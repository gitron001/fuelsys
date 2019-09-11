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
	
    protected $comp_id;

    public function __construct($request, $comp_id)
    {
        $this->request = $request;
        $this->comp_id = $comp_id;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Read email and send transaction with ID
        $transactions  = Transaction::where('id', $this->request['id'])->first();
        $company       = Company::where('status',4)->first();
		
        $mailable = new TransactionMail($transactions, $company);
        
        // Send email to user
        if(isset($this->request['user_email'])){
            Mail::to($company['user_email'])->send($mailable);
        }
    }
}
