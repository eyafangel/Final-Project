@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">

        <div style="padding: 3%; border: 1px solid teal; border-radius: 12px;" class="card col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered">
                <h5 class="card-title">RBS Monitoring</h5>
                <thead style="background-color: #4dc090; color: white;">
                    <tr>
                        <th>Date & Time</th>
                        <th>RBS Result</th>
                        <th>NOD</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($rbs_monitoring as $rbs)
                        <tr>
                            <td>{{ $rbs->created_at }}</td>
                            <td>{{ $rbs->rbs_result }}</td>
                            <td>{{ $rbs->nod }}</td>
                            <td>{{ $rbs->remarks }}</td>
                        </tr>
                    @empty
                        <tr colspan="4">No records to show.</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

                <!-- Button trigger modal -->
        <button type="button" style="margin-top: 20px;" class="button button-default btn-primary" data-toggle="modal" data-target="#rbsModal">
            Input RBS Monitoring
        </button>

        <!-- Modal -->
        <div class="modal fade" id="rbsModal" tabindex="-1" role="dialog" aria-labelledby="rbsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div style="width: 400px;" class="modal-content">
                    <div style="color: white; background-color: teal;" class="modal-header">
                        <h5 class="modal-title" id="rbsModalLabel">Input RBS Monitoring for Patient {{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}
</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.rbs', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div style="width:300px; display:table;" class="form-group">
                                <label for="rbs_result">RBS Result:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="rbs_result" id="rbs_result" required><br>
                            </div>
                        
                            <div style="width:300px; display:table;" class="form-group">
                                <label for="nod">NOD:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="nod" id="nod" required><br>
                            </div>

                            <div style="width:300px; display:table;" class="form-group">
                                <label for="remarks">Remarks:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="remarks" id="remarks" required><br>
                            </div>          

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="button-default-red btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="button-default button  btn-primary">Save</button>
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