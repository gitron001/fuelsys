<?php

namespace App\Models;

use Mail;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\Pump;
use App\Models\TankHistory;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Tank extends Model
{
    protected $table = 'tanks';

    protected $fillable = [
        'name',
        'product_id',
        'capacity',
        'fuel_level',
        'water_level',
		'pfc_tank_id',
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

	public function tankLevel($request, $order){
		if($request->input('toDate') !== Null){
			if($request->input('toDate') == Null){
				$to_date = time();				
			}
			
			if($order == 'ASC'){
				$to_date 	= $request->input('fromDate');
				$tank_history = TankHistory::where('pfc_tank_id', $this->pfc_tank_id)->where('created_at', '<', $to_date)->orderBy('created_at', 'DESC')->first();
				
				if(isset($tank_history->created_at)){
					$from_date 	= $tank_history->created_at;
				}				
			}else{
				$to_date 	= $request->input('toDate');
				$from_date 	= $request->input('fromDate');
			}
					
			$startingLevel = Pump::select('transactions.id', 'transactions.tank_level')->join('transactions', function($join)
							 {
							   $join->on('transactions.channel_id', '=', 'pumps.channel_id');
							   $join->on('transactions.sl_no', '=', 'pumps.nozzle_id');
							 })
							 ->where('pumps.tank_id', $this->pfc_tank_id)
							 ->whereBetween('transactions.created_at',[$from_date, $to_date])
							 ->orderBy('transactions.created_at', 'DESC')
							 ->first();
			/*$startingLevel = Transaction::select('transactions.id', 'transactions.tank_level')->join('pumps', function($join)
							 {
							   $join->on('transactions.channel_id', '=', 'pumps.channel_id');
							   $join->on('transactions.sl_no', '=', 'pumps.nozzle_id');
							 })
							 ->where('pumps.tank_id', $this->pfc_tank_id)
							 ->whereBetween('transactions.created_at',[$from_date, $to_date])
							 ->orderBy('transactions.created_at', 'DESC')
							 ->first();*/
							 
			if(isset($startingLevel->tank_level)){
				$startingLevel->liters = self::calculateLevel($startingLevel->tank_level);				
			}else{
				$startingLevel  = self::calculateEndShiftData($request, $order);				
			}
			return $startingLevel;
		}						 
	}
	
	public function incomingFuel($request){
		if($request->input('fromDate') !== NULL){
			$incomingFuel = Stock::select(DB::Raw('SUM(stocks.amount) as total'),DB::Raw('count(stocks.id) as incoming_stock'), DB::Raw("GROUP_CONCAT(reference_number) as reference_numbers"))
							->where('stocks.tank_id', $this->pfc_tank_id)
							->whereBetween('stocks.date',[$request->input('fromDate'), $request->input('toDate')])
							->first();
		
							
			return $incomingFuel;

		}
	}
	
	public function calculateEndShiftData($request, $order){
		
		if($order == 'ASC'){
			$to_date = $request->input('fromDate');
		}else{
			$to_date = $request->input('toDate');
		}
		
		$tankDetails = TankHistory::select('date', 'created_at', 'fuel_level', 'shift_id', 'pfc_tank_id')
							->where('created_at', '<=', $to_date)
							->where('pfc_tank_id', $this->pfc_tank_id)
							->orderBy('created_at', 'DESC')
							->first();
	
		if(!isset($tankDetails->created_at)){
			return null;
		}else{
			$sales = Transaction::join('pumps', function($join)
						 {
						   $join->on('transactions.channel_id', '=', 'pumps.channel_id');
						   $join->on('transactions.sl_no', '=', 'pumps.nozzle_id');
						 })
						->where('pumps.tank_id', $this->pfc_tank_id)
						->whereBetween('transactions.created_at', [strtotime($tankDetails->created_at), $to_date])
						->sum('lit');
		
			$starting_stock = self::calculateLevel($tankDetails->fuel_level);
			
			$data =  new \stdClass();
			$data->liters = $sales + $starting_stock;
		
			$data->tank_level = '( ~'.number_format(( $tankDetails->fuel_level/100), 2, '.', ','). ' )';
			return $data;
		}

		
	}


    public function totalStockSensor(){
		//Get Fuel Liters from tank level		
		$value = self::calculateLevel($this->fuel_level, $this->id);	
	
		return $value;
    }

	public function totalWaterSensor(){
		//Get Water Liters from tank level
		$value = self::calculateLevel($this->water_level);		
		
        $company = Company::select('email')->where('status',4)->first();

        if($this->alarm_email_water_level == 1 && $value > $this->high_level_water){
            $data = array('tank' => $this->name, 'product' => $this->product ,'high_leve_water' => $this->high_level_water, 'current_level_water' => $value);

            Mail::send('admin.tanks.tank-water-level',$data,function($m) use($company){
                $email = array_map('trim', explode(',',$company->email) );
                $m->to($email)->subject('Fuel System - '.trans('adminlte::adminlte.tank_details.high_level_water'));
            });
        }
		return $value;
    }
	
	private function calculateLevel($tank_level){
		$fuel_level 	= intval(($tank_level/100));
		$decimal 		= ($tank_level/100) - $fuel_level;
		$upper_value 	= DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', '>', $fuel_level)->orderBy('cm', 'ASC')->first();
		$lower_value 	= DB::table('tank_details')->select('value')->where('tank_id', $this->id)->where('cm', $fuel_level)->first();
		if(!$upper_value || !$lower_value){
			return 0;
		}
		$difference  = ($upper_value->value - $lower_value->value) * $decimal;

		$value = $lower_value->value + $difference;
		
		return $value;
	}
}
