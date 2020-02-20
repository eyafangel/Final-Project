@extends('layouts.app')

@include('patients.profile')

<div class ="options">

<a href="/createQR/{{$patient->id}}" class="btn btn-primary">Print QR Code</a>

</div>