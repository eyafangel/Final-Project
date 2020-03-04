@extends('layouts.app')

@section('content')    
<div class="container-fluid">              
    <div class="col-lg-12">
      <div class="table-responsive">   
        <div class ="search bar">
          {{-- insert search bar --}}
        </div>
        <div class="table-responsive">
          <table class="table">
              <h5>Orders for Patient</h5>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Order</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($orders as $order)
                 <tr>
                  <th>{{$order->orderDate}}</th>                                         
                  <th>{{$order->last_name}}</th>
                  <th>{{$order->first_name}}</th> 
                  <th>{{$order->message}}</th>
                  <th>{{$order->status}}</th>
                 </tr>   
                @empty
                <tr>
                  <tr colspan="9">No records to show.</tr>
                </tr>
                @endforelse
              </tbody>
            </table>
     </div>
  </div>
</div>
@endsection