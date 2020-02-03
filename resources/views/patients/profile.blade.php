@extends('layouts.app')

@section('content')
<div>
	<div class = "profile"> 
    	{!! Form::label('name', 'Name: ') !!}
    	{{ $patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}}
	</div>
	<div class = "profile">
    	{!! Form::label('age', 'Age: ') !!}
    	{{ $patient->age}}  
	</div>
	<div class = "profile">
    	{!! Form::label('roomNum', 'Room number: ') !!}
    	{{ $admissions->room}} 
	</div>
</div>

@endsection
