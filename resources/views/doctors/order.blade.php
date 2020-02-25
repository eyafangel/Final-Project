@extends('layouts.app')

@section('content')    
<div class="container-fluid">              
    <div class="col-lg-12">
    <div class="table-responsive">
   
        <form method="POST" action="{{ route('order.store') }}">
            					
                    {{ csrf_field() }}  
                    <div class="form-group">                          
                      <input type="text" name="message" id="message" required><br>
                      <input type="hidden" id="patid" value={{$pat}}>
                      
                    </div>                
                   
              <button type="submit" class="btn btn-primary">Save</button>
          
      </form>
              {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
              {{-- <a href="{{ route('order.store')}}" class="btn btn-primary">Create Order</a> --}}
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageModal">
                Create Order
            </button>              --}}
        
      </form>

</div>
</div>
</div>



@endsection