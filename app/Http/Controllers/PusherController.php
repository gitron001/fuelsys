<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\FormSubmitted;
use Pusher\Pusher;

class PusherController extends Controller
{
    public function sender(Request $request)
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'eu',
            'encrypted' => true
        );

       //Remember to set your credentials below.
        $pusher = new Pusher(
            'e4958392f2f741f9f74c',
            '75905fa4e45f4d69f0d1',
            '849737',
            $options
        );

        $message= request()->text;

        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('my-channel', 'my-event', $message);


        $text = request()->text;
        //event(new FormSubmitted('hello world'));*/
        event(new FormSubmitted($text));
        //return "OK";
    }
}
