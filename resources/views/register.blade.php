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
            <div class="card-header">SignUp</div>
            <div class="card-body">
                <form action=" {{route('my.register')}} " method="post">
                    @csrf
                    @method("post")
                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Email </label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" style="width:100%;" class="btn btn-dark btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



@endsection