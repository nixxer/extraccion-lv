<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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
       $token = $request->header('APP_KEY'); 
        if($token != 'asd123456')
            return response()->json(['message'=>'No se pudo identificar'],401);
        else
            return $next($request);

       /*  if(Auth::onceBasic())
            return response()->json(['message'=>'No se pudo identificar'],401);
        else
            return $next($request); */

        return $next($request);
    }
}
