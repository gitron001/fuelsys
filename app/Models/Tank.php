<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


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

    public function totalStockSensor(){
		$fuel_level = intval(($this->fuel_level/100));
		$decimal 	= ($this->fuel_level/100) - $fuel_level;
		$upper_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', '>', $fuel_level)->orderBy('cm', 'ASC')->first();
		$lower_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', $fuel_level)->first();
		$difference  = ($upper_value->value - $lower_value->value)* $decimal; 
		$value = $lower_value->value + $difference;
		return $value; 
    }
	
	public function totalWaterSensor(){
		$fuel_level = intval(($this->water_level/100));
		$decimal 	= ($this->water_level/100) - $fuel_level;
		$upper_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', '>', $fuel_level)->orderBy('cm', 'ASC')->first();
		$lower_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', $fuel_level)->first();
		//dd($upper_value->value);
		
		//if(!isset(
		$difference  = ($upper_value->value - $lower_value->value) * $decimal; 
		$value = $lower_value->value + $difference;
		return $value; 
    }
}
