@extends('layouts.app')
@section('content')

<div class="container" style="padding: 20px">		

	<div class = "profile"> 
    	{!! Form::label('name', 'Patient Name: ') !!}
        <input type="text" name="patientName" id="patientName" value="{{ $patient->last_name}}, {{$patient->first_name}} {{$patient->middle_name}}">
    </div>

    {{-- include diagnosis --}}

    <div class="col-md-4">
        <form action="/search-user/{{ $patient->id}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                {!! Form::label('user', 'Transfer to: ') !!}
                <input type="text" class="form-control" name="search" placeholder="Search doctors...">
                <span class="form-group-btn">
                    <button type="submit" class="btn btn-primary">
                        Search Doctor
                    </button>
                </span>
            </div>
        </form>
    </div>
    
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Action</td>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td><button id="transferButton" class="btn btn-primary" data-toggle="modal" data-target="#transferModal">Select</button>
                {{-- <td><a href="{{ route('transfer.store', $user->id) }}" class="btn btn-sm btn-info">Select</a>                --}}
                </td>
            </tr>
                @empty
                <tr>
                <tr colspan="5">No records to show.</tr>
                </tr>
                @endforelse
                
            </tbody>
        </table>

        <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transfer Patient </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                  <form method="POST" action="{{ route('transfer.store', $user->id) }}">
                    <div class="modal-body">     					
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="message">Patient</label>
                                <h2>{{$patient->last_name}}, {{$patient->first_name}} - {{$patient->id}}</h2>
                                <input type="text" name="patid" id="patid" value="{{$patient->id}}"><br>
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <input type="text" name="message" id="message" required><br>
                            </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>       
              </div>
            </div>
        </div> 
</div>

@push('scripts')
<script>
    $(function(){
      
      $("#transferButton").click(function(){
        //  var patient = $(this).data('id');
        //  $("p").html(patient);    
        $("#transferModal").modal({show:true});
      });
    });
</script>
@endpush

@endsection