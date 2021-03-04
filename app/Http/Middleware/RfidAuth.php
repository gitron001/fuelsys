<?php

namespace App\Http\Middleware;

use App\Models\Branch;
use Closure;
use Auth;
use Session;

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

        if(isset($token)){
            $access_token_db = Branch::select('remember_token','id')->where('remember_token',$token)->first();
            if(!empty($access_token_db) > 0){ Session::put('branch_id', $access_token_db->id); };
                if($token != $access_token_db->remember_token){
                    return response()->json(['message'=>'Token not found / Incorrect token'],401);
                }

            return $next($request);
        }else{
            return response()->json(['message'=>'Token not found'],401);
        }

    }
}
