<?php

namespace App\Http\Controllers;

use Request;
use App\Patient;
use App\Admission;
use App\Residence;
use Auth;
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

    // public function search(Request $request){
    //     // dd($request);
    //     $search = Request::get('searchpatient');

    //     $patients = DB::table('patients')
    //                 ->where('last_name', 'like', '%'.$search.'%')
    //                 ->orWhere('first_name', 'like', '%'.$search.'%')
    //                 ->orWhere('middle_name', 'like', '%'.$search.'%')
    //                 ->orWhere('middle_name', 'like', '%'.$search.'%')
    //                 ->paginate(5);
    //     $user = Auth::user();
    //     $role =$user->role;
        

    //     if ($role == 'headNurse') {
    //         return view('headnurse.assignnurse', ['patients' => $patients]);
    //     }elseif ($role == 'nurse') {
    //         return view('nurse.index', ['patients' => $patients]);
    //     }elseif ($role == 'admissions') {
    //         return view('admissions.list', ['patients' => $patients]);
    //     }else{
    //         return view('/');
    //     }

        
    }

    public function show($id)
    {
        
        $patient = Patient::where('id', $id)->with(['admissions'])->first();
        $admissions = Admission::where('patient_id', $id)->first();
        $residence = Residence::where('id', $id)->first();
        
        return view('patients.profile', ['patient'=>$patient, 'admissions'=>$admissions, 'residence' => $residence]);

    }
}
