<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
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

    protected $trans_id;
	
    public function __construct($trans_id)
    {
        $this->trans_id = $trans_id;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {	
		$transactions  = Transaction::where('id', $this->trans_id)->first();
		if(!is_null($transactions->users->company->id) && $transactions->users->company->send_email == 1 && $transactions->users->company->on_transaction == 1){
			$mailable = new TransactionMail($transactions);
			$the_email = $transactions->users->company->email;
	
			if(trim($the_email) == ""){				
				return true;
			}
			Mail::to($the_email)->send($mailable);
			
			if( count(Mail::failures()) > 0 ) {

			   echo "There was one or more failures. They were: <br />";

			   foreach(Mail::failures() as $email_address) {
				   echo " - $email_address <br />";
				}

			} else {
				echo "No errors, all sent successfully!";
			}
		}else{
			return true;
		}
		
    }
}
