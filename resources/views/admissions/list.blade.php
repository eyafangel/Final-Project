@extends('layouts.admission')

@section('content')
{{-- @foreach ($patients as $patient)
<li> {{ $patient}}  </li>
@endforeach --}}
 
<h1>List of Patients</h1>
 <div class="pat">

@foreach ($patients as $patient)
 
<li>{{ $patient->last_name}}, {{$patient->first_name}} 
    <a href="/profile/{{$patient->id}}" class="btn btn-primary">More</a></li>

@endforeach
 </div>
 
{{-- <h1>Only Description Of Devices</h1>
 
@foreach ($patients as $patient)
 
<li> {{ $patient->first_name}}  </li>
 
@endforeach --}}
@endsection