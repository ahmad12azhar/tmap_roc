@extends('layouts.app')
@section('title')
Form {{$viewname}}
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Master {{$viewname}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Master {{$viewname}}</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Form {{$viewname}}</h3>
					</div>
					<!-- /.card-header -->
					
					@if($data)
						@include('pages.project.edit')
					@else
						@include('pages.project.create')
					@endif
				</div>
				<!-- /.card -->

			</div>
			<!--/.col (left) -->
		
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('custom-css')  
<link rel="stylesheet" href="{{ asset('assets/tema') }}/plugins/select2/css/select2.min.css">
@endsection

@section('custom-js')  
<script src="{{ asset('assets/tema') }}/plugins/select2/js/select2.full.min.js"></script>

<script>
	$(function () {
		$('.select2').select2()
	});
</script>

@endsection
