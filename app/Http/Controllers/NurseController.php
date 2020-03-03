<?php

namespace App\Http\Controllers;

// use Request;
use Illuminate\Http\Request;
use App\Rbs;
use App\Orders;
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
        return view('nurses.index', ['nurse' => $nurse , 'orders' => $orders]);
    }

    public function nurselist(){
        $id = Auth::id();
        $nurse = User::find($id);

        return view('nurses.patientlist', ['nurse' => $nurse]);
    }

    public function nurseorders(Patient $pat){
        $patid = $pat->id;        

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();
        $nurse_orders = Orders::where('patient_id', $patid)->where('status', '!=', 'done')->paginate(5);

        return view('nurses.nurseorders', compact('pat', 'admissions', 'patcharts', 'nurse_orders'));
    }

    public function storeorders(Request $request, Patient $pat){
        $pat->update($request->status);

        return redirect()->route('nurses.nurseorders');
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

    public function inputrbs(Patient $pat){
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

        $rbs_monitoring = Rbs::where('patient_id', $patid)->paginate(5);
        //dd($intake_outputs);

        return view('nurses.rbs', compact('pat','admissions', 'patcharts', 'nurse', 'rbs_monitoring'));
    }

    public function inputNursesNotes(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

        $nurse_notes = NurseNotes::where('patient_id', $patid)->paginate(5);
        //dd($intake_outputs);

        return view('nurses.nursesnotes', compact('pat','admissions', 'patcharts', 'nurse', 'nurse_notes'));
    }


    public function inputIntakeOutput(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

        $intake_outputs = IntakeOutput::where('patient_id', $patid)->paginate(5);
        //dd($intake_outputs);

        return view('nurses.intakeoutput', compact('pat','admissions', 'patcharts', 'nurse', 'intake_outputs'));
    }

    public function inputIvf(Patient $pat)
    {
        $id = Auth::id();
        $nurse = User::find($id);

        $patid = $pat->id;
        
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();
        
        $ivfs = IVF::where('patient_id', $patid)->paginate(5);

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
        $vitals = VitalSign::where('patient_id', $patid)->paginate(5);

        return view('nurses.vitalsigns', compact('pat','admissions', 'patcharts', 'nurse', 'vitals'));
    }

     public function storeNurseNotes(Request $request, Patient $pat)
    {
        //stores intake output
        // dd($pat);
        $patid = $pat->id;

        $id = Auth::id();

        $nurses_notes = new NurseNotes();

        $nurses_notes->patient_id = $patid;
        $nurses_notes->user_id = $id;
        $nurses_notes->focus = $request->input('focus');
        $nurses_notes->notes = $request->input('notes');

        $nurses_notes->save();
        

        return redirect()->route('input.nursesnotes', $pat->id);
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
        $vital->blood_pressure = $request->input('blood_pressure');
        $vital->o2_saturation = $request->input('o2_saturation');
        $vital->remarks = $request->input('remarks');

        $vital->save();  

        return redirect()->route('input.vitalsigns', $pat->id);
    }

    public function storerbs(Request $request, Patient $pat)
    {
        $patid = $pat->id;

        $id = Auth::id();
        $rbs = new Rbs();
        $rbs->patient_id = $patid;
        $rbs->user_id = $id;
        $rbs->rbs_result = $request->input('rbs_result');
        $rbs->nod = $request->input('nod');
        $rbs->remarks = $request->input('remarks');

        $rbs->save();

        return redirect()->route('input.rbs', $pat->id);
    }

    public function showScanner()
    {
        return view('nurses.qrscanner');
    }
    
}
