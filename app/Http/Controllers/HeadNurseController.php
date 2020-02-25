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
        return view('headnurse.assignnurse', [
            'nurses' => User::where('role', 'nurse')
                    ->orderBy('name')
                    ->select('name', 'id')
                    ->get(),
            'patients' => DB::table('patients')
                    ->join('admissions', 'patients.id', '=', 'admissions.patient_id')
                    ->select('patients.*', 'admissions.room')
                    ->paginate(10)
                    ->get()
        ]);
    }
    
    public function store(Request $request)
    {
        //checking for all requested values
        // dd(request()->all());

        $nurse = request('nurse');
        $pat = $request->get('pat');
        // dd($pat);
        $user = \App\User::find($nurse);

        $user->patient()->attach($pat);

        $notif = array(
                'message' => 'Nurse Already Assigned!',
                'alert-type' => 'success');

        return redirect('assign')->with($notif);

    }
    
}
