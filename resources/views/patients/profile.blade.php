@extends('layouts.doctor')

@section('content')
<div class = "profile">
 
    {!! Form::label('name', 'name') !!}
    {{ $patient->last_name}}, {{$patient->first_name}}
</div>
@endsection
