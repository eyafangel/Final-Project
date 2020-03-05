@extends('doctors.showChart')

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
@endsection