<?php

namespace App\Models;

use Mail;
use App\Models\Company;
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
        'alarm_email_water_level',
        'high_level_water'
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
		if(!$upper_value || !$lower_value){
			return 0;
		}
		$difference  = ($upper_value->value - $lower_value->value)* $decimal;
		$value = $lower_value->value + $difference;
		return $value;
    }

	public function totalWaterSensor(){
        $company = Company::select('email')->where('status',4)->first();
        $tank = Tank::select('tanks.id','tanks.name','tanks.alarm_email_water_level','tanks.high_level_water',DB::raw('products.name as product'))
                    ->join('products', 'products.id', '=', 'tanks.product_id')
                    ->where('tanks.id',$this->id)
                    ->first();

		$fuel_level = intval(($this->water_level/100));
		$decimal 	= ($this->water_level/100) - $fuel_level;
		$upper_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', '>', $fuel_level)->orderBy('cm', 'ASC')->first();
		$lower_value = DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', $fuel_level)->first();
		if(!$upper_value || !$lower_value){
			return 0;
		}
		$difference  = ($upper_value->value - $lower_value->value) * $decimal;

		$value = $lower_value->value + $difference;

        if($tank->alarm_email_water_level == 1 && $value > $tank->high_level_water){
            $data = array('tank' => $tank->name, 'product' => $tank->product ,'high_leve_water' => $tank->high_level_water, 'current_level_water' => $value);

            Mail::send('admin.tanks.tank-water-level',$data,function($m) use($company){
                $email = array_map('trim', explode(',',$company->email) );
                $m->to($email)->subject('Fuel System - '.trans('adminlte::adminlte.tank_details.high_level_water'));
            });
        }
		return $value;
    }
}
