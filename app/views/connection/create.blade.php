@extends('layouts.default')

@section('title')
Add Connection ::
@parent
@stop

@section('content')
<div class="page-header form-narrow">
	<a href="{{ URL::route('connection.index') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
	<h1>Add Connection</h1>
</div>
{{ Form::open(array('route' => 'connection.store', 'role' => 'form', 'class' => 'form-narrow')) }}
	@include('connection.form')
	{{ Form::submit('Create New Connection', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
