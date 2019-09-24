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
		$pfc_id = (int) $this->argument('pfc_id');

		$now = time() - 40;
        $check_cron = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->where('refresh_time', '>', $now)->first();

        if(isset($check_cron)){
			return false;
        }
        
        $pfc    = PfcModel::find($pfc_id);
	
        try {
            $socket = PFC::create_socket($pfc);
        } catch (Exception $e) {
            dd( "Couldn't connect to socket " . $e -> getMessage() . "\n");
        }
		Process::where('type_id', 1)->where('pfc_id', $pfc_id)->delete();
			
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
            $dispanser_status = Dispanser::checkForUpdates($socket, $pfc_id);
			if(!$dispanser_status){ continue; }
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
