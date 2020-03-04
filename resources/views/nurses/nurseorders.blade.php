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
                            <td>{{ $nurse_order->created_at }}</td>
                            <td>{{ $nurse_order->order  }}</td>
                            <td>
                                <a href="{{route('update.orders',$pat->id)}}"> <span class="mj_btn  btn btn-info">Update</span>
                                </a>
                            </td>
                            <td>
                                
                                @if ($nurse_order->status === 'done')
                                    <span class="mj_btn btn btn-success">Done</span>
                                @else
                                    <span class="mj_btn btn btn-warning">Pending</span>
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

@push('scripts')
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endpush


@endsection