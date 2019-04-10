<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispaneser;
use App\Models\Transaction;
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
        
        $transactions   = Transaction::orderBy('created_at', 'DESC')->limit(15)->get();
        $dispanesers    = Dispaneser::all();

        return view('welcome',compact('dispanesers','transactions'));
    }

    public function email(Request $request){
        $title = 'Title';
        $content = 'Content';

        Mail::send('emails.report', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('orges1@hotmail.com', 'Christian Nwamba');

            $message->to('orges1@hotmail.com');


            //Add a subject
            $message->subject("Hello from Scotch");

        });
        
    }
}