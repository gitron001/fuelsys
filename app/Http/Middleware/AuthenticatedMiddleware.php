<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticatedMiddleware
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
        if(Auth::check() && Auth::getUser()->type == 3 || Auth::getUser()->type == 5){
            return $next($request);
        }else{
            abort(403, 'Unauthorized action.');
        }

        return redirect('/login');
        
    }
}
