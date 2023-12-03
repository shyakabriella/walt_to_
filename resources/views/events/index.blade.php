@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Event</h2>
            </div>
            <div class="pull-right">
                @can('event-create')
                <a class="btn btn-success" href="{{ route('event.create') }}"> Create New Event</a>
                @endcan

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
            <th width="280px">Action</th>
        </tr>
	    @foreach ($events as $event)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $event->event_name }}</td>
	        <td>{{ $event->place }}</td>
            <td>{{ $event->HostingNumber }}</td>
	        <td>
                <form action="{{ route('event.destroy',$event->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('event.show',$event->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('event.edit',$event->id) }}">Edit</a>
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
    {!! $events->links() !!}
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection