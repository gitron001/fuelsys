<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\Tank;
use App\Models\Stock;
use App\Models\Company;
use App\Mail\ReportMail;
use App\Events\NewMessage;
use App\Models\Dispaneser;
use App\Models\Transaction;
use App\Models\RunninProcessModel as RunninProcessModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $transactions       = Transaction::orderBy('created_at', 'DESC')->limit(15)->get();
        $company_low_limit  = Company::where('limit_left', '<' , 50)
                                        ->where('status',1)
                                        ->where('has_limit', 1)
                                        ->orderBy('limit_left', 'ASC')
                                        ->limit(15)
                                        ->get();
		//self::update_dispanser_status();
        $dispanesers        = Dispaneser::whereIn('status', [1,2,3])->get();
        //$tanks              = Tank::where('status', 1)->get();

		/*$sales 				= Transaction::select(DB::RAW('sum(lit) as total_lit'), DB::RAW('max(tank_id) as tank_id'))
							 ->join('pumps', function ($join) {
									$join->on('transactions.sl_no', '=', 'pumps.nozzle_id')
									->on('transactions.channel_id', '=', 'pumps.channel_id');
							   })
							  ->groupBy('pumps.tank_id')
							  ->get();*/
        return view('welcome',compact('dispanesers','transactions','company_low_limit'));
    }

    public function update_dispensers_status(Request $request){
		self::update_dispanser_status();
        $dispanesers        = Dispaneser::whereIn('status', [1,2,3])->get();
        return view('/dispensers',compact('dispanesers'))->render();
    }

	//Load Updated Dispansers Status
	public function update_dispanser_status(){
		//Add Update Tank Command
		$rp                 = new RunninProcessModel;
        $rp->pfc_id         = '1';
        $rp->start_time     = '1';
        $rp->refresh_time   = '1';
        $rp->faild_attempt  = '0';
        $rp->class_name     = '1';
        $rp->type_id        = '3';
        $rp->created_at     = '1';
        $rp->updated_at     = '1';
        $rp->save();

		//Check if the update Tank Command is RUN
		while(true){
			$tank_update_query = RunninProcessModel::where('type_id', 3)->count();
			if($tank_update_query < 1){
				break;
			}
		}

		return true;

	}

}
