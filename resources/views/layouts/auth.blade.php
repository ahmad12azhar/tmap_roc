<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>TMAP Telkom  - @yield('title')</title>
  @include('partials.css')

</head>
<body class="hold-transition login-page" style="background: url({{asset ('images/bg_map.jpg')}});background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
@yield('content')
  @include('partials.js')
</body>
</html>
