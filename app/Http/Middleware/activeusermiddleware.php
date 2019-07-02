<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Auth;

class activeusermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $status = null)
    {  

    
        if (Auth::user()->status == $status ) { 
            return $next($request); 
        }  
        return redirect('/');
        
    }
}
 