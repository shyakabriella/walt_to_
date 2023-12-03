@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Event-Requirements</h2>
            </div>
            <div class="pull-right">
             
                <a class="btn btn-success" href="{{ route('requirements.create') }}"> Create New Event Requirement</a>
           

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
            <th>Event Name</th>
            <th>Hosting Number</th>
            <th>Theme</th>
            <th>Starting Point</th>
            <th>Destination</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($requirements as $req)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $req->event_name }}</td>
	        <td>{{ $req->place }}</td>
            <td>{{ $req->HostingNumber }}</td>
            <td>{{ $req->theme }}</td>
	        <td>{{ $req->starting }}</td>
            <td>{{ $req->destination }}</td>
	        <td>
                <form action="{{ route('requirements.destroy',$req->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('requirements.show',$req->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('requirements.edit',$req->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	     </td>
	    </tr>
	    @endforeach
    </table>
    {!! $requirements->links() !!}
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection