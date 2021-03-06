<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function loadEvents(Request $request)
    {
        $returnedColumns = ['id', 'title',  'start', 'end', 'color', 'description'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        $events = Event::whereBetween('start', [$start, $end])->get($returnedColumns);

        return response()->json($events);
    }

    public function store(AppointmentRequest $request)
    {
        Event::create($request->all());

        // $event = new Event();
        // $event->user_id = $id;
        // $event->save();
        return response()->json(true);
    }

    public function update(AppointmentRequest $request)
    {
        $event = Event::where('id', $request->id)->first();

        $event->fill(array('id' => $request->id, 'patient_id' => '1', 'user_id' => '1', 'title' => $request->title, 'description' => $request->description, 'start' => $request->start, 'end' => $request->end));

        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        Event::where('id', $request->id)->delete();
        return response()->json(true);
    }
}
