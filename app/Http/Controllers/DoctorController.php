<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function home()
    {
        return view('doctors.doctorHome');
    }

    public function create()
    {
        return view('doctors.order');
    }

    public function store(Request $request)
    {
        $order = [];

        $order['patient'] = $request->get('patient');
        $order['receiver'] = $request->get('receiver');
        $order['order'] = $request->get('order');


    flash('Order Successfully Created!')->success();

    return redirect()->route('home');
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
