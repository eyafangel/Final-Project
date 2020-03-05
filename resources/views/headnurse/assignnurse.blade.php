  
@extends('layouts.app')

@section('content')

<div class="container">

	<div><h5 style="background:#4dc090; color: white; border-radius: 20px 0px 20px 0px; border: 1px solid #4dc090; padding: 10px 10px; margin-top: 25px; margin-left: 200px; margin-right: 200px; text-align: center; font-family: 'Martel Sans', sans-serif; font-size: 24px;">ASSIGN PATIENT</h5></div>

	{!! Form::open(['route' => 'store.assign', 'class' => 'form-group']) !!}

	<div class="form-group" style="padding: 10px">
		<div style="display:block; margin-left: 245px; margin-right: 245spx; position: absolute;">
			<select style="margin-right: 10px; padding: 12px 10px;" class="form-border" name="nurse">
				<option value = "">Choose a nurse</option>
				@foreach($nurses as $nurse)
					<option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
				@endforeach	
			</select>
			<label for="datea">Date:</label>
			<input style="margin-right: 10px;" class="form-border" type="date" name="datea">
			<label for="time">Time:</label>
			<input style="margin-right: 10px;" class="form-border" type="time" name="timea">
		</div>

		<div style="position: absolute; margin-left: 915px; margin-top: 100px;">
				<a> {!! Form::submit('Assign', ['class' => 'button button-default btn-info']) !!}</a>
				<a href="/headnurse" style="padding: 5px 20px;" class="button-default-red btn-danger" >Back</a>
		</div>
		
		<br><br><br><br><br>

		<div class="form-group">
			<h5 style="margin-left: 20px;">Patient List</h5>
			
			<div class="tab" style="float: left; padding: 20px; position: absolute;">
				<h6>Check checkbox to select patients.</h6>
				<div class="table table-bordered table-responsive">
				<table >
					<thead style="background-color: #4dc090; color: white;">
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
			</div>


			<div class="tab" style="float: right; padding: 20px">
				<h6>Selected patients</h6>
				<div class="table table-bordered table-responsive">
				<table >
					<thead style="background-color: #4dc090; color: white;">
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

</div>
@endpush
@endsection