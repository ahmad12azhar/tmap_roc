@extends('layouts.auth')
@section('title','Error 404')
@section('content')

<!-- Main content -->
<section class="content" style="margin-top: 250px; background: aliceblue;padding: 10px;">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="{{url('/login')}}">return to dashboard</a> or try using the search form.
        </p>

      
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->

@endsection
