<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\API\PaymentsController;

class ExportPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if(config()->has('token.access_token')) {
            // Import payments from Server
            $import = new PaymentsController();
            $import->getServerPayments();

            // Export payments to Server
            $export = new PaymentsController();
            $export->getAllPayments();
        }else {
            return false;
        }
    }
}
