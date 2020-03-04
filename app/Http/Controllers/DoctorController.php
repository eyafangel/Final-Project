<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Patient;
use App\Admission;
use Auth;
use App\Orders;
use App\User;

class DoctorController extends Controller
{
    public function home(Request $request)
    {
        
    }    
    
    public function showOrders()
    {
        $orders = DB::table('orders')
        ->join('patients', 'patients.id', '=', 'orders.patient_id')
        ->select('orders.*', 'patients.*')
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
        ->where('users_id' , $user_id)
        ->join('patients', 'admissions.patient_id', '=', 'patients.id')
        ->select('patients.*')
        ->paginate(10);
    
        return view('doctors.patList', [            
            'patients' => $patients                      
        ]);             
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

    public function storeTransfer(User $user, Request $request)
    {
        $userID = Auth::id(); 
        $pat=$request->input('patid');       
        $msg = $request->input('message');
        
        $patient = DB::table('patients')->where('id', $pat)->first();

        $prevUser = DB::table('users')->where('id', $userID)->first();
        $message = $msg."transferred from Doctor" . $prevUser->name . $prevUser->id;

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
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('role', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->paginate(5);
        return view('doctors.transfer', compact('patient', 'users'));
    }

    public function createTransfer(Patient $pat)
    {
        $users = DB::table('users')->get();
        $patient = DB::table('patients')->where('id', $pat->id)->first();
        return view('doctors.transfer', compact('patient', 'users'));       
    }
}
