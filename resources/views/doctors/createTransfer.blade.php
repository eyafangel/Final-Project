@extends('layouts.app')
@section('content')

<div class="container" style="padding: 20px">		

	<form method="POST" action="{{ route('transfer.store', $newUser->id) }}">
       					
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="patientName">Patient Name: </label>
                <input type="text" name="name" id="name" value="{{$patient->last_name}}, {{$patient->first_name}}"><br>
                <input type="hidden" name="patid" id="patid" value="{{$patient->id}}">
                </div>
          
                <div class="form-group">
                    <label for="newUser">Doctor</label>
                <input type="text" name="newUser" id="newUser" value="{{$newUser->name}}"><br>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                  <input type="text" name="message" id="message"><br>
                </div> 
                <button type="submit" class="btn btn-primary"></button>              
    </form>
</div>
@endsection