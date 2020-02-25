@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px">		

	<div class = "profile"> 
    	{!! Form::label('name', 'Name: ') !!}
		{{ $patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}}
	</div>
	<div class = "profile">
    	{!! Form::label('age', 'Age: ') !!}
    	{{ $patient->age}}<br>

        {!! Form::label('sex', 'Sex: ') !!}
        {{ $patient->sex}}   
	</div>

	<div class = "profile">
    	{!! Form::label('roomNum', 'Room number: ') !!}
    	{{ $admissions->room}} 
	</div>

	<div class = "profile">
    	{!! Form::label('res', 'Address: ') !!}
    	{{ $residence->street}}, 
    	{{ $residence->city}}, 
    	{{ $residence->postal_code}}, 
    	{{ $residence->province}}, 
    	{{ $residence->country}} 
	</div>

	<div class ="options">
		<a href="createQR/{{$patient->id}}" class="btn btn-primary">Print QR Code</a>		
	</div>
</div>

@endsection
