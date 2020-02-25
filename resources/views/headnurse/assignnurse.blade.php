@extends('layouts.app')

@section('content')

	{!! Form::open(['route' => 'store.assign', 'class' => 'form-group']) !!}

	<div class="form-group" style="padding: 10px">
		<select name="nurse">
			<option value = "">Choose a nurse</option>
			@foreach($nurses as $nurse)
				<option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
			@endforeach	
		</select>

		<br><br>

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
							<th>Room Number</th>
							<th>Select</th>
						</tr>
					</thead>
					<tbody id="one">
						@foreach($patients as $patient)
							<tr>
								<td>{{ $patient->last_name }}</td>
								<td>{{ $patient->first_name }}</td>
								<td>{{ $patient->middle_name }}</td>
								<td>{{ $patient->room }}</td>
								<td><input type="checkbox" id="pat" name="pat[]" value="{{$patient->id}}"></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="tab" style="float: left; padding: 20px">
				<h6>Selected patients</h6>
				<table >
					<thead>
						<tr>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Room Number</th>
							<th>Select</th>
						</tr>
					</thead>
					<tbody id="two">

					</tbody>
				</table>
			</div>
		</div>	
	</div>

	<div style="float: right; position: right;">
		{!! Form::submit('Assign', ['class' => 'btn btn-info']) !!}
		<a href="/headnurse" class="btn btn-danger" >Back</a>
	</div>

	{!! Form::close() !!}

	

@push('scripts')
	<script type="text/javascript">
		
		$.when($.ready).then(function() {
  			$('input[type=checkbox]').on('change', function(e) {
				e.preventDefault()
    			if (e.target.checked) {
					$('#two').append($(this).closest('tr'))
    			} else {
    				$('#one').append($(this).closest('tr'))
    			}
  			});
		});
	</script>
@endpush
@endsection
