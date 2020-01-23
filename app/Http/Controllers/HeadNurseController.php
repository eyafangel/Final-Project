<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HeadNurseController extends Controller
{
    public function index()
    {
    	return view('headnurse.index');
    }

    public function create()
    {
        $users = DB::select('select * from users where role="nurse"');
    	return view('headnurse.assignnurse', ['user'=>$users]);
    }
    
    public function store()
    {
    	//stores registered patients
    }
    
}
