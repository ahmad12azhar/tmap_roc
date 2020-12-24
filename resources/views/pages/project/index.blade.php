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
							<a href="{{ route('project.form', false) }}" class="btn btn-primary swal-btn-warning"><i class="fa fa-plus"></i>&nbsp; Add Data</a>
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Project ID</th>
									<th>Project Name</th>
									<th>Tematik Project</th>
									<th>Nilai CPP</th>
									<th>Misc Description</th>
									<th>Status</th>
									<th>Start Date</th>
									<th>Complete Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $item)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$item->id}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->tematik_project}}</td>
									<td>{{$ProjectMap->get_cpp($item->id)}}</td>
									<td>{{$item->description}}</td>
									<td>{{$item->status}}</td>
									<td>{{$item->created_at}}</td>
									<td>{{$item->completed_at}}</td>
									
									@if ($item->status == "Complete")
									<td>
										<a href="{{ route('project.map.view', $item->id) }}" data-toggle="tooltip" title="View Map" class="btn btn-primary btn-sm btn-icon-anim btn-square"><i class="fa fa-eye" style="font-size: 14px;"></i></a>
									</td>
									@else										
									<td>
										<a href="{{ route('project.map.view', $item->id) }}" data-toggle="tooltip" title="View Map" class="btn btn-primary btn-sm btn-icon-anim btn-square"><i class="fa fa-eye" style="font-size: 14px;"></i></a>
										<a href="{{ route('project.drawing', $item->id) }}" data-toggle="tooltip" title="Drawing Map" class="btn btn-primary btn-sm btn-icon-anim btn-square"><i class="fa fa-map" style="font-size: 14px;"></i></a>
										<a href="http://tmap.telkomkti.id/prod/physical_devices.php?id={{$item->id}}" data-toggle="tooltip" title="BOQ" class="btn btn-warning btn-sm btn-icon-anim btn-square"><i class="fa fa-link" style="font-size: 14px;"></i></a>
										<a href="{{ route('project.form', $item->id) }}" data-toggle="tooltip" title="Edit Project" class="btn btn-success btn-sm btn-icon-anim btn-square"><i class="fa fa-edit" style="font-size: 14px;"></i></a>
										<a href="{{ route('project.destroy', $item->id) }}" data-toggle="tooltip" title="Delete Project" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm btn-icon-anim btn-square"><i class="fa fa-trash" style="font-size: 14px;"></i></a>
									</td>
									@endif
								</tr>									
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Project ID</th>
									<th>Project Name</th>
									<th>Tematik Project</th>
									<th>Nilai CPP</th>
									<th>Misc Description</th>
									<th>Status</th>
									<th>Start Date</th>
									<th>Complete Date</th>
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