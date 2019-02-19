<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\TransactionService;

class ReadTransactionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read Transactions from PFC Controller';

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
        TransactionService::read();
    }
}
