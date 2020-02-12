<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Admission;
use DB;

class HeadNurseController extends Controller
{
    public function index()
    {
    	return view('headnurse.index');
    }

    public function create()
    {
        $nurse = User::where('role', 'nurse', true)->orderBy('name')->pluck('name');
        $patients = Patient::all();
        $id = DB::table('patients')->pluck('id');
        $admissions = Admission::where('patient_id', $id, true);
    	return view('headnurse.assignnurse', compact('nurse', 'patients', 'admissions'));
    }
    
    public function store()
    {
    	//stores registered patients
    }
    
}
