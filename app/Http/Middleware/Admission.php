<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admission
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
        if(Auth::check() && Auth::user()->role == 'admission'){
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role == 'doctor'){
            return redirect('doctor/home');
        }
        elseif(Auth::check() && Auth::user()->role == 'nurse'){
            return redirect('nurses/index');
        }
        elseif(Auth::check() && Auth::user()->role == 'headNurse'){
            return redirect('headnurse');
        }
        elseif(Auth::check() && Auth::user()->role == 'admin'){
            return redirect('admin');
        }
        elseif(Auth::check() && Auth::user()->role == 'medRecords'){
            return redirect('medRecords/home');
        }
        else {
        return redirect('/');
        }
    }
}
