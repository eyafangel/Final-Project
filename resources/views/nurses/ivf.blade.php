@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">

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
                        <th>Time Consumed</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ivfs as $ivf)
                        <tr>
                            <td>{{ $ivf->ivf_volume }}</td>
                            <td>{{ $ivf->bottle_number  }}</td>
                            <td>{{ $ivf->medication }}</td>
                            <td>{{ $ivf->regulation }}</td>
                            <td>{{ $ivf->level }}</td>
                            <td>{{ $ivf->time_started }}</td>
                            <td>{{ $ivf->time_consumed }}</td>
                            <td>{{ $ivf->notes }}</td>
                        </tr>
                    @empty
                        <tr colspan="8">No records to show.</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Input IVF Chart
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">IVF</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.ivf', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="ivf_volume">IVF Volume:</label>
                                <input type="text" name="ivf_volume" id="ivf_volume" required><br>
                            </div>
                        
                            <div class="form-group">
                                <label for="bottle_number">Bottle Number:</label>
                                <input type="text" name="bottle_number" id="bottle_number" required><br>
                            </div>

                            <div class="form-group">
                                <label for="medication">Medication:</label>
                                <input type="text" name="medication" id="medication" required><br>
                            </div>

                            <div class="form-group">
                                <label for="regulation">Regulation:</label>
                                <input type="text" name="regulation" id="regulation" required><br>
                            </div>

                            <div class="form-group">
                                <label for="level">Level:</label>
                                <input type="text" name="level" id="level" required><br>
                            </div>

                            <div class="form-group">
                                <label for="time_started">Time Started:</label>
                                <input type="time" name="time_started" id="time_started" required><br>
                            </div>

                            <div class="form-group">
                                <label for="time_consumed">Time Consumed:</label>
                                <input type="time" name="time_consumed" id="time_consumed" required><br>
                            </div>
                        
                            <div class="form-group">
                                <label for="notes">Notes:</label>
                                <input type="text" name="notes" id="notes"required><br>
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