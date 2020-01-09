@extends('layouts.doctor')

{!! Form::open(['route' => 'order.store', 'class' => 'form']) !!}

<div class="form-group">
    {!! Form::label('patient', 'Order for Patient') !!}
    {!! Form::text('patient', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('receiver', 'Receiver') !!}
    {!! Form::select('receiver', array('nurse_in_charge' => 'Nurse-in-Charge', 'head_nurse' => 'Head Nurse')) !!}
    {{-- {!! Form::text('receiver', null, ['class' => 'form-control']) !!} --}}
</div>

<div class="form-group">
    {!! Form::textarea('order', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}