@extends('layouts.default')

@section('title')
Reset Password ::
@parent
@stop

@section('content')
{{ Form::open(array('url' => URL::to('user/reset'), 'role' => 'form', 'class' => 'form-narrow')) }}
	<div class="page-header">
		<h1>Reset Password</h1>
	</div>
	{{ Form::hidden('token', $token) }}
	<div class="form-group">
		{{ Form::label('password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password_confirmation') }}
		{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
	</div>
	{{ Form::submit('Continue', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
