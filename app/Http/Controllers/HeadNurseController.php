<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadNurseController extends Controller
{
    public function index()
    {
    	return view('headnurse.index');
    }

    public function create()
    {
    	return view('headnurse.assignnurse');
    }
    
    public function store()
    {
    	//stores registered patients
    }
    
}
