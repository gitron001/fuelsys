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
		
		//vallidate Transaction
		$prev_trsansaction = Transaction::where('sl_no', $transactions->sl_no)->where('channel_id', $transactions->channel_id)->latest('created_by')->where('id', '<', $this->trans_id)->first();
		
		$check_liters 	   =  ($transactions->dis_tot - $prev_trsansaction->dis_tot)/100  ;
		
		if($transactions->lit != $check_liters){
			$transactions->error_flag = 3;				
			/*$mailable  = new TransactionMail($transactions);
			$the_email = $transactions->users->company->email;
			$company       = Company::where('status',4)->first();
			if(trim($company->email) == ""){				
				return true;
			}
			Mail::to($company->email)->send($mailable);*/
		}
		$transactions->lit_tot      = $check_liters;
		$transactions->dis_tot_last = $prev_trsansaction->dis_tot;
		$transactions->pfc_tot_last = $prev_trsansaction->pfc_tot;
		$transactions->save();
		echo 'EMAIL';
		
		
		
		
		if(!is_null($transactions->users->company->id) && $transactions->users->company->send_email == 1 && $transactions->users->company->on_transaction == 1){
			$mailable  = new TransactionMail($transactions);
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
