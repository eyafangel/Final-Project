@extends('layouts.app')

@section('content')

<div class="container" style="padding: 20px">		

	<div class = "profile"> 
    	{!! Form::label('name', 'Name: ') !!}
		{{ $patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}}
	</div>
	<div class = "profile">
    	{!! Form::label('age', 'Age: ') !!}
    	{{ $patient->age}}<br>

        {!! Form::label('sex', 'Sex: ') !!}
        {{ $patient->sex}}   
	</div>

	<div class = "profile">
    	{!! Form::label('roomNum', 'Room number: ') !!}
    	{{ $admission->room}} 
	</div>

<button id="orderButton" class="btn btn-primary" data-toggle="modal" data-target="#orderModal">Create Order</button>
<a href="{{ route('patient.transfer', $patient->id)}}" class="btn btn-primary">Transfer Patient</a>
<button id="chartButton" class="btn btn-primary" data-toggle="modal" data-target="#chartModal">View Charts</button>

 <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Order for Patient {{$patient->last_name }}, {{$patient->first_name }} -- {{$patient->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <form method="POST" action="{{ route('order.store', $patient->id) }}">
            <div class="modal-body">     					
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="message">Message</label>
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


<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transfer Patient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('transfer.store', $patient->id) }}">
            <div class="modal-body">     					
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="user">Patient</label>
                      <input type="text" name="patient" id="patient" value={{$patient->last_name }}, {{$patient->last_name }} -- {{$patient->id}}><br>                      
                    </div>
                  <div class="form-group">
                    <label for="user">To Doctor</label>
                    <input type="text" name="newUser" id="newUser" required><br>                      
                  </div>
            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Transfer</button>
            </div>
          </form>       
      </div>
    </div>
</div> 


{{-- <div class="modal fade" id="chartModal" tabindex="-1" role="dialog" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Chart </h5>
       
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('order.store', $patient->id) }}">
            <div class="modal-body">     					
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="user">Transfer to Doctor</label>
                    search bar for doctors 
                     </div>
            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Transfer</button>
            </div>
          </form>       
      </div>
    </div>
</div> --}}
</div>

 @push('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      	// $('#orderModal').on('shown.bs.modal', function () {
        //   $('#myInput').trigger('focus')
        // }),

        // $('#transferModal').on('shown.bs.modal', function () {
        //   $('#myInput').trigger('focus')
        // }),

        // $('#chartModal').on('shown.bs.modal', function () {
        //   $('#myInput').trigger('focus')
        // })

    
    $(function(){
      
      $("#orderButton").click(function(){
        //  var patient = $(this).data('id');
        //  $("p").html(patient);    
        $("#orderModal").modal({show:true});
      });

      $("#transferButton").click(function(){
        //  var patient = $(this).data('id');
        //  $("p").html(patient);    
        $("#transferModal").modal({show:true});
      });

      // $("#chartButton").click(function(){
      //   //  var patient = $(this).data('id');
      //   //  $("p").html(patient);    
      //   $("#chartModal").modal({show:true});
      // });
    });
    </script> 
@endpush
@endsection 
