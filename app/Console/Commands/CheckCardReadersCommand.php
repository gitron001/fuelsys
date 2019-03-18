<?php

namespace App\Console\Commands;

use App\Models\RFID_Discounts;
use Illuminate\Console\Command;
use App\Services\CardService;
use App\Services\TransactionService;
use App\Services\PFCServices as PFC;
use App\Services\DispanserService as Dispanser;
use App\Models\RunninProcessModel as Process;
use App\Models\Rfid;

class CheckCardReadersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:reader';

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

        $cardNumber = 291018165;
        $the_card = Rfid::where("rfid", $cardNumber)->where('status', 1)->first();
        $dicount    = RFID_Discounts::find(1);

        $socket = PFC::create_socket();
        Process::insert(array('start_time'=> time(),
                                'refresh_time' => time(),
                                'faild_attempt'=> 0,
                                'class_name'=>'card:reader',
                                'type_id' =>1,
                                'created_at' => time(),
                                'updated_at' => time()
                            ));
        while(true){
            $loadPrice = Process::where('type_id', 2)->count();
            if($loadPrice != 0){
                Dispanser::fuelPrices($socket);
                Process::where('type_id', 2)->delete();
            }
            $loadChannel = Process::where('type_id', 3)->count();
            if($loadChannel != 0){
                Dispanser::dispanserChannels($socket);
                Process::where('type_id', 3)->delete();
            }

            $stopCommand = Process::where('type_id', 4)->count();
            if($stopCommand != 0){
                Process::where('type_id', 4)->delete();
                break;
            }

            CardService::check_readers($socket);
            usleep(150000);
            TransactionService::read($socket);
            usleep(150000);
            $proccess = Process::where('type_id', 1)->first();
            $proccess->refresh_time = time();
            $proccess->save();
        }
        socket_close($socket);
    }
}
