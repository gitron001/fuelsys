<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Transaction;
use App\Models\Pump;
use App\Models\Tank;
use App\Models\RunninProcessModel as RunninProcessModel;
use App\Mail\TransactionMail;
use Mail;

class SendTransactionEmail implements ShouldQueue
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
		//Read current transaction
		$transactions  = Transaction::where('id', $this->trans_id)->first();

		//Run previous run transaction on the same nozzle Transaction
		$prev_trsansaction = Transaction::where('sl_no', $transactions->sl_no)->where('channel_id', $transactions->channel_id)->latest('created_at')->where('id', '<', $this->trans_id)->first();

		//Calculate difference on liters based on totalizers from previous and current  transaction 
		$check_liters 	   =  ($transactions->dis_tot - $prev_trsansaction->dis_tot)/100  ;

		//If the litter of transaction are not the same as the difference from totalizers flag the transaction as ERROR
		if($transactions->lit != $check_liters){
			$transactions->error_flag = 3;
		}
		
		//Add Update Tank Command
		$rp                 = new RunninProcessModel;
        $rp->pfc_id         = '1';
        $rp->start_time     = '1';
        $rp->refresh_time   = '1';
        $rp->faild_attempt  = '0';
        $rp->class_name     = '1';
        $rp->type_id        = '7';
        $rp->created_at     = '1';
        $rp->updated_at     = '1';
        $rp->save();
		
		//Check if the update Tank Command is RUN
		while(true){
			$tank_update_query = RunninProcessModel::where('type_id', 7)->count();
			if($tank_update_query < 1){
				break;
			}
		}

		//Get Specific tank volumen for the used dispanser
		$pump = Pump::where('nozzle_id', $transactions->sl_no)->where('channel_id', $transactions->channel_id)->first();
		if(isset($pump->tank_id)){
			$tank 						= Tank::find($pump->tank_id);	
			//Store current tank level
			$transactions->tank_level	= isset($tank->fuel_level) ? $tank->fuel_level : 0; 
		}
		
		//Store the litters difference from totalizers
		$transactions->lit_tot      = $check_liters;
		//Store nozzle totalizers from the previous transaction on the same nozzle
		$transactions->dis_tot_last = $prev_trsansaction->dis_tot;
		$transactions->pfc_tot_last = $prev_trsansaction->pfc_tot;
		$transactions->save();
		echo 'EMAIL';

		//Send email to client if email notification is enabled. 
		if((!is_null($transactions->users->company->id) && $transactions->users->company->send_email == 1 && $transactions->users->company->on_transaction == 1) || (isset($transactions->bonus_user->id) && $transactions->bonus_user->send_email == 1 && $transactions->bonus_user->on_transaction == 1)){
			$mailable  = new TransactionMail($transactions);
            $the_email = $transactions->users->company->email ? $transactions->users->company->email : $transactions->bonus_user->email;
            $path = storage_path('logs');

			if(trim($the_email) == ""){
				return true;
			}
			//Send to multiple email if divided by comman
			$the_email = array_map('trim', explode(',',$the_email) );
			Mail::to($the_email)->send($mailable);

			if( count(Mail::failures()) > 0 ) {

                // Check if email has been sent(Display output)
                $fp = fopen($path."/OnTransactionEmail.txt", "a");
                foreach($the_email as $email){
                    fwrite($fp, 'ID:'.$transactions->id.' '. $email.' FAILED ('.date("M,d,Y h:i:s A").')' .PHP_EOL);
                }
                fclose($fp);
			} else {
                // Check if email has been sent(Display output)
                $fp = fopen($path."/OnTransactionEmail.txt", "a");
                foreach($the_email as $email){
                    fwrite($fp, 'ID:'.$transactions->id.' '. $email.' SUCCESS ('.date("M,d,Y h:i:s A").')' .PHP_EOL);
                }
                fclose($fp);

				//echo "No errors, all sent successfully!";
			}
		} else {
			return true;
		}

    }
}
