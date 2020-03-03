<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Doctor
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
        if(Auth::check() && Auth::user()->role == 'doctor'){
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role == 'admin'){
            return redirect('admin');
        }
        elseif(Auth::check() && Auth::user()->role == 'nurse'){
            return redirect('nurses');
        }
        elseif(Auth::check() && Auth::user()->role == 'headNurse'){
            return redirect('headnurse');
        }
        elseif(Auth::check() && Auth::user()->role == 'admission'){
            return redirect('admissions');
        }
        elseif(Auth::check() && Auth::user()->role == 'medRecords'){
            return redirect('medRecords/home');
        }
        else {
        return redirect('/permission-denied');
        }
    }
}
