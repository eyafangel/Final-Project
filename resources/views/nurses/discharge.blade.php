@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('update.order', $pat->id)}}">
        {{method_field('PUT')}}
        @csrf
        <div class="container">
            
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header">Update Order for patient {{$pat->last_name}}, {{$pat->first_name}} {{$pat->middle_name}}</div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <input type="text" name="id" id="id" value="{{ $order->id}}" hidden>
                                <label for="message">message:</label>
                                <input type="textarea" name="message" id="message" value="{{ $order->message }}" readonly><br>
                            </div>
                        
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select id="status" name="status">
                                    <option value="pending">Pending</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Save</button>
            {{-- <a href="{{ route('showChart', $pat->id) }}" class="btn btn-danger" >Cancel</a> --}}
        </div>
                    </div>
                    
                </div>
        </div>

        </div>
        
    </form>
 
@endsection