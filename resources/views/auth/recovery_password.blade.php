@extends('layouts.auth')
@section('title','Recovery Password')
@section('content')

<div class="login-box">
	<div class="login-logo">
		<center>
			<img src="#" style="max-width: 130px" alt="" class="brand-image img-circle elevation-3"
			style="opacity: .8">
			<br>
            <b> {{ config('app.name') }} </b> Recovery Password
        </center>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

            <form action="{{ route('postRecoveryPassword') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if(count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Change password</button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{url('/login')}}">Login</a>
            </p>
            
            <hr>  
            <center>
                <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </span>
            </center>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@endsection
