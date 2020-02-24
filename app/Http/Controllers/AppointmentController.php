<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function loadAppointments(Request $request)
    {
        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        $appointments = Appointment::whereBetween('start', [$start, $end])->get($returnedColumns);

        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        Appointment::create($request->all());

        return response()->json(true);
    }

    public function update(Request $request)
    {
        $appointment = Appointment::where('id', $request->id)->first();

        $appointment->fill($request->all);

        $appointment->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        Appointment::where('id', $request->id)->delete();

        return response()->json(true);
    }

}
