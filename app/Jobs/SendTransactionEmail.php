<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Transaction;
use App\Models\Company;
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

    protected $trans_id;
    protected $email;
	
    public function __construct($trans_id, $email)
    {
        $this->trans_id = $trans_id;
        $this->email = $email;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		
        //Read email and send transaction with ID
	
        //$transactions  = Transaction::where('id', $this->trans_id)->first();
		
        //$company       = Company::where('status',4)->first();
		
        $mailable = new TransactionMail($this->trans_id);
		
        // Send email to user
        //if(isset($transactions->users->company->email)){
            Mail::to($this->email)->send($mailable);
			
			if( count(Mail::failures()) > 0 ) {

			   echo "There was one or more failures. They were: <br />";

			   foreach(Mail::failures() as $email_address) {
				   echo " - $email_address <br />";
				}

			} else {
				echo "No errors, all sent successfully!";
			}
        //}
    }
}
