@extends('nurses.viewcharts')

@section('chart_content')

<div class="container-fluid">

    <div style="padding: 3%; border-radius: 12px; border: 1px solid teal;" class="col-lg-12 card">
        <div class="table-responsive">
            <table class="table table-bordered">
                <h5 class="card-title">Nurses' Notes</h5>
                <thead style="background-color: #4dc090; color: white;">
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
        <button type="button" style="margin-top: 20px;" class="button button-default btn-primary" data-toggle="modal" data-target="#exampleModal">
            Input Nurse's Notes
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div style="width: 400px;" class="modal-content">
                    <div style="color: white; background-color: teal;" class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nurse's Note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('store.nursesnotes', $pat->id) }}">
                    <div class="modal-body">                        
                            {{ csrf_field() }}
                            <div style="width:300px; display:table;" class="form-group">
                                <label for="focus">Focus:</label>
                                <input style="display:table-cell; width:100%;" type="text" name="focus" id="focus" required><br>
                            </div>
                        
                            <div style="width:300px; display:table;" class="form-group">
                                <label for="notes">Notes:</label>
                                <input style="display:table-cell; width:100%;" type="textarea" name="notes" id="notes" required><br>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="button-default-red btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="button button-default btn-primary">Save</button>
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