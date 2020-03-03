@extends('layouts.app')

@section('content')
	
<div class="container-fluid">
	
	<a href="{{ route('nurse.list')}}">Patient list</a><br>
	<a href="{{route('scan')}}">Scan QR Code</a>

	<div>

	<div class="container-fluid">
		
		
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
	<div>

		{{-- <h5>Doctor's Orders</h5>

		<table class="table">
			<thead>
				<tr>
					<th colspan="3"> Patient</th>
					<th>Order</th>
					<th>Status</th>
				</tr>
			</thead>
				@forelse($orders as $order)
					<tr>
						<td>{{ $order->last_name }}, </td>
						<td>{{ $order->first_name }} </td>
						<td>{{ $order->middle_name }} </td>
						<td>{{ $order->order }} </td>
						<td><input type="text" name="status"></td>
					</tr>
				@empty
				<p>No data to show.</p>
				@endforelse
			<tbody>
				
			</tbody>
		</table> --}}

	</div>
	</div>

	
</div>

@endsection