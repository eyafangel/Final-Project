@extends('doctors.showChart')

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
@endsection