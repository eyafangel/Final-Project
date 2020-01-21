<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    protected function redirectTo( ) {
    if (Auth::check() && Auth::user()->role == 'doctor') {
        return('doctor/home');
    }
    elseif (Auth::check() && Auth::user()->role == 'nurse') {
        return('nurses/index');
    }
    elseif (Auth::check() && Auth::user()->role == 'admission') {
        return('admissions/home');
    }
    elseif (Auth::check() && Auth::user()->role == 'headNurse') {
        return('headnurse/index');
    }
    // elseif (Auth::check() && Auth::user()->role == 'headNurse') {
    //     return('headnurse/index');
    // }
    else {
        return('/home');
    }
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
