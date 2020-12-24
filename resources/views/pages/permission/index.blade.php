@extends('layouts.app')
@section('content')
@section('title', 'permission')
 <!-- Content Wrapper. Contains page content -->
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>permission Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">permission Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <section class="content">
        <!-- /.row -->
          <div class="col-12">
            <div class="card">
              <a href="{{ route('permission.form') }}" type="button" class="btn btn-default"><i class="fas fa-plus"> Add permission</i></a>
              <div class="card-header">
                <h3 class="card-title">permission Management</h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed text-nowrap">
                   <thead>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Created at</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>
                                <a href="{{ route('permission.form', $item->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm btn-icon-anim btn-square" style="display: unset;"><i class="fa fa-edit" style="font-size: 14px;"></i></a>
                                <a href="{{ route('permission.destroy', $item->id) }}"  title="Delete" class="btn   btn-danger btn-sm btn-icon-anim btn-square" ><i class="fa fa-trash" style="font-size: 14px;"></i></a>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->guard_name }}</td>
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

@endsection
@endsection