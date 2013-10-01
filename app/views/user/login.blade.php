@extends('layouts.default')

@section('title')
Login ::
@parent
@stop

@section('content')
{{ Form::open(array('url' => URL::to('user/login'), 'role' => 'form', 'class' => 'form-narrow')) }}
	<div class="page-header">
		<h1>Login</h1>
	</div>
	<div class="form-group">
		{{ Form::label('email') }}
		{{ Form::text('email', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<label class="checkbox">
		<input type="checkbox" value="remember-me"> Remember me
	</label>
	{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
	<a href="forgot" class="pull-right">Forgot Password</a>
{{ Form::close() }}
@stop
