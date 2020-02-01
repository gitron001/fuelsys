<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Company;

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
        $main_company = Company::where('status',4)->first();
        $url = request()->segment(count(request()->segments()));

        // First check if a user is logged in and if the company want to show transaction view without login
        if($url == 'transactions' && Auth::check() == 0 && $main_company->show_transaction == 1){
            return $next($request);
        }else if(Auth::check()){
            return $next($request);
        }else{
            return redirect()->route('login');
        }

    }
}
