@extends('layouts.app')
@section('content')
@section('title', 'Map Object')
 <!-- Content Wrapper. Contains page content -->
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Map Object Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Map Object Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <section class="content">
        <!-- /.row -->
        @if(Session::has('message'))
            <div class="row">'
              <div class="col-xs-12">
                <div class="alert @if(Session::get('messageType') == 1) alert-success @else alert-danger @endif">
                  {{ Session::get('message') }}
                </div>
              </div>
            </div>
            @endif
          <div class="col-12">
            <div class="card">
              <a href="{{ route('bulk.form') }}" type="button" class="btn btn-default"><i class="fas fa-plus"> Import</i></a>
              <div class="card-header">
                <h3 class="card-title">Map Data</h3>
                <div class="card-tools">
 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed text-nowrap" id="mappublic">
                   <thead>
                    <tr>
                        <th>#</th>
                        
                        <th>Location</th>
                        <th>Used</th>
                        <th>OCC</th>
                        <th>Capacity</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Imported at</th>
                        
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        
                        <th>Location</th>
                        <th>Used</th>
                        <th>OCC</th>
                        <th>Capacity</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Imported at</th>
                        
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->used }}</td>
                            <td>{{ $item->occ }}</td>
                            <td>{{ $item->capacity }}</td>
                            <td>{{ $item->lat }}</td>
                            <td>{{ $item->lang }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                              @if($item->status != '1')
                              Unactive
                              @else
                              Active
                              @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->
    </section>
     @section('custom-js')  
   <!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
    $(function() {
        $('#mappublic').DataTable({
            responsive: true,
                 "ordering": true,
             dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    });
</script>
@endsection
@endsection