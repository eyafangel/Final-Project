<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPage(){
    	return view('user');
    }

    public function adminPage(){
    	return view('admin');
    }

    public function permissionDenied(){
    	return view('nopermission');
    }
}
