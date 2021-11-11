<?php

namespace App\Console\Commands;

use DB;
use Mail;
use App\Models\Tank;
use App\Models\Company;
use App\Models\Transaction;
use Illuminate\Console\Command;

class CheckTanksStateEvery6Hours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:tanksEvery6Hours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will check tanks state every 6 hours';

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
        $company = Company::where('status', 4)->first();
        $tanks  = Tank::all();
        $sales 	= Transaction::select(DB::RAW('sum(lit) as total_lit'), DB::RAW('max(tank_id) as tank_id'))
                    ->join('pumps', function ($join) {
                        $join->on('transactions.sl_no', '=', 'pumps.nozzle_id')
                        ->on('transactions.channel_id', '=', 'pumps.channel_id');
                    })
                    ->groupBy('pumps.tank_id')
                    ->get();

        foreach($tanks as $tank) {
            if($tank->low_limit == 1) {
                $total_sales = 0;
                foreach($sales as $sale){
                    if($sale->tank_id == $tank->id){
                        $total_sales = $sale->total_lit;
                        break;
                    }
                }
                $data = 0;
                $tankCapacity = $tank->capacity;
                $tankName = $tank->name.' - ('.$tank->product->name.')';
                $tankProductName = $tank->product->name;
                $present = $tank->totalStock()[0]['amount'] - $total_sales;
                $salesPerTank = $total_sales;
                $stockPerTank = $tank->totalStock()[0]['amount'];

                if($present <= 2000){
                    Mail::send('emails.checkTanksState',['tankName' => $tankName, 'present' => $present, 'salesPerTank' => $salesPerTank, 'stockPerTank' => $stockPerTank, 'tankProductName' => $tankProductName, 'tankCapacity' => $tankCapacity],function($m) use($company){
                        $m->to($company->email)->subject('Fuel System - Low Limit ALARM');
                    });
                } else {
                    Tank::where('id', $tank->id)->update(array('low_limit' => 0));
                }
            }
        }
    }
}
