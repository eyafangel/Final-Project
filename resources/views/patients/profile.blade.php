<div class="container" style="background-color: #34e8eb;">

@extends('layouts.app')

@section('content')


<div class="container img-center">
        <img style="float:center; position: absolute; margin-top: 100px;" class="img-responsive-home" src="{{ asset('/images/patient.png') }}" />
</div>

<div class="container" style="padding: 20px">	


<div style=" padding: 3%; margin-left: 200px; margin-right: 200px; border-radius:12px; border:1px solid orange; margin-top: 265px;">

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

    </div><br><br>

    <div class ="options" style="margin-left: 455px; margin-right: 200px;">
        <a href="createQR/{{$patient->id}}" class="button button-default btn-primary" style="padding: 10px 15px;">Print QR Code</a>       
    </div>

</div>

@endsection

</div>