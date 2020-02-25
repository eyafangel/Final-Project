@extends('layouts.app')

@section('content')
	
<div class="container-fluid">
	
	<a href="{{ route('nurse.list')}}">Patient list</a><br>
	<a href="{{route('scan')}}">Scan QR Code</a>

	<div>
		<h5>Doctor's Orders</h5>

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
		</table>
	</div>

	
</div>

@endsection