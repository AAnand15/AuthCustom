@extends('main')
@section('content')
@if ($message= Session::get('success'))
<div class="alert alert-success">
    {{$message}}
</div>
@endif


@if ($message= Session::get('error'))
<div class="alert alert-danger">
    {{$message}}
</div>
@endif

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">

        Welcome Home
    </div>
</div>
<div class="m-5">
    <div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <td>{{Auth::User()->id}}</td>
                <td>{{Auth::User()->name}}</td>
                <td>{{Auth::User()->email}}</td>
                <td><a class="btn btn-primary" href="{{route('edit')}}">Edit</a></td>
                <td>
                    <form action="{{route('my.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="Submit" class="btn btn-danger" name="delete" value="Delete">
                    </form>
                </td>
            </tbody>
        </table>
    </div>
</div>


@endsection