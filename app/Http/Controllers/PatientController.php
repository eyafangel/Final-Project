<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;
use DB;

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

    public function show($id)
    {
        $patient = DB::table('patients')->where('id', $id)->first();
        // $patient = Patient::find($patient_id);
        // return view('patients.profile')->with('patient', $patient);
        return view('patients.profile',['patient'=>$patient]);

    }
}
