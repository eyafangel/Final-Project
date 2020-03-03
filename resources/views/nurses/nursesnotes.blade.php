@extends('nurses.viewcharts')

@section('chart_content')

<div class="container-fluid">

    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table">
                <h5>Nurses' Notes</h5>
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Focus</th>
                        <th>Notes/Remarks<br>
                        	D=Data, A=Action, R=Remarks
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($nurse_notes as $nurse_note)
                        <tr>
                            <td>{{ $nurse_note->created_at }}</td>
                            <td>{{ $nurse_note->focus  }}</td>
                            <td>{{ $nurse_note->notes }}</td>
                        </tr>
                    @empty
                        <tr colspan="8">No records to show.</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Input Nurses' Notes
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

                    <form method="POST" action="{{ route('store.nursesnotes', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="focus">Focus:</label>
                                <input type="text" name="focus" id="focus" required><br>
                            </div>
                        
                            <div class="form-group">
                                <label for="notes">Notes:</label>
                                <input type="textarea" name="notes" id="notes" required><br>
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