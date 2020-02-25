@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<h5>Hi nurse!</h5>
		<div class="col-lg-12 col-md-6 col-sm-4">
			<a href="{{route('scan')}}">Scan QR Code</a>
		</div>
		<div class="card">
			<div class="card-header">
				<h1>List of patients</h1>
			</div>
			<div class="card-body">
				<table id="patlist" class="table">
	 				<thead>
 						<tr>
	 					<td>Last Name</td>
 						<td>First Name</td>
 						<td>Middle Name</td>
 						<td>Doctor's Order</td>
 						<td>Action</td>
		 				</tr>
 					</thead>

	 				<tbody>
 						@forelse ($nurse->patient  as $patients)
 					
				 		<tr>
 							<td>{{ $patients->last_name }}</td>
	 						<td>{{ $patients->first_name }}</td>
	 						<td>{{ $patients->middle_name }}</td>
 							<td><a href="{{ route('show.chart', $patients->id)}}" class="btn btn-primary">Profile</a></td>
		 				</tr>

		 				@empty
	 						<font color="darkviolet">There are no patients to show.</font>
		 				@endforelse
 					</tbody>
				</table>
				
			</div>
		</div>
	</div>

@endsection