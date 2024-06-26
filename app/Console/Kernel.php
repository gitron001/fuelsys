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

        $schedule->command('export:transactions')->everyFiveMinutes();

        // Send daily email to companies

        $schedule->command('send:daily')->hourlyAt(18);

        //$schedule->command('send:dailyEmail')
          //    ->hourly();

        //Send monthly email to companies
        $schedule->command('send:monthlyEmail')
                 ->monthly();

        // Send transactions to server
        $schedule->command('send:transactions')
                 ->everyFifteenMinutes();


        // Export RFID to server
        $schedule->command('export:rfid')
                 ->everyFifteenMinutes();

        // Import RFID from server
        $schedule->command('import:rfid')
                 ->everyFifteenMinutes();

        // Export RFID without company to server
        $schedule->command('export:rfid')
                 ->everyFifteenMinutes();

        // Export RFID with company to server
        $schedule->command('rfid:withcompany')
                 ->everyFifteenMinutes();

        // Import RFID from server
        $schedule->command('import:rfid')
                 ->everyFifteenMinutes();

        // Export Payments to server
        $schedule->command('export:payments')
                   ->everyFifteenMinutes();

        // Import Company from Server to local DB
        $schedule->command('import:company')
                   ->everyFifteenMinutes();

        // Export Company from local DB to Server
        $schedule->command('export:company')
                   ->everyFifteenMinutes();

        // RUN BACKUP EVERY 15 MINUTES AND DELETE OLD BACKUPS AFTER 3 HOURS
        $schedule->command('backup:run')->everyFifteenMinutes();
        $schedule->command('backup:clean')->cron('0 */3 * * *');

        // BACKUP DAILY
        $schedule->command('app:backup')->daily();
        $schedule->command('app:backup --clean')->weekly();

        // Check tanks state
        //$schedule->command('check:tanks')->hourly();

        // We use this command to send email if tank is in low levelk
        $schedule->command('check:tanksEvery6Hours')->cron('0 */6 * * *');

        // Insert Running Process
        //$schedule->command('running:processes')->everyMinute();

        // Reset daily limit for users
        $schedule->command('reset:daily_limit')->dailyAt('12:00');


        // Delete failed jobs and tracking older than 30 days
        $schedule->command('prune-records failed_jobs --days=30')->weekly();
        $schedule->command('prune-records tracking --days=30')->weekly();


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
