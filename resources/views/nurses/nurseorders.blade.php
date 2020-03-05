@extends('nurses.viewcharts')

@section('chart_content')

<div class="container-fluid">

    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table">
                <h5>Doctor's Orders</h5>
                <thead>
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
                            <td>{{ $nurse_order->message  }}</td>
                            <td><a href="{{ route('edit.orders', [$pat->id, $nurse_order->id]) }}" class="button-default button button-line">Update</a>
                            </td>
                            <td>
                                @if ($nurse_order->status === 'done')
                                    <span class="btn btn-success">Done</span>
                                @else
                                    <span class="btn btn-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr colspan="4">No records to show.</tr>
                    @endforelse

                    
                </tbody>
            </table>
        </div>

        </div>
    </div>


@endsection