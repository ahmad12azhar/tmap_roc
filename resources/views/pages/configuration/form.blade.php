@extends('layouts.app')
@section('content')
@section('title', 'Edit')

@section('content')

<div class="row">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Form {{ $viewname }}</h3>
                    </div>
                </div>
            </div>
        </header>

        <section class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        @if($data)
                            @include('pages.configuration.edit')
                        @else
                            @include('pages.configuration.create')
                        @endif
                    </div>
                </div><!--.row-->
            </div>
        </section>
    </div><!--.container-fluid-->
</div><!--.page-content-->

@endsection


@section('custom-css')
<link rel="stylesheet" href="{{ asset("assets/backend/css/lib/summernote/summernote.css") }}"/>
<link rel="stylesheet" href="{{ asset("assets/backend/css/separate/pages/editor.min.css") }}">
<link rel="stylesheet" href="{{ asset("assets/backend/plugin/dropify/dist/css/dropify.min.css") }}">
<style>
    .note-editable{
        min-height: 250px;
    }
</style>
@endsection


@section('custom-js')
<script src="{{ url('assets/backend/js/lib/html5-form-validation/jquery.validation.min.js') }}"></script>
<script src="{{ url('assets/backend/js/lib/summernote/summernote.min.js') }}"></script>
<script src="{{ url('assets/backend/js/lib/html5-form-validation/jquery.validation.min.js') }}"></script>
<script src="{{ url('assets/backend/plugin/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(function() {
        $('#form-input').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group'
                }
            }
        });
    });
    $(document).ready(function() {
        $('.summernote').summernote();
        $('.dropify').dropify();
    });
</script>

@endsection