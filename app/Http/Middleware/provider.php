<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class provider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->admin == '2'){

                return $next($request);
            }else{
                return redirect('/home')->with('status','Access denied! you are not admin');
            }
        }else{
            return redirect('/home')->with('status','please login first');
        }
    }
}
