@extends('layouts.app')
@section('title')
Master {{$viewname}}
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<a href="javascript:history.go(-1)" class="btn btn-warning swal-btn-warning mb-1">Back</a>
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
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							Project : {{$project->name}}
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Type</th>
									<th>Object</th>
									<th>Used</th>
									<th>Occ</th>
									<th>Capacity</th>
									<th>Length Line (m)</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $item)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->type_object}}</td>
									@if ($item->object)
										<td>{{$item->object->type}}</td>	
									@else
										<td>-</td>
									@endif
									<td>{{$item->used}}</td>
									<td>{{$item->occ}}</td>
									<td>{{$item->capacity}}</td>
									<td>{{$item->length_of_line}}</td>
									@if ($item->status != 1)
										<td>Unactive</td>	
									@else
										<td>Active</td>
									@endif
									<td>
										<a href="{{ url('project/'.$project->id.'/drawing/form/'.$item->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square" style="display: unset;"><i class="fa fa-edit" style="font-size: 14px;"></i></a>
										<a href="{{ url('project/'.$project->id.'/drawing/destroy/'.$item->id) }}" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm btn-icon-anim btn-square" style="display: unset;"><i class="fa fa-trash" style="font-size: 14px;"></i></a>
									</td>
								</tr>									
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Type</th>
									<th>Object</th>
									<th>Used</th>
									<th>Occ</th>
									<th>Capacity</th>
									<th>Length Line (m)</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('custom-css')  
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/tema') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('assets/tema') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('custom-js')  
<!-- DataTables -->
<script src="{{ asset('assets/tema') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/tema') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/tema') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/tema') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
@endsection