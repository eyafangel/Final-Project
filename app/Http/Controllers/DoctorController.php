<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

class DoctorController extends Controller
{
    public function home()
    {
        $id = Auth::id();
        
        return view('doctors.home');
    }

    public function createOrder()
    {
        return view('doctors.order');
    }

    public function storeOrder(Request $request)
    {         
        $order = new Order();    
    
        $patient_id = $request->input('patient');   
        $order->patient_id = $patient_id;                 
        $order->order = request('order');
        
                
    //flash('Order Successfully Created!')->success();
    //put success alert dialog box message here

    // return redirect()->route('doctors.orderList');

    return view('doctors.home');
    }

    public function showOrders($patient_id)
    {
        // $user = DB::table('users')->where('name', 'John')->first();
        $doctor_orders = DB::table('orders')->where('patient_id' , $patient_id)->get();

        return view('doctors.orderList', ['doctor_orders' => $doctor_orders]);
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
}
