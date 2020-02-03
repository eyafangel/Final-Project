@extends('layouts.app')

@section('content')
	{{-- <h1>assign nurses to patient ug unsaon na nimo hahahahhuhuhuhu hilak na</h1> --}}
	<div class="form-group" style="padding: 10px">
		{!! Form::Label('item', 'Please choose a nurse...')!!}
		{!! Form::select('id', $nurse, null, ['class' => 'form-control'])!!}
		<br><br>

		<div class="form-group">
			<h5>Patient List</h5>
			<div class="card col-lg-4">
		@foreach($patients as $patient)
			<div class="checkbox">
				<label>
					{!! Form::checkbox("patients[]", $patient)!!}{{$patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}} {{$patient->room}}
				</label>
			</div>
		@endforeach
			</div>

			<div class="card col-lg-4">
				
			</div>
		</div>
	</div>
@endsection