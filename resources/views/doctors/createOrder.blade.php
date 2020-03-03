@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="col-md-6">
          <div class="container">
            <form method="POST" action="{{ route('store.intakeoutput') }}">      			   
            <h5>Create Order for Patient {{$patient->last_name}}, {{$patient->first_name}}</h5>
              <label>Name: </label>
              <strong>{{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}</strong>
              <label>Age:</label>
              <strong>{{ $pat->age }}</strong>
              <label>Sex:</label>
              <strong>{{ $pat->sex }}</strong><br>
              <label>Attending Physician:</label>
              <strong>         </strong>
              <label>Room:</label>
              <strong>{{ $admissions->room }}</strong><br>
          </div>

@endsection