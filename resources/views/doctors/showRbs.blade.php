@extends('doctors.showChart')

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
@endsection