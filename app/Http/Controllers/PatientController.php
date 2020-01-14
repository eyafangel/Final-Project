<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

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

    public function show($patient_id)
    {
        $patient = Patient::find($patient_id);
        return view('patients.profile')->with('patient', $patient);

    }
}
