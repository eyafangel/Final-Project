@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                    
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Created at</td>
                            <td>Updated at</td>
                        </tr>
                        </thead>
                    </table>
@stop

@push('scripts')
<script>
    $( function () {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.users')!!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
            ],
            initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false,  true).draw();
                });
            });
        }
        });
    });
</script>
@endpush
                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

{{-- @endsection
 --}}