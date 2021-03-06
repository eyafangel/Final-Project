<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Patient;
use App\Admission;
use App\Notifications\NewPatient;
use DB;

class HeadNurseController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $assigned = DB::table('patient_user')
                    ->join('users', 'patient_user.user_id', '=', 'users.id')
                    ->join('patients', 'patient_user.patient_id', '=', 'patients.id')
                    ->join('admissions', 'patients.id', '=', 'admissions.patient_id')
                    ->select('users.name', 'patients.*', 'patient_user.*')
                    ->whereNotIn('status', ['discharge'])
                    ->paginate(10);
        return view('headnurse.index', compact('assigned', 'user'));
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
        ]);
    }
    
    public function store(Request $request)
    {
        $nurse = request('nurse');
        $datea = $request->get('datea');
        $timea = $request->get('timea');
        $pat = $request->get('pat');
        $user = \App\User::find($nurse);
        User::find($nurse)->notify(new NewPatient);
        $user->patient()->attach($pat, ['date' => $datea, 'time' => $timea]);
        return redirect('assign');
    }
    
}