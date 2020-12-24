@extends('layouts.app')
@section('content')
@section('title', 'Add Role')
 <!-- Content Wrapper. Contains page content -->
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <section class="content">
        <!-- /.row -->
          <div class="col-12">
             <div class="col-md-12">
                  @if(Session::has('message'))
                  <div class="row">'
                    <div class="col-xs-12">
                      <div class="alert @if(Session::get('messageType') == 2) alert-success @else alert-danger @endif">
                        {{ Session::get('message') }}
                        </div>
                      </div>
                    </div>
                    @endif

                    @if($data)
                            @include('pages.role.edit')
                        @else
                            @include('pages.role.create')
                        @endif
        </div>
          </div>
        <!-- /.row -->
    </section>
     @section('custom-js')  

@endsection
@endsection