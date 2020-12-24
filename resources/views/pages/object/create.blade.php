<!-- form start -->
<form role="form" method="POST" action="{{ route('object.save') }}" enctype="multipart/form-data" files="true">
	@csrf
	<div class="card-body">
		<div class="form-group">
			<label for="example">Object Type</label>
			<input type="text" class="form-control " name="type"/>
		</div>
		<div class="form-group">
			<label for="example">Status</label>
			{{ Form::select('status', [
				'Enable' => 'Enable',
                'Disable' => 'Disable'
			], null, array('class' => 'form-control select2')) }}
		</div>
		<div class="form-group">
			<label for="example">Icon</label>
			<input type="file" id="input-file-now" class="dropify" name="image" data-show-remove="false" />
		</div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>