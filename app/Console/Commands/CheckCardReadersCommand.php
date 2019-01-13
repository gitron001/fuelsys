<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CardService;

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
        CardService::check_readers();
    }
}
