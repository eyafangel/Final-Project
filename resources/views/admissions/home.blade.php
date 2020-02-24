@extends('layouts.app')

{{-- @section('title', 'Home') --}}

@section('content')

<div class="container-fluid">
	<a href="/create" class="btn btn-primary btn-lg">Create Patient</a>
    <a href="/patientlist" class="btn btn-primary btn-lg">Patient List</a>
</div>   

@endsection