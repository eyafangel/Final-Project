@extends('layouts.app')

@section('content')
	
<div class="container-fluid">
	
	<a href="{{ route('nurse.list')}}">Patient list</a><br>
	<a href="{{route('scan')}}">Scan QR Code</a>

</div>

@endsection