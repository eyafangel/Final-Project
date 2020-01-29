@extends('layouts.app')

@section('content')
{{-- @foreach ($patients as $patient)
<li> {{ $patient}}  </li>
@endforeach --}}
 
<h1>List of Patients</h1>
 <div class="pat">
 	<table>
 		<tr>
 			<td>Last Name</td>
 			<td>First Name</td>
 			<td>Action</td>
 		</tr>
 		@foreach ($patients as $patient)
 		<tr>
 			<td>{{ $patient->last_name }}</td>
 			<td>{{ $patient->first_name }}</td>
 			<td><a href="/profile" class="btn btn-primary">Profile</a></td>
 		</tr>
 		@endforeach


 	</table>


 
{{-- <li>, {{$patient->first_name}} 
    <a href="/profile/{{$patient->id}}" class="btn btn-primary">Button</a></li> --}}
{{-- 
@endforeach --}}
 </div>
 
{{-- <h1>Only Description Of Devices</h1>
 
@foreach ($patients as $patient)
 
<li> {{ $patient->first_name}}  </li>
 
@endforeach --}}
@endsection