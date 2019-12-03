<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
    	return view('nurses.index');
    }

    public function create()
    {
    	return view('nurses.createcharts');
    }

    public function store()
    {
    	//stores charts
    }
}
