<?php

namespace App\Console\Commands;

use App\Models\Dispaneser;
use App\Models\RFID_Discounts;
use Illuminate\Console\Command;
use App\Services\CardService;
use App\Services\TransactionService;
use App\Services\PFCServices as PFC;
use App\Services\DispanserService as Dispanser;
use App\Models\RunninProcessModel as Process;
use App\Models\Users;
use App\Models\PFC as PfcModel;

class CheckCardReadersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:reader {pfc_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Card Statuses Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

       /*$the_cart = RFID::where('rfid', 291018165)->first();
        dd($the_cart->company->discounts);
        foreach($the_cart->company->discounts as $c_discount){
            echo $c_discount->product_details->price;
        }
        dd();*/
		$pfc_id = (int) $this->argument('pfc_id');
		
        $check_cron = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->latest()->first();
        $now = time();
        if(isset($check_cron->refesh_time) && $check_cron->refesh_time < ($now + 30)){
            dd('running');
        }
        
        $pfc    = PfcModel::find($pfc_id);
	
        try {
            $socket = PFC::create_socket($pfc);
        } catch (Exception $e) {
                dd( "Couldn't connect to socket " . $e -> getMessage() . "\n");
        }

        Process::insert(array('start_time'=> time(),
                                'refresh_time' => time(),
                                'faild_attempt'=> 0,
                                'class_name'=>'card:reader',
                                'pfc_id' =>$pfc_id,
                                'type_id' =>1,
                                'created_at' => time(),
                                'updated_at' => time()
                            ));
        while(true){

            Dispanser::checkForUpdates($socket, $pfc_id);
			
            CardService::check_readers($socket, $pfc_id);
            usleep(150000);
            TransactionService::read($socket, $pfc_id);
            usleep(150000);
            $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
            $proccess->refresh_time = time();
            $proccess->save();
        }

        socket_close($socket);

    }
}
