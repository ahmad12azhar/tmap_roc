@extends('layouts.auth')
@section('title','Forgot Password')
@section('content')

<div class="login-box">
	<div class="login-logo">
		<center>
			<img src="#" style="max-width: 130px" alt="" class="brand-image img-circle elevation-3"
			style="opacity: .8">
			<br>
            <b> {{ config('app.name') }} </b> Forgot 
        </center>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form action="{{ route('postForgotPassword') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
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
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
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
