<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    public function home()
    {
        return view('admissions.home');
    }
    public function create()
    {
        return view('patients.create_patient');
    }

    public function store()
    {
        $patient = new Patient();
 
        $patient->last_name = request('last_name');
        $patient->first_name = request('first_name');
        $patient->middle_name = request('middle_name');
        $patient->sex = request('sex');
        $patient->birthday = request('birthday');
        $patient->age = request('age');
        $patient->contact_number = request('contact_number');
        $patient->marital_status = request('marital_status');
        $patient->nationality = request('nationality');
 
        $patient->save();
 
        return redirect('/');
    }
    
}
