<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PruneRecords extends Command
{
    protected $signature = 'prune-records {table} {--days=30}';
    protected $description = 'Prune old records to prevent indefinite database growth.';

    public function handle()
    {
        $table = $this->argument('table');
        $days = $this->option('days');

        if ($table === 'failed_jobs') {
            DB::table($table)->where('failed_at', '<', now()->subDays($days))->delete();
        } elseif ($table === 'tracking') {
            DB::table($table)->where('created_at', '<', now()->subDays($days))->delete();
        }

        $this->info("Old records from {$table} table pruned successfully.");
    }
}
