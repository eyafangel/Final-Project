@extends('layouts.app')

@section('content')
	{{-- <h1>assign nurses to patient ug unsaon na nimo hahahahhuhuhuhu hilak na</h1> --}}
	<div class="form-group" style="padding: 10px">
		{!! Form::Label('item', 'Please choose a nurse...')!!}
		{!! Form::select('id', $nurse, $nurse->pluck('id'), ['class' => 'form-control'])!!}
		<br><br>

		<div class="form-group">
			<h5>Patient List</h5>
			
			<div class="tab" style="float: left; padding: 20px">
				<h6>Check checkbox to select patients.</h6>
				<table id="one">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Room Number</th>
						<th>Select</th>
					</tr>

					<tr>
						@foreach($patients as $patient)
						<td>{{ $patient->last_name }}</td>
						<td>{{ $patient->first_name }}</td>
						<td>{{ $patient->middle_name }}</td>
						<td>{{ $patient->room }}</td>
						<td><input type="checkbox" id="checkbox"></td>
						@endforeach
					</tr>
				</table>
			</div>

			{{-- <div class="tab tab-btn" style="float: left; margin: 50px">
				<button style="display: block; margin-bottom: 20px" onclick="tab1_to_tab2()">>>>></button>
				<button><<<<</button>
			</div>
 --}}
			<div class="tab" style="float: left; padding: 20px">
				<h6>Selected patients</h6>
				<table id="two">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Room Number</th>
						<th>Select</th>
					</tr>
			</div>
		</div>	
	</div>

	<div style="float: right">
		<input type="button" class="button btn btn-primary" value="ASSIGN"></input>
	</div>

@push('scripts')
	<script type="text/javascript">
		// function tab1_to_tab2()
		// {
		// 	var table1 = document.getElementById('patientlist'),
		// 		table2 = document.getElementById('patientlist1'),
		// 		checkboxes = document.getElementById("check-pat");
		// 	for (var i = 0; i < checkboxes.length; i++) {
		// 		if (checkboxes[i].checked)
		// 		{
					// var newRow = table2.insertRow(table2.length),
					// 	cell1 =newRow.insertCell(0),
					// 	cell2 =newRow.insertCell(1),
					// 	cell3 =newRow.insertCell(2),
					// 	cell4 =newRow.insertCell(3);
					// cell1.innerHTML = table1.rows[i].cells[0].innerHTML;
					// cell2.innerHTML = table1.rows[i].cells[1].innerHTML;
					// cell3.innerHTML = table1.rows[i].cells[2].innerHTML;
					// cell4.innerHTML = "<input type='checkbox' name='check-pat'>";
		// 			console.log("yes");
		// 		}
		// 	}
		// }

		$.when($.ready).then(function() {
  			$('input:checkbox').on('change', function(e) {
    			if (this.checked) {
      				$('table#two tbody').append($(this).closest('tr'));
    			} else {
    				$('table#one tbody').append($(this).closest('tr'));
    			}
  			});
		});
	</script>
@endpush
@endsection
