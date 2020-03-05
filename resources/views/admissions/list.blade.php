@extends('layouts.app')

@section('content')

  <div class="container-fluid">

	<div class="col-md-4" style="float: right">
        <form action="{{ route('pat.search')}}" method="POST" role="search">
            {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search patients...">
      	            <span class="form-group-btn">
                        <button type="submit" class="button button-default">
                                Search
                        </button>
                    </span>
                </div>
        </form>
    </div>

    <h1 style="font-family: 'Martel Sans', sans-serif; text-align:center;">PATIENT LIST</h1>
 	<div class="table table-bordered table-responsive" style="1px solid black;">
 		<table id="pat" class="table">
 			<thead style="background:teal; color:white;">
 				<tr style="text-transform:uppercase;">
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
		 		{!! $patients->links() !!}
 			</tbody>

 		</table>
 		
	</div>
	<a href="javascript:history.back()" class="btn btn-danger" style="float: right;">Back</a>
</div>
@endsection