@extends('layouts.app')
 
@section('content')
 
    <form method="POST" action="{{ route('user.update', $user->id)}}">
        {{method_field('PUT')}}
        @csrf
        <div class="container">
            
            <div class="justify-content-center">
                <div class="card" style="border-radius:12px;border-color:#4dc090; margin-left:150px; margin-right:150px; margin-top:20px;">
                    <div class="card-header" style="font-family: 'Martel Sans', sans-serif; font-size:18px; background:#4dc090; color:white; border-radius:12px 12px 0px 0px; height:7vh">EDIT USER</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control form-border" id="name" name="name" value="{{ $user->name }}">
                        </div>
 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control form-border" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="role" class="form-control form-border" id="role" name="role" value="{{ $user->role }}">
                    </div><br>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="button button-default btn-primary">Save</button>
            <a href="{{ route('user.index') }}" class="button-default-red btn-danger" >Cancel</a>
        </div>
                    </div>
                    
                </div>
        </div>

        </div>
        
    </form>
 
@endsection