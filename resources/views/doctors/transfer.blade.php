@extends('layouts.doctor')

@section('content')
@include('patients.profile')
@include('patients.chart')

    {!! Form::open(['route' => 'transfer.store', 'class' => 'form']) !!}

    {!! Form::label('receiver-of-records', 'Transfer to: ') !!}
    {!! Form::text('receiver-of-records', null, ['class' => 'form']) !!}

    {!! Form::submit('Transfer', ['class' => 'btn btn-info']) !!}
@endsection



