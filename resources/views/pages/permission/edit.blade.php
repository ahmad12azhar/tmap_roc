 

<form id="form-input" method="POST" action="{{ route('permission.update', $data->id) }}" enctype="multipart/form-data" files="true">
    @csrf
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Permission</h3>
            </div>
            <div class="card-body">
            
              <div class="form-group">
                <label for="inputDescription">Name</label>
                <input type="text" id="inputname"  class="form-control" name="name" value="{{ $data->name }}">
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
          <input type="submit" value="Update" class="btn btn-success float-right">
       </form>
 