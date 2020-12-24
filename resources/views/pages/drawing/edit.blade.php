<!-- form start -->
<form role="form" method="POST" action="{{ url('project/'.$project->id.'/drawing/update/'.$data->id) }}" enctype="multipart/form-data" files="true">
    @csrf
    @method('PUT')
	<div class="card-body">
		<div class="form-group">
			<label for="example">Name</label>
			<input type="text" class="form-control" name="name" value="{{$data->name}}">
		</div>
		@if ($data->type_object == "Marker")
			<div class="form-group">
				<label for="example">Type Object</label>
				{{ Form::select('object_id', $object, $data->object_id, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				<label for="example">Used</label>
				<input type="number" class="form-control" name="used" value="{{$data->used}}">
			</div>
			<div class="form-group">
				<label for="example">OCC</label>
				<input type="number" class="form-control" name="occ" value="{{$data->occ}}">
			</div>
			<div class="form-group">
				<label for="example">Capacity</label>
				<input type="number" class="form-control" name="capacity" value="{{$data->capacity}}">
			</div>
		@endif
		<div class="form-group">
			<label for="example">Status</label>
			{{ Form::select('status', [
				'0' => 'Unactive',
                '1' => 'Active'
			], $data->status, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			<label for="example">Description</label>
			<textarea class="form-control" rows="3" name="description">{{$data->description}}</textarea>
		</div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>