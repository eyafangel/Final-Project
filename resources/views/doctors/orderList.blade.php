@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'order.showOrders', 'class' => 'form']) !!}

<div class="form-group">
    Order for Patient: {{$doctor_orders->patient_id}}
    Physician: {{$doctor_order->user_id}}  
    Chart ID: {{$doctor_order->admission_id}}  
</div>

<div class="form-group">
    @foreach($doctor_orders as $key => $data)
    <tr>    
      <th>{{$data->created_at}}</th>
      <th>{{$data->order}}</th>                    
    </tr>
@endforeach
</div>

{!! Form::close() !!}
@endsection