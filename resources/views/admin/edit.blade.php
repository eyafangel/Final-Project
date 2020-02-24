@extends('layouts.app')
 
@section('content')
 
    <form method="POST" action="{{ route('user.update', $user->id)}}">
        {{method_field('PUT')}}
        @csrf
        <div class="container">
            
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="role" class="form-control" id="role" name="role" value="{{ $user->role }}">
                    </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('user.index') }}" class="btn btn-danger" >Cancel</a>
        </div>
                    </div>
                    
                </div>
        </div>

        </div>
        
    </form>
 
@endsection