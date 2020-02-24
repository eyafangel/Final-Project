@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'order.storeOrder', 'class' => 'form']) !!}

<div class="form-group">
    Order for Patient: 
    {!! Form::label('patient_id', $patient->id) !!}  
</div>

<div class="form-group">
    {!! Form::label('date_time', 'Date/Time') !!}  
    {!! Form::label('date_time', $order->created_at) !!}      

    {!! Form::label('order', 'Physician Order') !!}  
    {!! Form::textarea('order', null, ['class' => 'form-control']) !!}
</div>

    <button type="button" href="{{ route('order.store') }}">Create</button>
{{-- {!! Form::submit('Create', ['class' => 'btn btn-info']) !!} --}}

{!! Form::close() !!}
@endsection