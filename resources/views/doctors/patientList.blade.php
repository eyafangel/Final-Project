@extends('layouts.app')

@section('content')   
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<head>
<script>
$(function(){
  $("#order").click(function(){
     var patient = $(this).data('id');
     $("p").html(patient);    
    $("#orderModal").modal("show");
  });
});
</script>
</head> 
    
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
                     <td>Middle Name</td>
                     <td>View Charts</td>
                     <td>Orders</td>                     
                     </tr>
                    </thead>

                 <tbody>
                     @forelse ($patients  as $patient)
                 <?php $modal=$patient->last_name ?>
                     <tr>
                         <td>{{ $patient->last_name }}</td>
                         <td>{{ $patient->first_name }}</td>
                         <td>{{ $patient->middle_name }}</td>                         
                         <td><a href="{{ route('order.show', $patient->id)}}" class="btn btn-primary">Chart</a></td>
                         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="order-{{$modal}}" data-id="{{$modal}}">
                            Order
                      </button></td>                          
                     </tr>
                     @empty
                         <font color="darkviolet">There are no patients to show.</font>
                     @endforelse
                 </tbody>
            </table>
        </div>

        <a href="add-patient" class="btn btn-primary btn-lg">Add Patients to List</a>
    </div>

    {{-- Order Modal --}}

<div id="orderModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create order for Patient  </h5>
                <span></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('order.store', $patient->id) }}">
                <div class="modal-body">     					
                        {{ csrf_field() }}
                        <div class="form-group">
                        <label for="messae">Message {{$patient->id}}</label>
                          <input type="text" name="message" id="message" required><br>
                        </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>       
          </div>
        </div>
</div>
      </html>

@endsection



