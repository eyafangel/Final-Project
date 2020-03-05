@extends('layouts.app')
@section('content')

<div class="container" style="padding: 20px">		

	<div class = "profile"> 
    	{!! Form::label('name', 'Patient Name: ') !!}
        <input type="text" name="patientName" id="patientName" value="{{ $patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}}">
        <input type="hidden" name="patientID" id="patientID" value="{{ $patient->id}}">
    </div>

    {{-- include diagnosis --}}

    <div class="col-md-4">
        <form action="/search-user/{{ $patient->id}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                {!! Form::label('user', 'Transfer to: ') !!}
                <input type="text" class="form-control" name="search" placeholder="Search doctors...">
                <span class="form-group-btn">
                    <button type="submit" class="btn btn-primary">
                        Search Doctor
                    </button>
                </span>
            </div>
        </form>
    </div>
    
    <table class="table table-bordered" id="myTable">
        
        <thead>
            <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Action</td>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>           
                <td><a href="{{ route('transfer.message', ['user' => $user->id, 'pat' => $patient->id]) }}" class="btn btn-sm btn-info">Select</a></td>
            </tr>
                @empty
            <tr>
                <tr colspan="5">No records to show.</tr>
            </tr>              
            @endforelse
        </tbody>
    </table>       
</div>
@endsection