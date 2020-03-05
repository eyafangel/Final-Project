@extends('layouts.app')

@section('content')

<div class="container">


	<div class="container-fluid">
		<div class="col-md-6">
            <div style="border-radius: 12px; padding: 3%; margin:0; padding-bottom: 0; border: 1px solid teal; margin-top: 10px;" class="card container">
                <div style="border-radius: 12px 12px 0px 0px; border: 1px solid #4dc090; background-color: #4dc090; color: white;" class="card-title"><h5 style="text-transform: uppercase; text-align: center; padding-top: 1%; padding-bottom: 0; margin-top: 5px;">Patient Information</h5></div>
                <div class="card-body"><label>Name:
                <strong>{{ $pat->last_name }}, {{ $pat->first_name }} {{ $pat->middle_name }}</strong> </label><br>
                <label>Age:
                <strong>{{ $pat->age }}</strong></label><br>
                <label>Sex:
                <strong>{{ $pat->sex }}</strong></label><br>
                {{-- <label>Attending Physician:</label>
                <strong>         </strong> --}}
                <label>Room:
                <strong>{{ $admissions->room }}</strong></label></div>
            </div><br>        

            <div class="dropdown">
                <button onclick="myFunction()" class="dropdown-toggle form-border" style="background-color: white;">View Charts</button>
                <div id="myDropdown" class="dropdown-menu">
                    <a href="{{ route('show.orders', $pat->id)}}">
                        Doctor's Order</a><br>
                    <a href="{{ route('input.nursesnotes', $pat->id)}}">
                        Nurses' Notes</a><br>
                    <a href="{{ route('input.rbs', $pat->id)}}">
                        RBS Monitoring</a><br>
                    <a href="{{ route('input.intakeoutput', $pat->id)}}">
                        Intake and Output Records</a><br>
                    <a href="{{ route('input.ivf', $pat->id)}}">
                        Intravenous Fluids Record</a><br>
                    <a href="{{ route('input.vitalsigns', $pat->id)}}">
                        Vital Signs Monitoring</a>
                </div>
            </div>
        </div>
        <br><br>

            @yield('chart_content')

            <div style="margin-top: 10px; float: right; position: right; padding: 10px 15px;">
                <a href="javascript:history.back()" style="padding: 10px 15px;" class="button-default-red btn-danger">Back</a>
            </div>
        </div>

    @push('scripts')
    <script type="text/javascript">
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    @endpush
</div>
@endsection