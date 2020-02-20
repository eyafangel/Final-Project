@extends('nurses.viewcharts')

@section('chart_content')
    {!! Form::open(['route' => 'store.chart', 'class' => 'form-group']) !!}
    <div class="container-fluid">
        <div class="form-group">
            <label>Date:</label>
            <input type="text" name="date"><br>

            <label>Time:</label>
            <input type="text" name="time"><br>

            <label>Temperature:</label>
            <input type="text" name="temperature"><br>

            <label>Pulse Rate:</label>
            <input type="text" name="pulse_rate"><br>

            <label>Respiratory Rate:</label>
            <input type="text" name="respiratory_rate"><br>

            <label>Blood Pressure:</label>
            <input type="text" name="blood_pressure"><br>

            <label>O2 Saturation:</label>
            <input type="text" name="o2_saturation"><br>

            <label>Remarks:</label>
            <input type="text" name="remarks"><br>
        </div>
    </div>
    {!! Form::close() !!} 
@endsection