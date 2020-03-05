@extends('layouts.app')
 
@section('content')
 
    <form method="POST" action="{{ route('user.store')}}">
        {{ csrf_field() }}
        <div class="container">
            
            <div class="justify-content-center" style=>
                <div class="card column-card-admin" style="border-radius:12px;border-color:#4dc090; margin-left:150px; margin-right:150px; margin-top:20px;">
                    <div class="card-header" style="font-family: 'Martel Sans', sans-serif; font-size:18px; background:#4dc090; color:white; border-radius:12px 12px 0px 0px; height:7vh">CREATE USER</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-border form-control" id="name" name="name" required>
                        </div>
 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-border form-control" id="email" name="email" required>
                    </div>
 
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-border form-control" id="password" name="password" required>
                    </div><br>

                    <div class="form-group row" style="text-align:left; float:left;">
                        <label for="role" class="col-md-4 col-form-label ">Role</label>

                        <div class="col-md-6">
                            <select style="width:200px; border-radius:12px; border: 1px solid teal;" name="role" class="form-control" required>
                                <option value="">Choose a role</option>
                                <option value="admission">Admission</option>
                                <option value="doctor">Doctor</option>
                                <option value="headNurse">Head Nurse</option>

                                <option value="nurse">Nurse</option>

                             </select> 
                        </div>
                    </div><br><br><br>

                    @foreach (['danger', 'warning', 'success', 'info'] as $key)
                        @if(Session::has($key))
                            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                        @endif
                    @endforeach
 
                        <div class="form-group" style="text-align:center;">
                            <button style="cursor:pointer" type="submit" class="button button-default btn btn-primary">Submit</button>
                            <a href="{{ route('user.index') }}" class="button-default-red button-red btn btn-danger" >Cancel</a>
                        </div>
                    </div>
                    
                </div>
        </div>

        </div>
        
    </form>
 
@endsection