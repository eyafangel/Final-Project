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
				<table id="one">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Room Number</th>
						<th>Select</th>
					</tr>

					<tbody>
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
				<table id="two">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Room Number</th>
						<th>Select</th>
					</tr>
			</div>
		</div>	
	</div>

	<div style="float: right; position: right;">
		{!! Form::submit('Assign', ['class' => 'btn btn-info']) !!}
		<a href="javascript:history.back()" class="btn btn-primary" >Back</a>
	</div>

	{!! Form::close() !!}

	

@push('scripts')
	<script type="text/javascript">
		
		$.when($.ready).then(function() {
  			$('input:checkbox').on('change', function(e) {
    			if (this.checked) {
      				$('table#two tbody').append($(this).closest('tr'));
    			} else {
    				$('table#one tbody').append($(this).closest('tr'));
    			}
  			});
		});
	</script>
@endpush
@endsection
