<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RunninProcessModel as RunningProcessesModel;

class RunningProcesses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'running:processes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running Processes';

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
        $rp                 = new RunningProcessesModel;
        $rp->pfc_id         = '1';
        $rp->start_time     = '1';
        $rp->refresh_time   = '1';
        $rp->faild_attempt  = '0';
        $rp->class_name     = '1';
        $rp->type_id        = '7';
        $rp->created_at     = '1';
        $rp->updated_at     = '1';

        $rp->save();
    }
}
