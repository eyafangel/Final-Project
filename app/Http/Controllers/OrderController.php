<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder()
    {
        return view('doctors.order');
    }

    public function storeOrder(Request $request)
    {         
        $orders = new Order();  
        $now = date('Y-m-d H:i:s');  
        $orders->orderDate = $request('orderDate');   
        $orders->patient_id = $request->input('patid');     
        $orders->message = $request->input('message');       
     

        return view('doctors.home', compact('orders'));
    }

}
