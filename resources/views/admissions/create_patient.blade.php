@extends('layouts.admissions')

@section('title')
	Create Patient
@endsection

@section('content')
{!! Form::open(['route' => 'create.patient', 'class' => 'form']) !!}

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
    {!! Form::radio('sex', 'Female', ['class' => 'form-control']) !!}   
    {!! Form::radio('sex', 'Male', ['class' => 'form-control']) !!}

    {!! Form::label('birthday', 'Birthday') !!}
    {!! Form::text('patient', null, ['class' => 'form-control']) !!}

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

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
@endsection