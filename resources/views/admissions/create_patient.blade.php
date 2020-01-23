@extends('layouts.app')

@section('title')
	Create Patient
@endsection

<?php 
    $status=['new'=> 'New', 'old' => 'Old', 'returning' => 'Returning']; 
    
?>

@section('content')
{!! Form::open(['route' => 'create.patient', 'class' => 'form']) !!}

<div class="room-info">

    {!! Form::label('room', 'Room Number: ') !!}
    {!! Form::text('room', null, ['class' => 'room-info']) !!}

    {!! Form::label('category', 'Category: ') !!}
    {!! Form::text('category', null, ['class' => 'room-info']) !!}

    {!! Form::label('status', 'Status: ') !!}
    {!! Form::select('status', $status, ['class' => 'room-info']) !!}

    {!! Form::label('admission_date', 'Admission Date: ') !!}
    {!! Form::text('admission_date', date("y-m-d"), ['class' => 'room-info'], ['read-only']) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

    {!! Form::label('middle_name', 'Middle Name') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sex', 'Sex') !!}    
    {{!! Form::radio('sex', 'female' , true) !!}}
    {{!! Form::radio('sex', 'male' , false) !!}}

    {!! Form::label('birthday', 'Birthday') !!}
    {!! Form::date('birthday', date('D-m-y'), ['class' => 'form-control']) !!}

    {!! Form::label('contact_number', 'Contact Number') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('age', 'Age') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}

    {!! Form::label('marital_status', 'Marital Status') !!}
    {!! Form::text('marital_status', null, ['class' => 'form-control']) !!}

    {!! Form::label('nationality', 'Nationality') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>
<div class ="residence-form">
    Residence Form<br>
    {!! Form::label('lot', 'Lot') !!}
    {!! Form::text('lot', null, ['class' => 'form-control']) !!}

    {!! Form::label('street', 'Street') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}

    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}

</div>
<div class ="residence-form">
{!! Form::label('postal_code', 'Postal Code') !!}
    {!! Form::text('postal_code', null, ['class' => 'residence-form']) !!}

    {!! Form::label('province', 'Province') !!}
    {!! Form::text('province', null, ['class' => 'residence-form']) !!}

    {!! Form::label('country', 'Country') !!}
    {!! Form::text('country', null, ['class' => 'residence-form']) !!}
</div>
<div class ="guardian-form">
    Guardian Information<br>
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

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
@endsection