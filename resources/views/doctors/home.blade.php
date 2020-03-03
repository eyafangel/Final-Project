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
                     <td>Order</td>
                     <td>View Charts</td>
                     {{-- <td>Status<td> --}}
                     </tr>
                    </thead>

                 <tbody>
                     @forelse ($patients  as $patient)
                 
                     <tr>
                         <td>{{ $patient->last_name }}</td>
                         <td>{{ $patient->first_name }}</td>
                         <td>{{ $patient->middle_name }}</td>
                         
                        <td><a href="{{ route('order.show', $patient->id)}}" class="btn btn-primary">Orders</a></td>
                        <td><a href="{{ route('show.chart', $patient->id)}}" class="btn btn-primary">Profile</a></td>
                         {{-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderModal" data-id={{$patient->last_name}}> --}} 
                            {{-- {{-- Orders
                        </button></td> --}}
                         {{-- <td><a href="{{ route('order.create', $patients->id)}}" class="btn btn-primary">Create Order</a></td> --}}
                         {{-- <td><a href="{{ route('order.create', $patients->id)}}" class="btn btn-primary">Create Order</a></td> --}}
                     </tr>
                     @empty
                         <font color="darkviolet">There are no patients to show.</font>
                     @endforelse
                 </tbody>
            </table>
        </div>

        <a href="add-patient" class="btn btn-primary btn-lg">Add Patients to List</a>
    </div>
</div>

    {{-- <li><a href="/list">Patient List</a></li> --}}


<!-- Modal -->
{{-- <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="currentPatient">Orders</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">     					
                    {{ csrf_field() }}
                    <input type="text" id="patient_name" value=""></label>                
                    
				<table >
					<thead>
						<tr>
							<th>Date</th>
							<th>Order</th>
							<th>Status</th>						
						</tr>
					</thead>
					<tbody>
                        @forelse($orders as $order)
                        
                        <tr>                            
                            <td>{{$order->orderDate->format('m-d h:i a')}}<br></td>
                            <td>{{$order->message}}<br></td>
                            <td>{{$order->status}}<br></td>                                                    
                       </tr>
                        @empty
                        
                            <tr colspan="9">No orders to show.</tr>
                       
                	@endforelse
                </tbody>                        
            </table>                    
                    
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageModal">
                Create Order
            </button>             
          </div>
      </form>
  </div>
</div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <form method="POST" action="{{ route('order.store') }}">
              <div class="modal-body">     					
                      {{ csrf_field() }}  
                      <div class="form-group">                          
                        <input type="text" name="message" id="message" required><br>
                        <input type="hidden" name="patid" id="patid" value={{$patient->id}}>
                      </div>                
                      
              <div class="modal-footer">               
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
  
  </div>


@push('scripts')
<script type="text/javascript">

$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})

$(function () {
        $("orderModal").click(function () {
            var lastname = $(this).data('id');
     $(".modal-body #patient_name").val( lastname );
     $("#orderModal").modal("show");
        })
    });


</script>
@endpush --}}
@endsection
