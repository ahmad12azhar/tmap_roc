@extends('layouts.auth')
@section('title','Buat Akun Baru')
@section('content')

<div class="login-box">
  <div class="login-logo">
    <center>
    <img src="{!! url($siteconfig->logo_path) !!}" style="max-width: 130px" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           <br>
     <b> {{ config('app.name') }} </b> </center>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
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

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert!</strong> {{ Session::get('message') }}
    </div>
    @endif
      <p class="login-box-msg">Silahkan isi form berikut</p>

      <form action="{{ route('postregister') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Nama Lengkap*" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email*" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number"  name="hp" class="form-control" placeholder="Nomor HP*" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  name="password" class="form-control" placeholder="Password*" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
       <p class="mb-0">
        <span >Sudah punya akun, </span>
        <a href="{{url ('/login')}}" class="text-center" style="color: #90278E"> Silahkan Login </a>
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
