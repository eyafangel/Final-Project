@extends('layouts.app')
@section('content')

<div class="container">

    <div id="content">

    <span class="slide">
        <a href="#" onclick="openSlideMenu()">
            <i class=""></i> 
        </a>
    </span>
    </div>

    <div style="border: 0;" class="card">
        <div class="card-title">
            <h1 style="text-align: center; margin-top: 30px;">PATIENT LIST</h1>
        </div>
        <div class="card-body">
            <table id="patlist"  class="table table-bordered" style="border: 1px solid teal; border-radius: 12px;">
                 <thead style="background-color: teal; color: white;">
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

        <div class="container">
            <a href="patient-add" style="text-align: center;" class="button button-default btn-lg">Add Patients to List</a>
            
                <a href="javascript:history.back()" style="padding: 5px 15px;" class="button-default-red btn-danger" >Back</a>
            
        </div>
    </div>
    @endsection