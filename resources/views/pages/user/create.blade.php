<form id="form-input" method="POST" action="{{ route('user.save') }}" enctype="multipart/form-data" files="true">
    @csrf
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add User Form</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">NID</label>
                <input type="text" id="inputnid" class="form-control" name="nid" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Name</label>
                <input type="text" id="inputname"  class="form-control" name="name" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Email</label>
                <input type="text" id="inputemail"  class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Password</label>
                <input type="password" id="inputpassword"  class="form-control" name="password" required> 
                <p> Silahkan lakukan set password, user dapat mengganti password pada menu profile
              </div>
              <div class="form-group">
                <label for="inputDescription">Re-enter Password</label>
                <input type="password" id="inputpassword"  class="form-control" name="c_password" required>
                <p> Silahkan lakukan set password, user dapat mengganti password pada menu profile
              </div>
              
              <div class="form-group">
                <label for="inputStatus">Permission Role</label> 
                {{ Form::select('role_id', $role, null, array('class' => 'form-control')) }}

              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select" name="status" required>
                  <option selected disabled>Select one</option>
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Add User" class="btn btn-success float-right">
       </form>