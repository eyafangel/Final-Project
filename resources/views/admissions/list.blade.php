@extends('layouts.app')

@section('content')

  <div class="container-fluid">
	<h1>List of Patients</h1>

 	<div class="table-responsive">
 		<table id="pat" class="table" cellspacing="0" width="100%">
 			<thead>
 				<tr>
	 			<td>Last Name</td>
 				<td>First Name</td>
 				<td>Middle Name</td>
 				<td>Action</td>
 				</tr>
 			</thead>

 			<tbody>
 				@forelse ($patients  as $patient)
		 		<tr>
 				<td>{{ $patient->last_name }}</td>
	 			<td>{{ $patient->first_name }}</td>
	 			<td>{{ $patient->middle_name }}</td>
 				<td><a href="/profile/{{$patient->id}}" class="btn btn-primary">Profile</a></td>
 				</tr>
 				@empty
 				<p style="color: darkviolet;">No patients to show.</p>
		 		@endforelse
 			</tbody>
 		</table>
	</div>
	<a href="javascript:history.back()" class="btn btn-danger">Back</a>
</div>
@endsection