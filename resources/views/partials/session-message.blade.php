<script type="text/javascript">
    $(document).ready(function() {
        @if(Session::has('success'))
            notie.alert(1, '{{ Session::get('success') }}', 2);
        @elseif(Session::has('failed'))
            notie.alert(3, '{{ Session::get('failed') }}', 2);
        @endif
    });
</script>
