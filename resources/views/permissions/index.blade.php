@extends('layouts.auth')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permissions Management</h2>
        </div>
        <div class="pull-right">
    
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Set Permission</a>
            
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($permissions as $key => $permission)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $permission->name }}</td>
        <td>

        <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
            <a class="btn btn-info" href="#">Show</a>
            
            <a class="btn btn-primary" href="#">Edit</a>
           
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger">Delete</button>          

        </form>

</td>

    </tr>

    @endforeach

</table>


{!! $roles->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>

@endsection