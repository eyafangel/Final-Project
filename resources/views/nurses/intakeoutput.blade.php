@extends('nurses.viewcharts')

@section('chart_content')

	<div class="container-fluid">

		<div style="border: 1px solid teal; padding: 3%; border-radius: 12px;" class="card col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered">
                <h5 class="card-title">Intake Outputs</h5>
                <thead style="background-color: #4dc090; color: white;">
                    <tr>
                        <th>IVF</th>
                        <th>Volume Infused</th>
                        <th>Oral</th>
                        <th>Urine</th>
                        <th>Drainage Volume</th>
                        <th>Stools Volume Description</th>
                        <th>Total Intake</th>
                        <th>Hour 24 Urine</th>
                        <th>Total Output</th>
                    </tr>
                </thead>

                <tbody>
                	@forelse($intake_outputs as $intake_output)
                		<tr>
                			<th>{{ $intake_output->ivf }}</th>
                			<th>{{ $intake_output->volume_infused }}</th>
                			<th>{{ $intake_output->oral }}</th>
                			<th>{{ $intake_output->urine }}</th>
                			<th>{{ $intake_output->drainage_volume }}</th>
                			<th>{{ $intake_output->stools_volume_description }}</th>
                			<th>{{ $intake_output->total_intake }}</th>
                			<th>{{ $intake_output->hour24_urine }}</th>
                			<th>{{ $intake_output->total_output }}</th>
                		</tr>
                	@empty
                		<tr>
                            <tr colspan="9">No records to show.</tr>
                        </tr>
                	@endforelse
                </tbody>
            </table>
        </div>

        		<!-- Button trigger modal -->
		<button type="button" style="margin-top: 20px;" class="button button-default btn-primary" data-toggle="modal" data-target="#intakeoutputModal">
  			Input Intake Output Chart
		</button>

		<!-- Modal -->
		<div class="modal fade" id="intakeoutputModal" tabindex="-1" role="dialog" aria-labelledby="intakeoutputModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    			<div style="width: 400px;" class="modal-content">
  		    		<div style="background-color: teal; color: white;" class="modal-header">
        				<h5 class="modal-title" id="intakeoutputModalLabel">Input Intake Output for Patient <br> {{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>

      				<form method="POST" action="{{ route('store.intakeoutput', $pat->id) }}" style="padding: 3%;">
      				<div  class="modal-body">     					
      						{{ csrf_field() }}
        						<div style="width:300px; display:table;" class="form-group">
        							<label for="ivf">IVF: </label><br>
          						<input type="text" style="display:table-cell; width:100%;" name="ivf" id="ivf" required><br>
        						</div>
          				
        						<div style="width:300px; display:table;" class="form-group">
        							<label for="volume_infused">Volume Infused:</label><br>
          						<input type="text" style="display:table-cell; width:100%;" name="volume_infused" id="volume_infused" required><br>
        						</div>

        						<div style="width:300px; display:table;" class="form-group">
        							<label for="oral">Oral:</label><br>
          						<input type="text" style="display:table-cell; width:100%;" name="oral" id="oral" required><br>
        						</div>

        						<div style="width:300px; display:table;" class="form-group">
        							<label for="urine">Urine:</label><br>
          						<input style="display:table-cell; width:100%;" type="text" name="urine" id="urine" required><br>
        						</div>

        						<div style="width:300px; display:table;" class="form-group">
        							<label for="drainage_volume">Drainage Volume:</label><br>
          						<input style="display:table-cell; width:100%;" type="text" name="drainage_volume" id="drainage_volume" required><br>
        						</div>

        						<div style="width:300px; display:table;" class="form-group">
        							<label for="stools_volume_description">Stools Volume Description:</label>
          						<input style="display:table-cell; width:100%;" type="text" name="stools_volume_description" id="stools_volume_description" required><br>
        						</div>

        						<div style="width:300px; display:table;" class="form-group">
        							<label for="total_intake">Total Intake:</label>
          						<input style="display:table-cell; width:100%;" type="text" name="total_intake" id="total_intake" required><br>
        						</div>
          				
        						<div style="width:300px; display:table;" class="form-group">
        							<label for="hour24_urine">Hour 24 Urine:</label>
          						<input style="display:table-cell; width:100%;" type="text" name="hour24_urine" id="hour24_urine"required><br>
        						</div> 				
          					
          					<div style="width:300px; display:table;" class="form-group">
          						<label for="total_output">Total Output:</label>
          						<input style="display:table-cell; width:100%;" type="text" name="total_output" id="total_output" required><br>
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

@push('scripts')
<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endpush
@endsection