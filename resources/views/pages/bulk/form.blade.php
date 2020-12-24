@extends('layouts.app')
@section('content')
@section('title', 'Import Map Data')
 <!-- Content Wrapper. Contains page content -->
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Map Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Map Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <section class="content">
        <!-- /.row -->
          <div class="col-12">
             <div class="col-md-12">
                  
                     

<form id="form-input" method="POST" action="{{ url('/bulk/postCSV') }}" enctype="multipart/form-data" files="true">
    @csrf
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Import Data </h3>
            </div>
            <div class="card-body">
                @if ($errors->has('file'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('file') }}</strong>
    </span>
    @endif
               <div class="form-group">
                @if(Session::has('message'))
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="alert @if(Session::get('messageType') == 2) alert-success @else alert-danger @endif">
                        {{ Session::get('message') }}
                        </div>
                      </div>
                    </div>
                    @endif
                     <div class="form-group">
                      Contoh File : <a href="{{asset('uploads/files/template_import_contoh.csv')}}" target="_blank">Download</a>
                     </div>
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file (*.csv)</label>
                      </div>
                       
                    </div>
                  </div>
               
              <div class="form-group">
                <div class="row">
     
         
    </div>     
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Upload" class="btn btn-success float-right">
       </form>
 
        </div>
          </div>
        <!-- /.row -->
    </section>
     @section('custom-js')  

@endsection
@endsection