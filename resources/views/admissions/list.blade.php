@extends('layouts.app')

@section('content')

 
<h1>List of Patients</h1>

 <div class="container-fluid">
 	<div class="table-responsive">
 		<table id="patientlist" class="table" cellspacing="0" width="100%">
 			<thead>
 				<tr>
	 			<td>Last Name</td>
 				<td>First Name</td>
 				<td>Middle Name</td>
 				<td>Action</td>
 				</tr>
 			</thead>

 			<tbody>
 				@foreach ($patients  as $patient)
		 		<tr>
 				<td>{{ $patient->last_name }}</td>
	 			<td>{{ $patient->first_name }}</td>
	 			<td>{{ $patient->middle_name }}</td>
 				<td><a href="/profile/{{$patient->id}}" class="btn btn-primary">Profile</a></td>
 				</tr>
		 		@endforeach
 			</tbody>
 		</table>
 		
{{-- @stop

@push('scripts')
<script>
    $( function () {
        $('#patientlist').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.patients')!!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' }
            ]
        });
    });
</script>
@endpush --}}
	</div>
</div>
@endsection