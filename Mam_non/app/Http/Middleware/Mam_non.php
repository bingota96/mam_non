<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;
class Mam_non
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

        if(Auth::check()){   
         
        }else{
            return redirect()->route('Login');        
        }
         return $next($request);
    }
}
