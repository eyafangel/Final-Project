@extends('nurses.viewcharts')

@section('chart_content')

    
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <h5>RBS Monitoring</h5>
                <thead>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rbsModal">
            Input RBS Monitoring
        </button>

        <!-- Modal -->
        <div class="modal fade" id="rbseModal" tabindex="-1" role="dialog" aria-labelledby="rbsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rbsModalLabel">Input RBS Monitoring for Patient {{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}
</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.rbs', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="rbs_result">RBS Result:</label>
                                <input type="text" name="rbs_result" id="rbs_result" required><br>
                            </div>
                        
                            <div class="form-group">
                                <label for="nod">NOD:</label>
                                <input type="text" name="nod" id="nod" required><br>
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks:</label>
                                <input type="text" name="remarks" id="remarks" required><br>
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