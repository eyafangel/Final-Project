@extends('layouts.app')

@section('content')    
    
<div class="container-fluid">
    {{-- <h5>Hi nurse!</h5> --}}
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
                     <td>Status<td>
                     </tr>
                 </thead>

                 <tbody>
                     @forelse ($doctor->patient  as $patients)
                 
                     <tr>
                         <td>{{ $patients->last_name }}</td>
                         <td>{{ $patients->first_name }}</td>
                         <td>{{ $patients->middle_name }}</td>
                         <td><a href="{{ route('order.create', $patients->id)}}" class="btn btn-primary">Create Order</a></td>
                         <td><a href="{{ route('order.create', $patients->id)}}" class="btn btn-primary">Create Order</a></td>
                     </tr>

                     @empty
                         <font color="darkviolet">There are no patients to show.</font>
                     @endforelse
                 </tbody>
            </table>
        </div>
    </div>
</div>

    {{-- <li><a href="/list">Patient List</a></li> --}}

@endsection