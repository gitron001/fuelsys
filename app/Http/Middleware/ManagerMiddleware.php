<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;



class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type != 5){
            return $next($request);
        }else{
            return new Response(view('404'));
        }
    }
}
