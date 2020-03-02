@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <h5>Vital Signs</h5>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Temperature</th>
                        <th>Pulse Rate</th>
                        <th>Respiratory Rate</th>
                        <th>Blood Pressure</th>
                        <th>O2 Saturation</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($vitals as $vital)
                        <tr>
                            <th>{{ $vital->created_at->toDateString() }}</th>
                            <th>{{ $vital->temperature }}</th>
                            <th>{{ $vital->pulse_rate }}</th>
                            <th>{{ $vital->respiratory_rate }}</th>
                            <th>{{ $vital->blood_pressure }}</th>
                            <th>{{ $vital->o2_saturation }}</th>
                            <th>{{ $vital->remarks }}</th>
                        </tr>
                    @empty
                        <tr colspan="6">No records to show.</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Input Vital Sign Chart
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vital Signs</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.vitalsigns', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                        
                            <div class="form-group">
                                <label for="temperature">Temperature:</label>
                                <input type="text" name="temperature" id="temperature" required><br>
                            </div>

                            <div class="form-group">
                                <label for="pulse_rate">Pulse Rate:</label>
                                <input type="text" name="pulse_rate" id="pulse_rate" required><br>
                            </div>

                            <div class="form-group">
                                <label for="respiratory_rate">Respiratory Rate:</label>
                                <input type="text" name="respiratory_rate" id="respiratory_rate" required><br>
                            </div>

                            <div class="form-group">
                                <label for="blood_pressure">Blood Pressure:</label>
                                <input type="text" name="blood_pressure" id="blood_pressure" required><br>
                            </div>

                            <div class="form-group">
                                <label for="o2_saturation">O2 Saturation:</label>
                                <input type="text" name="o2_saturation" id="o2_saturation" required><br>
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks:</label>
                                <input type="textarea" name="remarks" id="remarks" required><br>
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
});
</script>
@endpush
    
@endsection