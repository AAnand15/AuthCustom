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


</div>

<div class="row justify-content-center">
	<div style="width: 400px;">
        <div class="card">
            <div class="card-header">Login</div>
                <div class="card-body">
                    <form action=" {{route('my.login')}} " method="post">
                        @csrf
                        @method('post')
                        <div class="form-group mb-3"  >
                            <label class="form-label">Email </label>
                            <input type="text" class="form-control" name="email" >
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