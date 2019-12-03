<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
    	return view('patients.index');
    }

    public function create()
    {
    	return view('patients.createpatient');
    }
    
    public function store()
    {
    	//stores registered patients
    }
}
