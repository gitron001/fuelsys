<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('card:reader 1')->appendOutputTo(storage_path() . "/logs/cron.log")
                 ->everyMinute();
        
        // Send daily email to companies
        //$schedule->command('send:dailyEmail')
        //      ->hourly();

        // Send monthly email to companies
        //$schedule->command('send:monthlyEmail')
        //         ->monthly();
        
        // Send transactions to server
        //$schedule->command('send:transactions')
                 //->everyFifteenMinutes();

        // Export RFID without company to server
        //$schedule->command('export:rfid')
        //         ->everyFifteenMinutes();
    
        // Export RFID with company to server
        //$schedule->command('rfid:withcompany')
        //         ->everyFifteenMinutes();

        // Import RFID from server
        //$schedule->command('import:rfid')
        //         ->everyFifteenMinutes();

        // Export Payments to server
        //$schedule->command('export:payments')
        //           ->everyFifteenMinutes();

        // Import Company from Server to local DB
        //$schedule->command('import:company')
        //           ->everyFifteenMinutes();

        // Export Company from local DB to Server
        //$schedule->command('export:company')
        //           ->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
