@extends('layouts.auth')
@section('title','Login')
@section('content')

<div class="login-box">
	<div class="login-logo">
		<center>
			<img src="#" style="max-width: 130px" alt="" class="brand-image img-circle elevation-3"
			style="opacity: .8">
			<br>
			<b> {{ config('app.name') }} </b> 
		</center>
	</div>
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Silahkan isi form berikut</p>

			<form action="{{ route('postLogin') }}" method="post">
				@csrf
				<div class="input-group mb-3">
					<input type="number" name="nid" class="form-control" placeholder="NID Anda">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-barcode"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="******" name="password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="remember">
							<label for="remember">
								Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			
			<!-- /.social-auth-links -->

			<p class="mb-1">
				<a href="{{url('/forgot-password')}}">Forgot password</a>
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
