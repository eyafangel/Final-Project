@extends('nurses.viewcharts')

@section('chart_content')

	<div class="container-fluid">
		{!! Form::open(['route' => 'store.intakeoutput', 'class' => 'form', 'required']) !!}

		<label for="ivf">IVF</label>
		<input type="text" name="ivf" id="ivf" required><br>

		<label for="volume_infused">Volume Infused</label>
		<input type="text" name="volume_infused" id="volume_infused" required><br>

		<label for="oral">Oral</label>
		<input type="text" name="oral" id="oral" required><br>

		<label for="urine">Urine</label>
		<input type="text" name="urine" id="urine" required><br>

		<label for="drainage_volume">Drainage Volume</label>
		<input type="text" name="drainage_volume" id="drainage_volume" required><br>

		<label for="stools_volume_description">Stools Volume Description</label>
		<input type="text" name="stools_volume_description" id="stools_volume_description" required><br>

		<label for="total_intake">Total Intake</label>
		<input type="text" name="total_intake" id="total_intake" required><br>

		<label for="hour24_urine">Hour 24 Urine</label>
		<input type="text" name="hour24_urine" id="hour24_urine" required><br>

		<label for="total_output">Total Output</label>
		<input type="text" name="total_output" id="total_output" required><br>

		{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}

		<div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <h5>Intake Outputs</h5>
                <thead>
                    <tr>
                        <th>IVF</th>
                        <th>Volume Infused</th>
                        <th>Oral</th>
                        <th>Urine</th>
                        <th>Drainage Volume</th>
                        <th>Stools Volume Description</th>
                        <th>Total Intake</th>
                        <th>Hour 24 Urine</th>
                        <th>Total Output</th>
                    </tr>
                </thead>
            </table>
        </div>
        
	</div>
@endsection