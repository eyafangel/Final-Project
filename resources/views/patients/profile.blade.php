@extends('layouts.doctor')

@section('content')
<div class = "profile"> 
    {!! Form::label('name', 'Profile: ') !!}}
    {{ $patient->id }}

    {!! Form::label('name', 'Name: ') !!}}
    {{ $patient->last_name}}, {{$patient->first_name}}, {{$patient->middle_name}}
</div>
<div class = "profile">
    {!! Form::label('name', 'Age: ') !!}}
    {{ $patient->last_name}}, {{$patient->first_name}}, {{$patient->middle_name}}
    
</div>
@endsection
