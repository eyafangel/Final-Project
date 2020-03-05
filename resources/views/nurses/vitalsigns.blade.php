@extends('nurses.viewcharts')

@section('chart_content')

    
    <div style="border: 1px solid teal; border-radius: 12px; padding: 3%;" class="card container-fluid">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered">
                <h5 class="card-title">Vital Signs</h5>
                <thead style="background-color: #4dc090; color: white;">
                    <tr>
                        <th>Date & Time</th>
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
                            <th>{{ $vital->created_at}}</th>
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
        <button type="button" style="margin-top: 20px;" class="button button-default btn-primary" data-toggle="modal" data-target="#vitalsModal">
            Input Vital Sign Chart 
        </button>

        <!-- Modal -->
        <div class="modal fade" id="vitalsModal" tabindex="-1" role="dialog" aria-labelledby="vitalsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div style="width: 400px;" class="modal-content">
                    <div style="color: white; background-color: teal;" class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Vital Signs for Patient <br> {{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.vitalsigns', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                        
                            <div style="width:300px; display:table;" class="form-group">
                                <label for="temperature">Temperature:</label>
                                <input style="display:table-cell; width:100%; border: 1px solid teal;" type="text" name="temperature" id="temperature" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="pulse_rate">Pulse Rate:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="pulse_rate" id="pulse_rate" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="respiratory_rate">Respiratory Rate:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="respiratory_rate" id="respiratory_rate" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="blood_pressure">Blood Pressure:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="blood_pressure" id="blood_pressure" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="o2_saturation">O2 Saturation:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="o2_saturation" id="o2_saturation" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="remarks">Remarks:</label>
                                <input style="display:table-cell; width:100%;s" type="textarea" name="remarks" id="remarks" required><br>
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="button-default-red btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="button-default button btn-primary">Save</button>
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