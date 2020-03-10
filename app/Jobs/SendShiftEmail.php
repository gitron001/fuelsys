<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\StaffController;

class SendShiftEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected   $request;

    public function __construct($request)
    {
        //
        $this->request  = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        StaffController::email($this->request);
    }
}
