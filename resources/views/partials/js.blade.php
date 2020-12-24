{{-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script>  --}}
<script src="{{ asset('assets/tema/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/tema/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<!-- SweetAlert2 -->
<script src="{{ asset('assets/tema') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
{{-- <script src="{{ asset('assets/tema') }}/plugins/toastr/toastr.min.js"></script> --}}
<script src="{{ asset('assets/tema/dist/js/adminlte.js') }}"></script>
{{-- <script src="{{ asset('assets/tema/dist/js/pages/dashboard.js') }}"></script> --}}
<script src="{{ asset('assets/tema/js/demo.js') }}"></script>
 
<style type="text/css">
  html, body, #map_canvas { margin: 0; padding: 0; height: 100% }
</style>
@yield('custom-js')
@include('partials.session-message')
@include('partials.alert-message')
