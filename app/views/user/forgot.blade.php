@extends('layouts.default')

@section('title')
Forgot Password ::
@parent
@stop

@section('content')
{{ Form::open(array('url' => URL::to('user/forgot'), 'role' => 'form', 'class' => 'form-narrow')) }}
	<div class="page-header">
		<h1>Forgot Password</h1>
	</div>
	<div class="form-group">
		{{ Form::label('email') }}
		{{ Form::text('email', null, array('class' => 'form-control')) }}
	</div>
	{{ Form::submit('Continue', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
