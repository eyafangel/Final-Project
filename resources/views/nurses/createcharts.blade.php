@extends('layouts.app')

@section('content')
	<h1>Patient Chart</h1>

	<div>
		<div class="col-md-6">
            <select name="role" class="form-control" >
            <option value="vitalsign">Vital Sign Monitoring</option>
            <option value="rbs">RBS Monitoring</option>
            <option value="dengue">Dengue Monitoring </option>
            <option value="medication">Medication Record</option>
            <option value="intakeoutput">Intake and Output Record</option>
            <option value="intravenous">Intravenous Fluids Record</option>
            </select> 
        </div>
	</div>

@endsection