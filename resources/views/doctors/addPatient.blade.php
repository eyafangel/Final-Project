@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'patient.store', 'class' => 'form-group']) !!}

<div class="container">

<div class="form-group">
    <h5 style="text-align: center; font-size: 32px; font-family: 'Martel Sans', sans-serif; margin-top: 20px;">Patient List</h5>
    
    <div class="tab" style="padding: 20px">
        <h6>Check checkbox to select patients.</h6>
        <table class="table table-bordered">
            <thead style="background-color: teal; color: white;">
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    
                    <th>Select</th>
                </tr>
            </thead>
            <tbody id="one">
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->last_name }}</td>
                        <td>{{ $patient->first_name }}</td>
                        <td>{{ $patient->middle_name }}</td>
                        
                        <td><input type="checkbox" id="pat" name="addedPatient" value="{{$patient->id}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="float: right; position: right;">

		{!! Form::submit('Add', ['class' => 'button button-default btn-info']) !!}
		<a href="store-patient" class="button-default-red btn-danger">Back </a>
	</div>

	{!! Form::close() !!}
    @endsection

</div>