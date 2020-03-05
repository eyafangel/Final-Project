@extends('layouts.app')

{{-- @section('title', 'Home') --}}

@section('content')

<div class="container">

	<div class="img-center">
		<img class="img-center img-responsive-home" src="{{ asset('/images/assistant.png') }}" />
	</div>

	<div class="doctor-home-margin welcome-nurse admit-margin">
        <p class="welcome-font">WELCOME TO ADMISSIONS</p>

        <div class="nurse-btn-margin admit-btn">
            <a href="/create" class="button button-default btn-primary btn-lg">Create Patient</a>
            <a href="/patientlist" class="button button-default btn-primary btn-lg">Patient List</a>
        </div>

    </div>
</div>
  

@endsection