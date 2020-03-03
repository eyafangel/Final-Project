@extends('layouts.app')

@section('content')    
<div class="container-fluid">              
    <div class="col-lg-12">
    <div class="table-responsive">
    <table class="table">     
                <h5>{{$pat}}</h5>
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
              {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
              <a href="{{ route('order.create', $pat)}}" class="btn btn-primary">Create Order</a>
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageModal">
                Create Order
            </button>              --}}
          </div>
      </form>
  </div>
</div>
</div>



@endsection