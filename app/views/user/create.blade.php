@extends('layouts.default')

@section('title')
Register User ::
@parent
@stop

@section('content')
{{ Form::open(array('url' => URL::to('user'), 'role' => 'form', 'class' => 'form-narrow')) }}
	<div class="page-header">
		<h1>Signup</h1>
	</div>
	<div class="form-group">
		{{ Form::label('username') }}
		{{ Form::text('username', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('email') }}
		{{ Form::text('email', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password_confirmation') }}
		{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
	</div>
	{{ Form::submit('Create New Account', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
