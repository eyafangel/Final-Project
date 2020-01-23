<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function userPage(){
    	return view('user');
    }

    // public function adminPage(){
    	// $userRoles = Auth::user()->users->pluck('name');
     //    dd($userRoles);
     //    if(!$userRoles->contains('admin')){
     //            return redirect('/nopermission');
     //    }
    // 	return view('admin.admin');
    // }

    public function permissionDenied(){
    	return view('nopermission');
    }
}
