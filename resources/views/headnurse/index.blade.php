@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<h2 class="headnurse-heading">WELCOME, Head Nurse {{ $user->name }}!</h2>
	<div class="button-hn-padding">
		<a href="/assign" class="button button-default btn-primary">Assign Nurse to Patient</a>
	</div>
	
	<table class="table">
		<thead>
			<tr>
				<th>Date</th>
				<th>Time</th>
				<th>Nurse</th>
				<th>Patient</th>
			</tr>
		</thead>
		<tbody>
			@forelse($assigned as $assign)
			<tr>
				<td>{{ $assign->date }}</td>
				<td>{{ $assign->time }}</td>
				<td>{{ $assign->name }}</td>
				<td>{{ $assign->last_name}}, {{$assign->first_name}}, {{ $assign->middle_name }}</td>
			@empty
				<td colspan="4">No records to show.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
	
@endsection