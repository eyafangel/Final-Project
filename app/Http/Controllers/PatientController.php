<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;
use App\Admission;
use DB;

class PatientController extends Controller
{
    // public function index()
    // {
    // 	return view('patients.index');
    // }

    // public function create()
    // {
    // 	return view('patients.createpatient');
    // }
    
    // public function store()
    // {
    	//stores registered patients
    // }

    public function show($id)
    {
        
        $patient = Patient::where('id', $id)->with(['admissions'])->first();
        $admissions = Admission::where('patient_id', $id)->first();
        return view('patients.profile', ['patient'=>$patient, 'admissions'=>$admissions]);

    }
}
