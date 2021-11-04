<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Tank;

class TankHistory extends Model
{
    protected $table = 'tank_history';

    protected $fillable = [
        'name',
        'shift_id',
        'product_id',
        'capacity',
        'status',
        'alarm_email_water_level',
        'high_level_water',
        'date',
    ];
	
    public function tank(){
        return $this->belongsTo('App\Models\Tank', 'pfc_tank_id', 'pfc_tank_id');
    }
	
	public function totalStockSensor(){
		$fuel_level = intval(($this->fuel_level/100));
		
		$decimal 	= ($this->fuel_level/100) - $fuel_level;
		$upper_value = DB::table('tank_details')->select('value')->where('tank_id', $this->pfc_tank_id)->where('cm', '>', $fuel_level)->orderBy('cm', 'ASC')->first();
		$lower_value = DB::table('tank_details')->select('value')->where('tank_id', $this->pfc_tank_id)->where('cm', $fuel_level)->first();
		
		if(!$upper_value || !$lower_value){
			return 0;
		}
		$difference  = ($upper_value->value - $lower_value->value)* $decimal;
		$value = $lower_value->value + $difference;
		return $value;
    }
}
