<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Patient;
use App\Admission;
use Auth;
use App\Orders;
use App\User;
use App\Rbs;
use App\IntakeOutput;
use App\VitalSign;
use App\IVF;
use App\Notifications\NewPatient;

class DoctorController extends Controller
{
    public function home(Request $request)
    {
        return view('doctors.home');
    }    
    
    public function showOrders()
    {
        $id = Auth::id();

        $orders = DB::table('orders')
            ->join('patients', 'patients.id', '=', 'orders.patient_id')
            ->select('orders.*', 'patients.*')
            ->where('orders.user_id', $id)
            ->get();

        return view('doctors.order', ['orders' => $orders]);   
    }    

    public function storeOrder(Request $request, Patient $pat)
    {
        $id = Auth::id();
        $orders = new Orders(); 
        $orders->patient_id = $pat->id;            
        $orders->user_id = $id;       
        $orders->orderDate = date("Y-m-d H:i:s");            
        $orders->message = $request->input('message');
        $orders->status = 'pending';       

        $orders->save();

        return redirect()->route('show.patient', $pat->id);
    }    

    public function edit()
    {
        return view('doctors.schedule');
    }

    public function showList()
    {
        $user_id = Auth::id();
        $patients = DB::table('admissions')
            ->where('users_id', $user_id)
            ->join('patients', 'admissions.patient_id', '=', 'patients.id')
            ->select('patients.*', 'admissions.status')
            ->whereNotIn('status', ['discharge'])
            ->paginate(10);

        // dd($patients);

        return view('doctors.patList', [
            'patients' => $patients
        ]);             
    }

    public function createPatient()
    {
        $id = Auth::id();

        $patients = DB::table('patients')
            ->join('admissions', 'admissions.patient_id', '=', 'patients.id')
            ->where('admissions.users_id', '!=', $id)->get();
        return view('doctors.addPatient', compact('patients'));
    }

    public function storePatient(Request $request)
    {        
        $id = Auth::id();   

        if($request->has('addedPatient'))
        {
            $patid = $request->get('addedPatient');

            DB::table('admissions')
                ->where('patient_id', $patid)
                ->update(['users_id' => $id]);
        }

        return redirect('doctor');
    }

    public function showPatient(Patient $pat)
    { 
        $patid = $pat->id;
        $patient = DB::table('patients')->where('id', $patid)->first();
        $admission = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

    	return view('doctors.patient', compact('patient', 'admission', 'patcharts'));       
    }

    public function storeTransferMessage(User $user, Patient $pat)
    {
        $newUser = DB::table('users')->where('id', $user->id)->first();        
        $patient = DB::table('patients')->where('id', $pat->id)->first();
      

        return view('doctors.createTransfer', compact('newUser', 'patient'));
    }

    public function storeTransfer(User $user, Request $request)
    {
        $userID = Auth::id(); 
        $pat=$request->input('patid');       
        $msg = $request->input('message');
        
        $patient = DB::table('patients')->where('id', $pat)->first();

        $prevUser = DB::table('users')->where('id', $userID)->first();
        $message = $msg."transferred from Doctor" . $prevUser->name . $prevUser->id;

        User::find($user->id)->notify(new NewPatient);

        $order = new Orders();
        $order->patient_id =$pat;
        $order->user_id= $user->id;
        $order->message = $message;
        $order->orderDate = date("Y-m-d H:i:s"); 
        $order->status = "NEW PATIENT";
        $order->save();

        DB::table('admissions')
            ->where('patient_id', $pat)
            ->update(['users_id' => $user->id]);
                //alert success transfer
        return redirect()->route('list.show');
    }

    public function search(Request $request, Patient $pat)
    {
        $patient = DB::table('patients')->where('id', $pat->id)->first();
        $search = $request->get('search');
        $users = DB::table('users')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(5);
        return view('doctors.transfer', compact('patient', 'users'));
    }

    public function createTransfer(Patient $pat)
    {
        $users = DB::table('users')->get();
        $patient = DB::table('patients')->where('id', $pat->id)->first();
        return view('doctors.transfer', compact('patient', 'users'));       
    }

    public function showChart(Patient $pat)
    {
        $patid = $pat->id;        

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

    	return view('doctors.showChart', compact('pat','admissions', 'patcharts'));
    }

    public function showRbs(Patient $pat)
    {
        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

        $rbs_monitoring = Rbs::where('patient_id', $patid)->paginate(5);

        return view('nurses.rbs', compact('pat','admissions', 'patcharts', 'rbs_monitoring'));
    }

    public function storeDiagnosis(Request $request, Patient $pat)
    {
        $patid = $pat->id;

        $diag = $request->input('diagnosis');

        DB::table('admissions')
                ->where('patient_id', $patid)
                ->update(['diagnosis' => $diag]);

        return redirect()->route('show.patient', $pat->id);

    }

    public function showIvf(Patient $pat)
    {
        $patid = $pat->id;
        
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();
        
        $ivfs = IVF::where('patient_id', $patid)->paginate(5);

        return view('nurses.ivf', compact('pat','admissions', 'patcharts', 'ivfs'));
    }

    public function showVitals(Patient $pat)
    {
        $patid = $pat->id;
        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();
        $patcharts = DB::table('charts')
            ->where('patient_id', $patid)
            ->first();
        $vitals = VitalSign::where('patient_id', $patid)->paginate(5);

        return view('nurses.vitalsigns', compact('pat','admissions', 'patcharts', 'vitals'));
    }

    public function showIntakeoutput(Patient $pat)
    {
        $patid = $pat->id;

        $admissions = DB::table('admissions')->where('patient_id', $patid)->first();

        $patcharts = DB::table('charts')->where('patient_id', $patid)->first();

        $intake_outputs = IntakeOutput::where('patient_id', $patid)->paginate(5);       

        return view('nurses.intakeoutput', compact('pat','admissions', 'patcharts', 'intake_outputs'));
    }
}
