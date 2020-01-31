@extends('layouts.app')

@section('content')
	<h1>Create charts for patient. lol</h1>

	<div>
		<div class="col-md-6">
            <select name="role" class="form-control" >
            <option value="">Doctor</option>
            <option value="admission">Admission</option>
            <option value="nurse">Nurse</option>
            <option value="headNurse">Head Nurse</option>
            <option value="medRecords">Medical Records</option>
            </select> 
        </div>
	</div>

@endsection