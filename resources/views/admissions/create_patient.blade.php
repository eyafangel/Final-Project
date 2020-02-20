@extends('layouts.app')

@section('title')
	Create Patient
@endsection

<?php 
    $status=['new'=> 'New', 'old' => 'Old', 'returning' => 'Returning'];    
?>

@section('content')

{!! Form::open(['route' => 'store.patient', 'class' => 'form']) !!}

<div class="card" style="padding: 20px">
    <div class="card-title">
        <h1>Patient's Information</h1>

        {!! Form::label('admission_date', 'Admission Date: ') !!}
        {!! Form::text('admission_date', date("y-m-d"), ['class' => 'room-info'], ['read-only']) !!}
    </div>
    <div class ="room-info">
    {!! Form::label('room', 'Room number') !!}
    {!! Form::text('room', null, ['class' => 'room-info'], 'required') !!}

    {!! Form::label('category', 'Category') !!}
    {!! Form::text('category', null, ['class' => 'room-info'], 'required') !!}

    {!! Form::Label('status', 'Status') !!}
    {!! Form::select('status', $status, null, ['class' => 'room-info']) !!}<br>

    {!! Form::label('mode_of_arrival', 'Mode of Arrival: ') !!}
    {!! Form::checkbox('modeOfArrival', 'ambulance') !!}Ambulance
    {!! Form::checkbox('modeOfArrival', 'private_vehicle') !!}Private vehicle
    {!! Form::checkbox('modeOfArrival', 'others') !!}Others
    {!! Form::checkbox('modeOfArrival', 'ambulatory') !!}Ambulatory
    {!! Form::checkbox('modeOfArrival', 'wheelchair') !!}Wheelchair
    {!! Form::checkbox('modeOfArrival', 'stretcher') !!}Stretcher
    </div>

<div class="form-group">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control'], 'required') !!}

    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control'], 'required') !!}

    {!! Form::label('middle_name', 'Middle Name') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control'], 'required') !!}
</div>
<div class="form-group">
    {!! Form::label('sex', 'Sex') !!}    
    {!! Form::checkbox('sex', 'F' ) !!} Female
    {!! Form::checkbox('sex', 'M' ) !!} Male<br>

    {!! Form::label('birthday', 'Birthday') !!}
    {!! Form::date('birthday', date('Y-m-d'), ['class' => 'form-control']) !!}

    {!! Form::label('contact_number', 'Contact Number') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control'], 'required') !!}
</div>
<div class="form-group">
    {!! Form::label('age', 'Age') !!}
    {!! Form::text('age', null, ['class' => 'form-control'], 'required') !!}

    {!! Form::label('marital_status', 'Marital Status') !!}
    {!! Form::text('marital_status', null, ['class' => 'form-control'], 'required') !!}

    {!! Form::label('nationality', 'Nationality') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control'], 'required') !!}
</div>

<div class ="residence-form">
   <h5>Residence:</h5>
    {!! Form::label('lot', 'Lot') !!}
    {!! Form::text('lot', null, ['class' => 'form-control']) !!}

    {!! Form::label('street', 'Street') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}

    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control'], 'required') !!}
</div>

<div class ="residence-form"><br>
{!! Form::label('postal_code', 'Postal Code') !!}
    {!! Form::text('postal_code', null, ['class' => 'residence-form'], 'required') !!}

    {!! Form::label('province', 'Province') !!}
    {!! Form::text('province', null, ['class' => 'residence-form'], 'required') !!}

    {!! Form::label('country', 'Country') !!}
    {!! Form::text('country', null, ['class' => 'residence-form'], 'required') !!}
</div>

<div class ="guardian-form"><br><br>
    <h5>Guardian's Information</h5>
    {!! Form::label('guardian_last_name', 'Last Name') !!}
    {!! Form::text('guardian_last_name', null, ['class' => 'guardian-form']) !!}

    {!! Form::label('guardian_first_name', 'First Name') !!}
    {!! Form::text('guardian_first_name', null, ['class' => 'guardian-form']) !!}

    {!! Form::label('guardian_middle_name', 'Middle Name') !!}
    {!! Form::text('guardian_middle_name', null, ['class' => 'guardian-form']) !!}
</div>
<div class ="guardian-form">
    {!! Form::label('relationship_to_patient', 'Relationship to Patient') !!}
    {!! Form::text('relationship_to_patient', null, ['class' => 'guardian-form']) !!}

    {!! Form::label('guardian_contact_number', 'Contact Number') !!}
    {!! Form::text('guardian_contact_number', null, ['class' => 'guardian-form']) !!}
</div>

{{-- @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif --}}

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{{-- @if(session('message')) <div data-expires="5000"> {{session('message')}} </div> @endif --}}

{!! Form::close() !!}
@if(session('message')) <div data-expires="5000"> {{session('message')}} </div> @endif

@endsection