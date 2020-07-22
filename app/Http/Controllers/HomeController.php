<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Dispaneser;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\Tank;
use App\Mail\ReportMail;
use Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $transactions       = Transaction::orderBy('created_at', 'DESC')->limit(15)->get();
        $company_low_limit  = Company::where('limit_left', '<' , 50)->where('status',1)->where('has_limit', 1)->orderBy('limit_left', 'ASC')->limit(15)->get();
        $dispanesers        = Dispaneser::all();
        $tanks              = Tank::all();
        return view('welcome',compact('dispanesers','transactions','company_low_limit','tanks'));
    }

    public function email(Request $request){
        $title = 'Title';
        $content = 'Content';

        Mail::send('emails.report', ['title' => $title, 'content' => $content], function ($message)
        {

            //$message->from('orges1@hotmail.com', 'Christian Nwamba');

            $message->to('orgesthaqi96@gmail.com');


            //Add a subjectz
            $message->subject("Hello from Scotch");

        });

    }

}
