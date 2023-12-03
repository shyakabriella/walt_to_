@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Event-Requirements</h2>
            </div>
            <div class="pull-right">
             
                <a class="btn btn-success" href="{{ route('skedules.create') }}"> Create New Event Skedule</a>
           

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
            <th>Event Name</th>
            <th>Starting Point</th>
            <th>Destination</th>
            <th>Time-To-Start</th>
            <th>End</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($skedules as $sked)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{$sked->event_name }}</td>
	        <td>{{ $sked->starting }}</td>
	        <td>{{ $sked->destination }}</td>
            <td>{{ $sked->starthrs }}</td>
            <td>{{ $sked->end_hrs }}</td>
            
                    
	        <td>
              <form action="{{ route('skedules.destroy',$sked->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('skedules.show',$sked->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('skedules.edit',$sked->id) }}">Edit</a>
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
    {!! $skedules ->links() !!}
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection