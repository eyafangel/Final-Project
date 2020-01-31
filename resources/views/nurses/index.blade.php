@extends('layouts.app')

@section('content')
	<h1>Hi nurse!</h1>
	<div>
		<a href="/inputCharts">Input Charts</a>
	</div>

	<a href="/inputChart" class="btn btn-primary">Input patient's charts</a>

@endsection