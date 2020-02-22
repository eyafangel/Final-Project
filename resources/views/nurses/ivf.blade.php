@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">
    	{!! Form::open(['route' => 'store.ivf', 'class' => 'form-group']) !!}
        <div class="form-group">
            <label>IVF Volume</label>
            <input type="text" name="ivf_vol" id="ivf_vol" required><br>

            <label>Bottle Number:</label>
            <input type="text" name="bottle_number" id="bottle_number" required><br>

            <label>Medication:</label>
            <input type="text" name="medication" id="medication" required><br>

            <label>Regulation:</label>
            <input type="text" name="regulation" id="regulation" required><br>

            <label>Level:</label>
            <input type="text" name="level" id="level" required><br>

            <label>Time Started:</label>
            <input type="text" name="time_started" id="time_started" required><br>

            <label>Time Consumed:</label>
            <input type="text" name="time_consumed" id="time_consumed" required><br>

			<label>Notes</label>
            <input type="text" name="notes" id="notes" required><br>            
        </div>
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
    </div>
    
@endsection