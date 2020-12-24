<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>TMAP Telkom  - @yield('title')</title>
  @include('partials.css')
 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('partials.head') 
@include('partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |   {{ config('app.name') }}  | Versi: {{ config('app.version') }}</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ config('app.version') }} | <i class="fa fa-heart" style="color: red"></i> Crafted with Laravel 8.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('partials.js')
</body>
</html>
