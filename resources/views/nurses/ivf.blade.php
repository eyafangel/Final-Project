@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">
    	{{-- {!! Form::open(['route' => 'store.ivf', 'class' => 'form-group']) !!}
        <div class="form-group">
            <label>IVF Volume</label>
            <input type="text" name="ivf_vol" id="ivf_vol" required><br>

            <label>Bottle Number:</label>
            <input type="text" name="bottle_number" id="bottle_number" required><br>

            <label>Medication:</label>
            <input type="text" name="medication" id="medication" required><br>

            <label>Regulation:</label>
            <input type="text" name="regulation" id="regulation" required><br>

            <label>Level:</label>
            <input type="text" name="level" id="level" required><br>

            <label>Time Started:</label>
            <input type="text" name="time_started" id="time_started" required><br>

            <label>Time Consumed:</label>
            <input type="text" name="time_consumed" id="time_consumed" required><br>

			<label>Notes</label>
            <input type="text" name="notes" id="notes" required><br>            
        </div>
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!} --}}

        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <h5>IVF</h5>
                <thead>
                    <tr>
                        <th>IVF Volume</th>
                        <th>Bottle Number</th>
                        <th>Medication</th>
                        <th>Regulation</th>
                        <th>Level</th>
                        <th>Time Started</th>
                        <th>Consumed</th>
                        <th>Notes</th>
                    </tr>
                </thead>
            </table>
        </div>

                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        ...
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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