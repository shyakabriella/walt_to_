@extends('layouts.auth')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Event-Requirements</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('apply.create') }}"> Application For Walk-t0-Remeber_Event</a>
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
            <th>Names</th>
            <th>ID</th>
            <th>email</th>
            <th>Tel</th>
            <th>Gender</th>
            <th>Province</th>
            <th>District</th>
            <th>Sector</th>
            <th>Event-Name</th>
            <th>Hosting-Place</th>           
            <th width="280px">Action</th>
        </tr>
	    @foreach ( $apply as $apply)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $apply->names }}</td>
	        <td>{{ $apply->nid }}</td>
            <td>{{ $apply->email }}</td>
            <td>{{ $apply->phone }}</td>
	        <td>{{ $apply->gender }}</td>
            <td>
                <span class="pip-rwanda-location" data-type="0" data-element="{{$apply->Province}}"></span>
             </td>
             <td>
                <span class="pip-rwanda-location" data-type="1" data-element="{{$apply->District}}"></span>
             </td>
             <td>
                <span class="pip-rwanda-location" data-type="2" data-element="{{$apply->Sector}}"></span>
             </td>
	        <td>{{ $apply->event_name }}</td>
            <td>{{ $apply->place }}</td>
	        <td>
                <form action="{{ route('apply.destroy',$apply->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('apply.show',$apply->id) }}">Approved</a>
                    @can('apply-edit')
                    <a class="btn btn-primary" href="{{ route('apply.edit',$apply->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Reject</button>
                   
                </form>
	     </td>
	    </tr>
	    @endforeach
    </table>
   
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>


@endsection