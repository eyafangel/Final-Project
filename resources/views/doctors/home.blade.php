@extends('layouts.app')

@section('content')

<div class="container">

    <div class="img-center">
        <img class="img-center img-responsive-home" src="{{ asset('/images/assistant.png') }}" />
    </div>

    <div class="doctor-home-margin">
        <p class="welcome-font">WELCOME, DOCTOR</p>

        <div>
            <a href="{{ route('list.show')}}" class="button-default button button-padding btn-primary">Patient List</a>
            <a href="{{ route('order.show')}}" class="button-default button button-padding btn-primary">Orders</a>
            <a href="{{ route('calendar')}}" class="button-default button button-padding btn-primary">Calendar</a>
        </div>

    </div>
</div>

@endsection
