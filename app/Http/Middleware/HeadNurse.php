<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HeadNurse
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
        if(Auth::check() && Auth::user()->role == 'headNurse'){
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role == 'doctor'){
            return redirect('doctor');
        }
        elseif(Auth::check() && Auth::user()->role == 'nurse'){
            return redirect('nurses');
        }
        elseif(Auth::check() && Auth::user()->role == 'admin'){
            return redirect('admin');
        }
        elseif(Auth::check() && Auth::user()->role == 'admission'){
            return redirect('admissions/home');
        }
        elseif(Auth::check() && Auth::user()->role == 'medRecords'){
            return redirect('medRecords/home');
        }
        else {
        return redirect('/permission-denied');
        }
    }
}
