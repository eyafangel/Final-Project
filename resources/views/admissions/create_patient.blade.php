@extends('layouts.app')

@section('title')
	Create Patient
@endsection

<?php 
    $status=['new'=> 'New', 'old' => 'Old', 'returning' => 'Returning'];    
?>

@section('content')

<div class="container no-margin-admit">

{!! Form::open(['route' => 'store.patient', 'class' => 'form', 'required']) !!}

<div class="card card-admit column-card">

    <div class="card-title" style="text-align:center;">
        <h1 style="background:#4dc090; padding: 10px 10px; padding-top:1.5%; color:white; font-family: 'Martel Sans', sans-serif; border-radius:12px 12px 0px 0px; font-size: 28px;">PATIENT INFORMATION</h1>

        {!! Form::label('admission_date', 'Admission Date:', ['class' => 'move-admission']) !!}
        {!! Form::text('admission_date', date("y-m-d"), ['class' => 'no-border', 'room-info', 'read-only']) !!}
    </div><br>

    <div class ="room-info">
    {!! Form::label('room', 'Room number') !!}
    {!! Form::text('room', null, ['class' =>  'admission-mgn', 'room-info', 'required',]) !!}

    {!! Form::label('category', 'Category') !!}
    {!! Form::text('category', null, ['class' => 'admission-mgn', 'room-info', 'required', 'form-width']) !!}

    {!! Form::Label('status', 'Status') !!}
    {!! Form::select('status', $status, null, ['class' => 'room-info', 'placeholder'=>'Choose one', 'required']) !!}<br><br>

    {!! Form::label('mode_of_arrival', 'Mode of Arrival: ', ['class' => 'admission-mgn']) !!}
        
        {!! Form::checkbox('modeOfArrival', 'ambulance') !!}Ambulance
        {!! Form::checkbox('modeOfArrival', 'private_vehicle') !!}Private vehicle
        {!! Form::checkbox('modeOfArrival', 'ambulatory') !!}Ambulatory
        {!! Form::checkbox('modeOfArrival', 'wheelchair') !!}Wheelchair
        {!! Form::checkbox('modeOfArrival', 'stretcher') !!}Stretcher
        {!! Form::checkbox('modeOfArrival', 'others') !!}Others
        
    </div><br>

    <div class="form-group">
        {!! Form::label('last_name', 'Last Name') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('middle_name', 'Middle Name') !!}
        {!! Form::text('middle_name', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        <div>
        {!! Form::label('sex', 'Sex:') !!}    
        {!! Form::checkbox('sex', 'F' ) !!} Female
        {!! Form::checkbox('sex', 'M' ) !!} Male</div><br>

        {!! Form::label('birthday', 'Birthday') !!}
        {!! Form::date('birthday', date('Y-m-d'), ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('contact_number', 'Contact Number') !!}
        {!! Form::text('contact_number', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('age', 'Age') !!}
        {!! Form::text('age', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('marital_status', 'Marital Status') !!}
        {!! Form::text('marital_status', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('nationality', 'Nationality') !!}
        {!! Form::text('nationality', null, ['class' => 'form-control', 'required']) !!}
    </div><br><br>

    <div class ="residence-form">
    <h5>RESIDENCE:</h5>
        {!! Form::label('lot', 'Lot') !!}
        {!! Form::text('lot', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('street', 'Street') !!}
        {!! Form::text('street', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
    </div><br> 

    <div class ="residence-form">
    {!! Form::label('postal_code', 'Postal Code') !!}
        {!! Form::text('postal_code', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('province', 'Province') !!}
        {!! Form::text('province', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('country', 'Country') !!}
        {!! Form::text('country', null, ['class' => 'form-control', 'required']) !!}<br>
    </div>

    <div><br><br>
        <h5 style="background:#4dc090; padding: 10px 10px; padding-top:1.5%; color:white; font-family: 'Martel Sans', sans-serif; border-radius:12px 12px 0px 0px; font-size: 28px; text-align:center; margin-bottom: 30px;">GUARDIAN INFORMATION</h5>
        {!! Form::label('guardian_ last_name', 'Last Name') !!}
        {!! Form::text('guardian_last_name', null, ['class' => 'form-control', 'required']) !!}<br>

        {!! Form::label('guardian_first_name', 'First Name') !!}
        {!! Form::text('guardian_first_name', null, ['class' =>  'form-control', 'required']) !!}<br>

        {!! Form::label('guardian_middle_name', 'Middle Name') !!}
        {!! Form::text('guardian_middle_name', null, ['class' =>  'form-control', 'required']) !!}
    </div><br>

    <div class ="guardian-form">
        {!! Form::label('relationship_to_patient', 'Relationship to Patient') !!}
        {!! Form::text('relationship_to_patient', null, ['class' => 'admission-mgn', 'guardian-form', 'required']) !!}

        {!! Form::label('guardian_contact_number', 'Contact Number') !!}
        {!! Form::text('guardian_contact_number', null, ['class' => 'guardian-form', 'required']) !!}
    </div>

</div>



@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
    @endif
@endforeach
 


{!! Form::submit('Create', ['class' => 'button-admit-mgn button button-default btn btn-info']) !!}

{{-- @if(session('message')) <div data-expires="5000"> {{session('message')}} </div> @endif --}}

{!! Form::close() !!}
@if(session('message')) <div data-expires="5000"> {{session('message')}} </div> @endif

@endsection

</div>