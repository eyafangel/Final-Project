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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($nurse_orders as $nurse_order)
                        <tr>
                            <td>{{ $nurse_order->created_at }}</td>
                            <td>{{ $nurse_order->order  }}</td>
                            <td>{{ $nurse_order->status }}</td>
                            <td><!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Change status
                                </button> 
                            </td>
                        </tr>
                    @empty
                        <tr colspan="4">No records to show.</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.orders', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{-- <label for="order">Order:</label>
                                <input type="text" name="order" id="order" value="{{ $pat->id }}" readonly> --}}
                                <label for="status">Status:</label>
                                <select id="status">
                                    <option value="done">Done</option>
                                </select>  
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

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