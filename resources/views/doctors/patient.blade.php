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
<a href="{{ route('show.chart', $patient->id)}}" class="btn btn-primary">View Chart</a>

<div style="float: right; position: right;">
  <a href="{{ route('doctor')}}" class="btn btn-info">Home</a>
  <a href="javascript:history.back()" class="btn btn-danger" >Back</a>
</div>

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
</div>

 @push('scripts')
    <script>    
    $(function(){      
      $("#orderButton").click(function(){      
        $("#orderModal").modal({show:true});
      });      
    });
    </script> 
@endpush
@endsection 
