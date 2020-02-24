<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IntakeOutput;
use App\NurseNotes;
use App\VitalSign;
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

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();   

    	return view('nurses.viewcharts', compact('pat','admissions', 'patcharts'));
    }

    public function inputIntakeOutput(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();


        return view('nurses.intakeoutput', compact('pat','admissions', 'patcharts', 'nurse'));
    }

    public function inputIvf(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();
        return view('nurses.ivf', compact('pat','admissions', 'patcharts'));
    }

    public function inputVitalSigns(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')
            ->where('patient_id', $patid)
            ->first();
        $vitals = DB::table('vital_signs')
            ->join('patients', 'vital_signs.patient_id', '=', 'patients.id')
            ->select('vital_signs.*', 'patients.last_name');

        return view('nurses.vitalsigns', compact('pat','admissions', 'patcharts', 'nurse'));
    }
    

    public function storeIntakeOutput()
    {
    	//stores intake output
    }

    public function storeIvf()
    {
        //stores ivf
    }

    public function storeVitalSigns()
    {
        //stores vital signs
    }

    public function showScanner()
    {
        return view('nurses.qrscanner');
    }

    public function showScanned()
    {
        return view('nurses.scanned');
    }
}
