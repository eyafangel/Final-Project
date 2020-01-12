<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Patient;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    public function home()
    {
        return view('admissions.home');
    }
    public function create()
    {
        return view('admissions.create_patient');
    }

    public function store()
    {
        $patient = new Patient();
 
        $patient->last_name = request('last_name');
        $patient->first_name = request('first_name');
        $patient->middle_name = request('middle_name');
        $patient->sex = request('sex');
        $patient->birthday = date('Y-m-d', strtotime($patient['birthday']));        
        $patient->age = request('age');
        $patient->contact_number = request('contact_number');
        $patient->marital_status = request('marital_status');
        $patient->nationality = request('nationality');
 
        $patient->save();

        $residence = new Residence();
        $residence->lot=request('lot');
        $residence->street=request('street');        
        $residence->city=request('city');
        $residence->postal_code=request('postal_code');
        $residence->province=request('province');
        $residence->country=request('country');

        $residence->save();

        $guardian = new Guardian();
        $guardian->guardian_last_name=request('guardian_last_name');
        $guardian->guardian_first_name=request('guardian_first_name');
        $guardian->guardian_middle_name=request('guardian_middle_name');
        $guardian->guardian_contact_number=request('guardian_contact_number');
        $guardian->relationship_to_patient=request('relationship_to_patient');
 
        $guardian->save();

        return redirect('admissions');
    }
    
}
