@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <div id="content">

    <span class="slide">
        <a href="#" onclick="openSlideMenu()">
            <i class=""></i> 
        </a>
    </span>
    </div>

    <div class="card card-margin">
        <div class="card-header">
            <h1>List of patients</h1>
        </div>
        <div class="card-body">
            <table id="patlist" class="table">
                 <thead>
                     <tr>
                     <td>Last Name</td> 
                     <td>First Name</td> 
                     <td>Action</td>               
              
                     </tr>
                    </thead>

                 <tbody>
                     @forelse ($patients  as $patient)             
                     <tr>
                         <td>{{ $patient->last_name }}</td>
                         <td>{{ $patient->first_name }}</td>
                         <td><a href="{{ route('show.patient',  $patient->id)}}">View More</a></td>                     
                                                  
                     </tr>
                     @empty
                         <font color="darkviolet">There are no patients to show.</font>
                     @endforelse
                 </tbody>
            </table>
        </div>

        <a href="patient-add" class="btn btn-primary btn-lg">Add Patients to List</a>
        <div style="float: right; position: right;">
            <a href="javascript:history.back()" class="btn btn-danger" >Back</a>
        </div>
    </div>
    @endsection