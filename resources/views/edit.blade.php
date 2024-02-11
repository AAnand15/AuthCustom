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

<div class="row justify-content-center">
	<div class="col-md-4">
        <div class="card">
            <div class="card-header">Update</div>
                <div class="card-body">
                    <form action=" {{route('my.edit')}} " method="post">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}">
                        </div>
                        <div class="form-group mb-3"  >
                            <label class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" value="{{Auth::User()->email}}" >
                       </div>
                       <button type="submit" style="width:100%;" class="btn btn-dark btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection