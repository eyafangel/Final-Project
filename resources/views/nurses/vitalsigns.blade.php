@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">
        {!! Form::open(['route' => 'store.vitalsigns', 'class' => 'form-group']) !!}
        <div class="form-group">

            <label>Date:</label>
            <input type="text" name="date" value="<?= date('m-d-Y'); ?>" readonly><br>

            <label>Temperature:</label>
            <input type="text" name="temperature" id="temperature" required><br>

            <label>Pulse Rate:</label>
            <input type="text" name="pulse_rate" id="pulse_rate" required><br>

            <label>Respiratory Rate:</label>
            <input type="text" name="respiratory_rate" id="respiratory_rate" required><br>

            <label>Blood Pressure:</label>
            <input type="text" name="blood_pressure" id="blood_pressure" required><br>

            <label>O2 Saturation:</label>
            <input type="text" name="o2_saturation" id="o2_saturation" required><br>

            <label>Remarks:</label>
            <input type="text" name="remarks" id="remarks" required><br>
        </div>
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    
@endsection