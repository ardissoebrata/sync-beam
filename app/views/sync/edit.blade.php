@extends('layouts.default')

@section('title')
Edit Sync ::
@parent
@stop

@section('content')
<div class="page-header form-narrow">
	<a href="{{ URL::route('sync.index') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
	<h1>Sync</h1>
</div>
{{ Form::model($sync, array('method' => 'PATCH', 'route' => array('sync.update', $sync->id), 'role' => 'form', 'class' => 'form-narrow')) }}
	@include('sync.form')
	<a data-toggle="modal" href="#confirm-delete-modal" class="btn btn-danger pull-right">Delete</a>
	{{ Form::submit('Update Sync', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

<!-- Modal -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this Sync?
			</div>
			<div class="modal-footer">
				{{ Form::model($sync, array('method' => 'DELETE', 'route' => array('sync.destroy', $sync->id))) }}
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger">Delete</button>
				{{ Form::close() }}
			</div>
		</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop


