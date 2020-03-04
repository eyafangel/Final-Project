@extends('doctors.showChart')

@section('chart_content')

	<div class="container-fluid">

		<div class="col-lg-12">
            <div class="table-responsive">
            <table class="table">
                <h5>Intake Outputs</h5>
                <thead>
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
@endsection