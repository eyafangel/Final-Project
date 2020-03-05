@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="manage-margin">
                <h5 class="manage-font">MANAGE USERS</h5>
            </div>

            <div class="col-md-4" style="float: left; margin-top:20px;">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" style="border-radius:12px;border:solid teal; border-width:1px; margin-right:1px;" name="search" placeholder="Search users..." >
                        <span class="form-group-btn">
                            <button type="submit" class="button-default button btn-primary">
                                Search
                            </button>
                        </span>
                    </div>
                </form>
            </div>

            <div>
            <a style="float:right; margin-top:20px; margin-right:10px;" class="button-default button button-line" href="{{ route('user.create') }}">Create User</a>
                    {{ csrf_field() }}
                    
                   {{--  @if(isset($users)) --}}
            </div>

            <div class="col-md-12">        
            
                
            
            

                <div style="overflow-x:auto;
                margin-top:100px;">
                <table class="table table-bordered" id="myTable">
                    <thead style="background:teal; color:white;">
                        <tr>
                        <td>ID</td>
                        <td>NAME</td>
                        <td>EMAIL</td>
                        <td>ROLE</td>
                        <td colspan="2">ACTION</td>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>

                            <a href="{{ route('user.edit', $user->id) }}" class="button-default button button-line">Edit</a>

                                <form method="POST" action="{{ route('user.destroy', $user->id) }}" style="margin-left">
                                        @csrf
                                        {{ method_field('DELETE') }}


                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete {{$user->name}} ?')" class="button-delete btn-sm btn-danger">

                                </form>
                            </td>
                        </tr>
                            @empty
                            <tr>
                            <tr colspan="5">No records to show.</tr>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    </div>

                    {!! $users->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection
