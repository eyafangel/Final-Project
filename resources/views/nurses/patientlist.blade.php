@extends('layouts.app')

@section('content')

	<div class="container-fluid">	
		<div style="border: none;" class="card">
			<div style="margin-top: 20px;" class="card-title">
				<h1 style="text-align: center; text-transform: uppercase; margin-top: 10px; margin-bottom: 10px;">List of patients</h1>
			</div>
			<div style="margin-left: 50px; margin-right: 50px;" class="table-bordered">
				<table id="patlist" class="table">
	 				<thead style="background-color: teal; color: white;">
 						<tr>
	 					<th>Last Name</th>
 						<th>First Name</th>
 						<th>Middle Name</th>
 						<th>Action</th>
		 				</tr>
 					</thead>

	 				<tbody>
 						@forelse ($patients  as $pat)
 					
				 		<tr>
 							<td>{{ $pat->last_name }}</td>
	 						<td>{{ $pat->first_name }}</td>
	 						<td>{{ $pat->middle_name }}</td>
 							<td><a href="{{ route('showChart', $pat->id)}}" class="button button-default btn-info">Profile</a></td>
		 				</tr>

		 				@empty
	 						<font color="darkviolet">There are no patients to show.</font>
		 				@endforelse
 					</tbody>
				</table>
			</div>
		</div><br>
		
		
			<div style="margin-right: 50px; float: right; position: right;">
                <a href="javascript:history.back()" style="padding: 10px 15px;" class="button-default-red btn-danger" >Back</a>
            </div>


	</div>
@endsection