<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            //user role ==0
            //admin role==1
            //head admin role==2
            //deactivate user role ==3
            if(Auth::user()->role ==1){
                return $next($request);
            } elseif(Auth::user()->role ==2){
                return $next($request);
            }else if(Auth::user()->role ==3){
                return redirect('/login')->with('message', 'Login to access the website info');
            }else{
                return redirect('/home')->with('message', 'Access Denied as you are not Admin!');
            }


        }else{
            return redirect('/login')->with('message', 'Login to access the website info');
        }
        return $next($request);
    }
}
