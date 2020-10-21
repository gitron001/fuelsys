<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Company;

class ShowViewWithoutLogin
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

        if($main_company->direct_login == 1 && auth()->guest()){
            return redirect()->route('login');
        } else {
            return $next($request);
        }

        return $next($request);
    }
}
