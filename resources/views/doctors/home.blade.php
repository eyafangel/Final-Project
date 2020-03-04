@extends('layouts.app')

@section('content')

<a href="{{ route('list.show')}}" class="btn btn-primary">Patient List</a>
<a href="{{ route('order.show')}}" class="btn btn-primary">Orders</a>
<a href="{{ route('calendar')}}" class="btn btn-primary">Calendar</a>
@endsection