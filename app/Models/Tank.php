<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pump;

class Tank extends Model
{
    protected $table = 'tanks';

    protected $fillable = [
        'name',
        'product_id',
        'capacity',
        'status',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'pfc_pr_id');
    }

    public function totalStock(){
        return $this->belongsTo('App\Models\Stock', 'id', 'tank_id')->select(DB::raw("SUM(amount) as amount"),'tank_id')->where('tank_id', $this->id)->get();
    }
	
	public function totalSales(){
		return Pump::select([DB::raw("SUM(transactions.lit) as total_lit")])
                ->join('transactions', 'transactions.sl_no', '=', 'pumps.nozzle_id')
				->where('pumps.tank_id', $this->id)
                ->get();
    }
}
