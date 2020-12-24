@extends('layouts.app')
@section('content')
@section('title', 'Users')
 <!-- Content Wrapper. Contains page content -->
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <section class="content">
        <!-- /.row -->
          <div class="col-12">
            <div class="card">
              <a href="{{ route('user.form') }}" type="button" class="btn btn-default"><i class="fas fa-plus"> Add User</i></a>
              <div class="card-header">
                <h3 class="card-title">User Management</h3>
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
                      <th>NID</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $key => $item)
                        <tr>
                             <td>{{ $item->nid }}</td>
                                <td>{{ $item->name }}</td>
                            
                            @if (empty($item->roles[0]))
                            <td>-</td>
                            @else
                             <td>{!!$item->roles[0]->name!!} </td>
                             @endif
                          <td>
                            @if ($item->status != 0)
                            Enable
                            @else
                            Disable
                            @endif
                          </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('user.form', $item->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <td>
                          @if ($item->status != 0)
                          
                          <form role="form" method="POST" action="{{ url('user/disable/'.$item->id) }}" >
                            @csrf
                            <input type="hidden" name="status" value="0">
                          <button type="submit" class="btn btn-warning btn-sm"> <i class="fas fa-ban">
                              </i>
                              Click to Disabled</button>                         </form>

                          @else

                           <form role="form" method="POST" action="{{ url('user/disable/'.$item->id) }}" >
                            @csrf
                            <input type="hidden" name="status" value="1">
                          <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check">
                              </i>
                              Click to Enable</button>                         
                            </form>
                          @endif
                             </td>
                            
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