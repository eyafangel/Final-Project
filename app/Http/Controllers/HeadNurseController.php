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
        $nurse = User::where('role', 'nurse', true)->orderBy('name')->pluck('name', 'id');
        // $pat = Patient::all();
        $patients = DB::table('patients')
                    ->join('admissions', 'patients.id', '=', 'admissions.patient_id')
                    ->select('patients.*', 'admissions.room')
                    ->get();
        return view('headnurse.assignnurse', compact('nurse', 'patients'));
    }
    
    public function store()
    {
    	//stores nurse's id into patient table
        $patient = new Patient;
        $nurse_id = request('id');
        
        $patient->user_id = $nurse_id;

        $patient->save();

        return redirect('headnurse.assignnurse');

    }
    
}
