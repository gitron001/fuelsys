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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

    public function testing_event(){

        event(new Event_Test('hello world'));
        echo 'ok';
    }
}
