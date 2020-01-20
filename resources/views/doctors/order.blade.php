@extends('layouts.doctor')

{!! Form::open(['route' => 'order.storeOrder', 'class' => 'form']) !!}

<div class="form-group">
    Order for Patient: 
    {!! Form::label('patient_id', $patient->id) !!}  
</div>

<div class="form-group">
    {!! Form::label('receiver', 'Receiver') !!}    
    {!! Form::text('receiver', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('order', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}