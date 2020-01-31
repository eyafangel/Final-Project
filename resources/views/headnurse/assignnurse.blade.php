@extends('layouts.app')

@section('content')
	<h1>assign nurses to patient ug unsaon na nimo hahahahhuhuhuhu hilak na</h1>

	<div class="column">

	<select name="nurse" class="form-control" >
		<option value="">------</option>
		<option value="name">
			@foreach($user as $users)
                <td>{{ $users->name }}</td>
            @endforeach    
        </option>
	</select>

	<select name="patients" class="form-control">
		<option value="">
			
		</option>
	</select>

	</div>

	<div class="table">
		<table>
			<tr>
				<td>Name Of Patient</td>
				<td>Room of Patient</td>
			</tr>

			<tr>
				<td>Name Of Patient</td>
				<td>Room of Patient</td>
			</tr>
		</table>
	</div>
@endsection