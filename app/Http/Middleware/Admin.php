<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        // return $next($request);
        if(Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role == 'doctor'){
            return redirect('doctor');
        }
        elseif(Auth::check() && Auth::user()->role == 'nurse'){
            return redirect('nurses/index');
        }
        elseif(Auth::check() && Auth::user()->role == 'headNurse'){
            return redirect('headnurse');
        }
        elseif(Auth::check() && Auth::user()->role == 'admission'){
            return redirect('admissions/home');
        }
        else {
        return redirect('/');
        }
    }

}
