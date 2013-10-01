	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('source_id', 'Source') }}
		{{ Form::select('source_id', $connections, null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('target_id', 'Target') }}
		{{ Form::select('target_id', $connections, null, array('class' => 'form-control')) }}
	</div>
	