@extends('layouts.default')

@section('title')
Edit Connection ::
@parent
@stop

@section('content')
<div class="page-header form-narrow">
	<a href="{{ URL::route('connection.index') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
	<h1>Connection</h1>
</div>
{{ Form::model($connection, array('method' => 'PATCH', 'route' => array('connection.update', $connection->id), 'role' => 'form', 'class' => 'form-narrow')) }}
	@include('connection.form')
	<a data-toggle="modal" href="#confirm-delete-modal" class="btn btn-danger pull-right">Delete</a>
	{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
	{{ Form::button('Test', array('id' => 'btn-test-connect', 'class' => 'btn btn-default', 'data-loading-text' => 'Connecting...')) }}
{{ Form::close() }}

@include('modal', array('modal_id' => 'confirm-delete-modal', 'modal_title' => 'Confirm Delete', 'modal_body' => 'Are you sure you want to delete this Connection?', 'modal_footer' => Form::model($connection, array('method' => 'DELETE', 'route' => array('connection.destroy', $connection->id))) . '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' . '<button type="submit" class="btn btn-danger">Delete</button>' . Form::close() ))

@include('modal', array('modal_id' => 'test-result-modal', 'modal_title' => 'Connection Test Result', 'modal_body' => '', 'modal_footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' ))

@stop
