@extends('layouts.app')
@section('content')
@section('title', 'Public Map')
 
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Site Config</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form-input" method="POST" action="{{ route('configuration.update', $data->id) }}" enctype="multipart/form-data" files="true">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Site Title</label>
                <input name="site_title"
                    type="text"
                    class="form-control"
                    data-validation="[NOTEMPTY]" value="{{ $data->site_title }}">
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Site Tagline</label>
                <input name="site_tagline"
                    type="text"
                    class="form-control"
                    data-validation="[NOTEMPTY]" value="{{ $data->site_tagline }}">
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Email</label>
                <input name="email"
                    type="text"
                    class="form-control"
                    data-validation="[NOTEMPTY]" value="{{ $data->email }}">
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Telephone</label>
                <input name="telephone"
                    type="text"
                    class="form-control"
                    data-validation="[NOTEMPTY]" value="{{ $data->telephone }}">
            </fieldset>
        </div>
          
        <div class="col-md-4">
            <fieldset class="form-group">
                <label class="form-label">API Key</label>
                <input name="api"
                    type="text"
                    class="form-control" value="{{ $data->twitter }}">
            </fieldset>
        </div>

          
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Address</label>
                <textarea name="address" rows="9" class="form-control" placeholder="">{{ $data->address }}</textarea>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group">
                <label class="form-label">Logo Site</label>
                <input type="file" id="input-file-now" class="dropify" name="image" data-default-file="{{ asset($data->logo_path) }}" value="{{ $data->logo_path }}" data-show-remove="false" />
            </fieldset>
        </div>
        <div class="col-md-12">
            <fieldset class="form-group">
                <label class="form-label">Site Description</label>
                <div class="summernote-theme-1">
                    <textarea class="summernote" name="site_description" placeholder="">{{ $data->site_description }}</textarea>
                </div>
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