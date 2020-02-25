{!! Form::open(['route' => 'patient.store', 'class' => 'form-group']) !!}

<div class="form-group">
    <h5>Patient List</h5>
    
    <div class="tab" style="float: left; padding: 20px">
        <h6>Check checkbox to select patients.</h6>
        <table >
            <thead>
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

		{!! Form::submit('Add', ['class' => 'btn btn-info']) !!}
		<a href="store-patient" class="btn btn-danger">Back</a>
	</div>

	{!! Form::close() !!}