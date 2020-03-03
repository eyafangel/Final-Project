<?php

namespace App\Http\Controllers;

// use Request;
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
        $nurse = User::find($id);
        $patid = $nurse->patient;
        // dd($patid);
        $orders = DB::table('orders')
                    ->join('patients', 'patients.id', '=', 'orders.patient_id')
                    ->select('orders.*', 'patients.*')
                    ->paginate(10);
        // dd($order);   
        return view('nurses.index', ['orders' => $orders]);
    }

    public function nurselist(){
        $id = Auth::id();
        $nurse = User::find($id);

        return view('nurses.patientlist', ['nurse' => $nurse]);
    }

    public function storeorders(){

    }


    // public function search(Request $request){
    //     // dd($request);
    //     $search = Request::get('patientsearch');

    //     $patients = DB::table('patients')
    //                 ->where('last_name', 'like', '%'.$search.'%')
    //                 ->orWhere('first_name', 'like', '%'.$search.'%')
    //                 ->orWhere('middle_name', 'like', '%'.$search.'%')
    //                 ->orWhere('middle_name', 'like', '%'.$search.'%')
    //                 ->paginate(5);
        
    //     return view('nurses.index', ['nurse' => $patients]);
    // }


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

        $intake_outputs = IntakeOutput::where('patient_id', $patid)->get();

        return view('nurses.intakeoutput', compact('pat','admissions', 'patcharts', 'nurse', 'intake_outputs'));
    }

    public function inputIvf(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;
        
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();
        
        $ivfs = IVF::where('patient_id', $patid)->get();

        return view('nurses.ivf', compact('pat','admissions', 'patcharts', 'ivfs'));
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
        $vitals = VitalSign::where('patient_id', $patid)->get();

        return view('nurses.vitalsigns', compact('pat','admissions', 'patcharts', 'nurse', 'vitals'));
    }
    

    public function storeIntakeOutput(Request $request, Patient $pat)
    {
    	//stores intake output
        // dd($pat);
        $patid = $pat->id;

        $id = Auth::id();

        $intakeout = new IntakeOutput();

        $intakeout->patient_id = $patid;
        $intakeout->user_id = $id;
        $intakeout->ivf = $request->input('ivf');
        $intakeout->volume_infused = $request->input('volume_infused');
        $intakeout->oral = $request->input('oral');
        $intakeout->urine = $request->input('urine');
        $intakeout->drainage_volume = $request->input('drainage_volume');
        $intakeout->stools_volume_description = $request->input('stools_volume_description');
        $intakeout->total_intake = $request->input('total_intake');
        $intakeout->hour24_urine = $request->input('hour24_urine');
        $intakeout->total_output = $request->input('total_output');

        $intakeout->save();
        

        return redirect()->route('input.intakeoutput', $pat->id);
    }

    public function storeIvf(Request $request, Patient $pat)
    {
        //stores ivf
        $patid = $pat->id;

        $id = Auth::id();

        $ivf = new IVF();

        // Carbon::createFromFormat('h : i : A', '06 : 00 : PM');
        // Carbon::createFromFormat('h : i : A', Input::get("start_time".$array[$x]));

        $ivf->patient_id = $patid;
        $ivf->user_id = $id;
        $ivf->ivf_volume = $request->input('ivf_volume');
        $ivf->bottle_number = $request->input('bottle_number');
        $ivf->medication = $request->input('medication');
        $ivf->regulation = $request->input('regulation');
        $ivf->level = $request->input('level');
        // $timestarted =$request->input('time_started');
        $ivf->time_started = $request->input('time_started');
        $ivf->time_consumed = $request->input('time_consumed');
        $ivf->notes = $request->input('notes');

        $ivf->save();  

        return redirect()->route('input.ivf', $pat->id);
    }

    public function storeVitalSigns(Request $request, Patient $pat)
    {
        //stores vital signs

        $patid = $pat->id;

        $id = Auth::id();

        $vital = new VitalSign();

        $vital->patient_id = $patid;
        $vital->users_id = $id;
        $vital->temperature = $request->input('temperature');
        $vital->pulse_rate = $request->input('pulse_rate');
        $vital->respiratory_rate = $request->input('respiratory_rate');
        $vital->o2_saturation = $request->input('o2_saturation');
        $vital->remarks = $request->input('remarks');

        $vital->save();  

        return redirect()->route('input.vitalsigns', $pat->id);
    }

    public function showScanner()
    {
        return view('nurses.qrscanner');
    }
    
}
