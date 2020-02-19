<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IntakeOutput;
use App\NurseNotes;
use App\VitalSign;
use App\Admission;
use App\Patient;
use App\Chart;
use App\User;
use App\IVF;
use Auth;
use DB;

class NurseController extends Controller
{
    public function index()
    {
         $id = Auth::id();

    	return view('nurses.index', [
            'nurse' => User::find($id)
        ]);
    }

    public function show(Patient $pat)
    {
        $patid = $pat->id;
        $admissions = Admission::where('patient_id', $patid)->first();
        $patcharts = Chart::where('patient_id', $patid)->first();
    	return view('nurses.viewcharts', compact('pat','admissions', 'patcharts'));
    }

    public function inputIntakeOutput()
    {
        return view('nurses.intakeoutput');
    }

    public function inputIvf()
    {
        return view('nurses.ivf');
    }

    public function inputVitalSigns()
    {
        return view('nurses.vitalsigns');
    }
    

    public function store()
    {
    	//stores charts
    }
}
