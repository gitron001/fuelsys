<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetDailyLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:daily_limit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset daily limit for users';

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
        $users = User::where('has_limit',1)->where('daily_limit','>',0)->get();

        foreach($users as $user){
            $user->limits = $user->daily_limit;
            $user->save();
        }

        $this->info('Limit is set successfully');
    }
}
