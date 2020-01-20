@extends('layouts.doctor')

@section('profile')
@include('patients.profile')
@endsection

@section('content')
    <li><a href="chart/{{$patient->id}}">View Chart</a></li>
    <li><a href="order/{{$patient->id}}">Create Order</a></li>
    <li><a href="transfer/{{$patient->id}}">Transfer</a></li>
@endsection