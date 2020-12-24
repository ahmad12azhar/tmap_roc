@extends('layouts.app')
@section('content')
@section('title', 'My Account')
 
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
               @if(Session::has('message'))
               <div class="col-xs-12">
                <div class="alert @if(Session::get('messageType') == 1) alert-success @else alert-danger @endif">
                  {{ Session::get('message') }}
                </div>
              </div>
             @endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form id="form-input" method="POST" action="{{ route('user.update', $data->id) }}" enctype="multipart/form-data" files="true">
    @csrf
    @method('PUT')
    <div class="col-md-12">
   
      
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Nama</label>
                <input name="name"
                    type="text"
                    class="form-control"
                    d value="{{ $data->name }}">
            </fieldset>
        </div>
           <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">NID</label>
                <input name="email"
                    type="text"
                    class="form-control"
                      value="{{ $data->nid }}"
                      disabled>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Email</label>
                <input name="email"
                    type="text"
                    class="form-control"
                      value="{{ $data->email }}">
            </fieldset>
        </div>
          
        <div class="col-md-4">
            <fieldset class="form-group">
                <label class="form-label">HP</label>
                <input name="nid"
                    type="text"
                    class="form-control" value="{{ $data->hp }}">
            </fieldset>
        </div>

           <div class="col-md-4">
            <fieldset class="form-group">
                <label class="form-label">Password</label>
                <input name="password"
                    type="text"
                    class="form-control" value="{{ $data->password }}">
            </fieldset>
        </div>
       
        
    </div>
    <fieldset class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </fieldset>
</form>
               
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @section('custom-js')  

@endsection
@endsection