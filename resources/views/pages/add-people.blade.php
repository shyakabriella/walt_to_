@extends('layouts.auth')
  
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div  class="container my-1">
        <a  href="{{ route('event') }}" class="btn text-success my-2 table-add ">
            <i  class="fas fa-plus fa-2x" aria-hidden="true"></i>        
</a>
        <table   class="table table-striped md-2" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">National Id</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th  scope="col">Province</th>
                    <th scope="col">District</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Starting Point</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($data as $list)
                <tr>
                <td>{{$i++}}</td>
                <td>{{$list->fname}}</td>
                <td>{{$list->lname}}</td>
                <td>{{$list->nid}}</td>
                <td>{{$list->phone}}</td>
                <td>{{$list->email}}</td> 
                <td >{{$list->province}}</td>
                <td>{{$list->district}}</td>
                <td>{{$list->sector}}</td>
                <td>{{$list->start}}</td>
                <td>{{$list->end}}</td> 
                <td><a   href="{{url('edit-people/' .$list->id)}}" class="btn btn-primary fas fa-edit"></a> ! <a href="{{url('delete-people/' .$list->id)}}" class="btn btn-danger fa fa-trash" ></a></td>

                </tr> 
                @endforeach 
            </tbody>
        </table>
    </div>

    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!-- custome  -->
    <script src="script.js"></script>
</body>

</html>

@endsection