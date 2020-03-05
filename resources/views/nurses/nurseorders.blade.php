@extends('nurses.viewcharts')

@section('chart_content')

<div class="container-fluid">

    <div style="padding: 2%; border-radius: 12px; border: 1px solid teal;" class="card col-lg-12">
        <h5 class="card-title">Doctor's Orders</h5>
        <div class="table-responsive">
            <div class="table-bordered">
            <table class="table">
                
                <thead style="background-color: #4dc090; color: white;">
                    <tr>
                        <th>Date & Time</th>
                        <th>Order</th>
                        <th>Update</th>
                        <th>Status</th>  
                    </tr>
                </thead>

                <tbody>
                    @forelse($nurse_orders as $nurse_order)
                        <tr>
                            <td>{{ $nurse_order->orderDate }}</td>
                            <td>{{ $nurse_order->message }}</td>
                            <td><a href="{{ route('edit.orders', [$pat->id, $nurse_order->id]) }}" class="button-default button button-line">Update</a>
                            </td>
                            <td>
                                @if ($nurse_order->status === 'done')
                                    <span class="button-default-yellow btn-success">Done</span>
                                @else
                                    <span class="button-default-yellow btn-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr colspan="4">No records to show.</tr>
                    @endforelse                    
                </tbody>
            </table><br>
            </div>
            <a href="{{route('discharge.pat', $pat->id)}}" class="button button-default">Discharge Patient</a>
        </div>
        </div>
    </div>


@endsection