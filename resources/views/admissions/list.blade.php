@extends('layouts.app')

@section('content')

 
<h1>List of Patients</h1>
<<<<<<< HEAD
 <div class="container-fluid">
 	{{-- <div class="form-group col-md-6">
 		<h5>Start Date<span class="text-danger"></span></h5>
 		<div class="controls">
 			<input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose">
 			<div class="help-block"></div>
 		</div>
 	</div>
 	<div class="form-group col-md-6">
 		<h5>End Date<span class="text-danger"></span></h5>
 		<div class="controls">
 			<input type="date" name="end_date" id="end_date"  class="form-control datepicker-autoclose">
 			<div class="help-block"></div>
 		</div>
 	</div>
 	<div class="text-left" style="margin-left: 15px;">
		<button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button> 		
 	</div> --}}
 	<div class="table-responsive">
 		<table id="patientlist" class="table" cellspacing="0" width="100%">
 			<thead>
 				<tr>
	 			<td>Last Name</td>
 				<td>First Name</td>
 				<td>Action</td>
 				</tr>
 			</thead>
 		
 			<tbody>
 				@foreach ($patients  as $patient)
		 		<tr>
 				<td>{{ $patient->last_name }}</td>
	 			<td>{{ $patient->first_name }}</td>
 				<td><a href="/profile" class="btn btn-primary">Profile</a></td>
 				</tr>
		 		@endforeach
 			</tbody>

 			<tfoot>
 				<tr>
	 			<td>Last Name</td>
 				<td>First Name</td>
 				<td>Action</td>
 				</tr>
 			</tfoot> 		
 		</table>
 	</div>	
=======
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
>>>>>>> a3aceda09ff64f81f8de1912d820b3d99cf24af8
 </div>
 
{{--  <script type="text/javascript">
 // 	$(document).ready(function() {
 //    var table = $('#patientlist').DataTable();
	// });
	// $(document).ready(function(){
	// 	$.ajaxSetup({
	// 		headers:{
	// 			'X-CSRF-TOKEN': $('META[name="csrf-token"]').attr('content')
	// 		}
	// 	})
	// });

	// $('#laravel_datatable').DataTable({
	// 	processing:true,
	// 	serverSide: true,
	// 	ajax: {
	// 		url: "{{ url('dtable-custom-patients')}}",
	// 		type: 'GET',
	// 		data: function(d){
	// 			d.start_date = $('#start_date').val();
	// 			d.end_date = $('#end_date').val();
	// 		}
	// 	},
		// columns: [
		// {data: 'id', name:'id', 'visible':false},
		// {data: 'title', name: 'title'},
		// {data: 'body', name: 'bo'}
		// ],
	// });

	// $('btnFiterSubmitSearch').click(function(){
	// 	$('#laravel_datatable').DataTable().draw(true);
	// });

 </script> --}}

@endsection