<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function home()
    {
        return view('doctors.doctorHome');
    }

    public function createOrder()
    {
        return view('doctors.order');
    }

    public function storeOrder(Request $request)
    {     
       
        $order = new Order();    
    
        $patient_id = $request->input('patient');                
        $patient= DB::table('charts')->where('patient_id', $patient_id)->first();
        $order->order = request('order');        
        
    //flash('Order Successfully Created!')->success();
    //put success alert dialog box message here

    return redirect()->route('home');
    }

    public function createTransfer()
    {
        return view('doctors.transfer');
    }

    public function storeTransfer()
    {
        
    }

    public function edit()
    {
        return view('doctors.schedule');
    }

    public function show()
    {
        return view('doctors.list');
    }
}
