@extends('layouts.default')

@section('title')
Add Sync ::
@parent
@stop

@section('content')
<div class="page-header form-narrow">
	<a href="{{ URL::route('sync.index') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
	<h1>Add Sync</h1>
</div>
{{ Form::open(array('route' => 'sync.store', 'role' => 'form', 'class' => 'form-narrow')) }}
	@include('sync.form')
	{{ Form::submit('Create New Sync', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
