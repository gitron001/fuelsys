<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RfidAuth
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
        $token = $request->header('Authorization');
        if($token != 'ABCDEFGHIJK'){
            return response()->json(['message'=>'Token not found'],401);
        }
        
        return $next($request);
    }
}
