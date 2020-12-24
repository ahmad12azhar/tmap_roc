<form id="form-input" method="POST" action="{{ route('role.save') }}" enctype="multipart/form-data" files="true">
    @csrf
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Role</h3>
            </div>
            <div class="card-body">
            
              <div class="form-group">
                <label for="inputDescription">Name</label>
                <input type="text" id="inputname"  class="form-control" name="name">
              </div>
               
              <div class="form-group">
                <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Permission :</strong>
            </div>
        </div>
        @foreach($permission as $value)
        <div class="col-md-3">
            <div class="checkbox-bird">
                <input name='permission[]' type="checkbox" id="check-bird-{{ $value->id }}" value="{{ $value->id }}"/>
                <label for="check-bird-{{ $value->id }}">{{ $value->name }} </label>
            </div>    
        </div>
        @endforeach
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
          <input type="submit" value="Add" class="btn btn-success float-right">
       </form>
 