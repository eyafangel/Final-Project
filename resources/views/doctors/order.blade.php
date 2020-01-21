@extends('layouts.doctor')

{!! Form::open(['route' => 'order.storeOrder', 'class' => 'form']) !!}

<div class="form-group">
    Order for Patient: 
    {!! Form::label('patient_id', $patient->id) !!}  
</div>

<div class="form-group">
    {!! Form::label('date_time', 'Date/Time') !!}  
    {!! Form::label('date_time', $order->created_at) !!}  

    {!! Form::label('progress_notes', 'Progress Notes') !!}  
    {!! Form::textarea('progress_notes', null, ['class' => 'form-control']) !!}

    {!! Form::label('order', 'Physician Order') !!}  
    {!! Form::textarea('order', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}