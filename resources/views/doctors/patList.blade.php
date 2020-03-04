@extends('layouts.app')
@section('content')
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
                     <td>More</td>                    
                     {{-- <td>View More</td> --}}
                     </tr>
                    </thead>

                 <tbody>
                     @forelse ($patients  as $patient)             
                     <tr>
                         <td>{{ $patient->last_name }}</td>
                         <td>{{ $patient->first_name }}</td>
                         <td><a href="{{ route('show.patient',  $patient->id)}}">View More</a></td>
                         {{-- <td>{{ $patient->middle_name }}</td>                         
                         <td><a href="{{ route('patient.show', $patient->id)}}" class="btn btn-primary">View More</a></td> --}}
                                                  
                     </tr>
                     @empty
                         <font color="darkviolet">There are no patients to show.</font>
                     @endforelse
                 </tbody>
            </table>
        </div>

        <a href="add-patient" class="btn btn-primary btn-lg">Add Patients to List</a>
    </div>
    @endsection