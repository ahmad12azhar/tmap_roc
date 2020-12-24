<!-- form start -->
<form role="form" method="POST" action="{{ route('project.save') }}" enctype="multipart/form-data" files="true">
	@csrf
	<div class="card-body">
		<div class="form-group">
			<label for="example">Project Name</label>
			<input type="text" class="form-control" name="name" placeholder="Contoh: PT2 SUG FA KOMPLEKS MAWAR">
		</div>
		<div class="form-group">
			<label for="example">Uplink</label>
			<input type="text" class="form-control" name="uplink" placeholder="Contoh: ODC-SUG-FA">
		</div>
		<div class="form-group">
			<label for="example">Tematik Project</label>
			{{ Form::select('tematik_project', [
				'PT2' => 'PT2',
				'PT3' => 'PT3',
				'HEM' => 'HEM',
				'NodeB' => 'NodeB'
			], null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			<label for="example">Description</label>
			<textarea class="form-control" rows="3" name="description" placeholder="Contoh: Pembangunan Project PT2 di Kompleks Perumahan Mawar Jl. Boulevard"></textarea>
		</div>
		<div class="form-group">
			<label for="example">Status</label>
			{{ Form::select('status', [
				'In Progress' => 'In Progress',
                'Pending' => 'Pending',
                'Complete' => 'Complete'
			], null, array('class' => 'form-control')) }}
		</div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
