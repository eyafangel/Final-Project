@extends('layouts.app')

@section('content')
@include('patients.profile')
@include('patients.chart')

<h1>List of Patients</h1>
<div class="pat">    

@foreach ($patients as $patient)
)
<li>{{ $patient->last_name}}, {{$patient->first_name}} 
   <a href="/profile/{{$patient->id}}" class="btn btn-primary">Button</a></li>

@endforeach
</div>
@endsection



