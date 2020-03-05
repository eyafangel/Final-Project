@extends('layouts.app')

@section('content')

<div class="container">

	<div class="img-center">
		<img class="img-center img-responsive-home" src="{{ asset('/images/assistant.png') }}" />
	</div>

	<div class="doctor-home-margin welcome-nurse">
        <p class="welcome-font">WELCOME, NURSE</p>

        <div class="nurse-btn-margin">
			<a class="button button-default button-padding" href="{{ route('nurse.list')}}">Patient list</a>
			<a class="button button-default button-padding" href="{{route('scan')}}">Scan QR Code</a>
        </div>

    </div>

</div>

@endsection