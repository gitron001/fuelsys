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
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $transactions       = Transaction::orderBy('created_at', 'DESC')->limit(15)->get();
        $company_low_limit  = Company::where('limit_left', '<' , 50)
                                        ->where('status',1)
                                        ->where('has_limit', 1)
                                        ->orderBy('limit_left', 'ASC')
                                        ->limit(15)
                                        ->get();
        $dispanesers        = Dispaneser::all();

        return view('welcome',compact('dispanesers','transactions','company_low_limit','tanks','stock_data','sales'));
    }

}
