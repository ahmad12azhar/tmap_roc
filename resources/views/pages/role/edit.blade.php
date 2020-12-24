<form id="form-input" method="POST" action="{{ route('role.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <fieldset class="form-group">
                <label class="form-label">Name</label>
                <input name="name"
                    type="text"
                    class="form-control"
                    data-validation="[NOTEMPTY]" value="{{ $data->name }}" placeholder="name">
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Permission :</strong>
            </div>
        </div>
        @foreach($permission as $value)
        <div class="col-md-3">
            <div class="checkbox-bird">
                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name', 'id' => "check-bird-$value->id")) }}
                <label for="check-bird-{{ $value->id }}">{{ $value->name }}</label>
            </div> 
        </div>
        @endforeach
    </div>
    <div class="row" style="margin-bottom: 15px; margin-top: 15px">
        <center>
            <input type="button" id="check" class="btn btn-primary" value="Check All" />
            <input type="button" id="uncheck" class="btn btn-primary" value="UnCheck All" />
        </center>
    </div>
    <div class="row">
        <center>
        <div class="col-md-12">
            <fieldset class="form-group">
                <button type="submit" class="btn btn-warning">Update</button>
            </fieldset>
        </div>
        </center>
    </div>
</form>

