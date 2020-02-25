<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Patient;
use App\Admission;
use Auth;
use App\Orders;

class DoctorController extends Controller
{
    public function home(Request $request)
    {
        $user_id = Auth::id();

        // $patientid = $request->input('patid');

        return view('doctors.home', [            
            'patients' => DB::table('admissions')
                    ->where('users_id' , $user_id)
                    ->join('patients', 'admissions.patient_id', '=', 'patients.id')
                    ->select('patients.*')
                    ->get(),
            // 'orders' =>  DB::table('orders')
            //         ->where('patient_id' , $patientid)
            //         ->get()

        ]);
       
        // $orders = Orders::find($user_id);

        // $admissions = DB::table('admissions')->where('users_id' , $id)->get();
        
        // foreach($admissions as $admission)
        // {
        //     $admission->patient_id;
        // }
        
       
        // $patients = DB::table('patients')->where('id', $admissions->patient_id)->get();
        
    	// return view('doctors.home', compact('patients'));
    }      
    
    
    public function showOrders(Patient $pat)
    {
        // $patid = $pat->id;            
        $orders = DB::table('orders')->where('patient_id' , $pat)->get();
              
        return view('doctors.showOrder', compact('orders', 'pat'));
    }

    public function createOrder(Patient $pat)
    {   
        return view('doctors.order')->with('pat');
    }

    public function storeOrder(Request $request)
    {     
        $id = Auth::id();

        $orders = new Orders(); 
        $orders->patient_id = $request->input('patid'); 
        dd($request->input('patid'));      
        $orders->user_id = $id;
       
        $orders->orderDate = date("Y-m-d H:i:s");   
            
        $orders->message = $request->input('message');       
        $orders->save();

        return redirect('doctor');
    }

    

    public function edit()
    {
        return view('doctors.schedule');
    }

    public function show()
    {             
        $id = Auth::id();        
        $patients =  DB::table('admissions')->where('user_id', $id)->get();

        return view('doctors.patientList')->with('patients', $patients);            
    }

    public function createPatient()
    {
        $patients = DB::table('patients')->get();
        return view('doctors.addPatient', compact('patients'));
    }

    public function storePatient(Request $request)
    {        
        $id = Auth::id();   

        if($request->has('addedPatient'))
        {
            $patid = $request->get('addedPatient'); 
            
            
            // $patient = DB::table('admissions')->where('patient_id', $patid)->get();
            
            // Admission::updateOrCreate(['id' => $patid, 'name' => 'Joe'] , ['age' => 15] );
            // // $patient->users_id = $id;
            
            

            // $admission = Admission::find($patient);

            // $admission->users_id = $id; 
            
            DB::table('admissions')
            ->where('patient_id', $patid)
            ->update(['users_id' => $id]);

        }

        return redirect('doctor');
    }
}
