@extends('layouts.default')

@section('title')
Syncs ::
@parent
@stop

@section('styles')
@parent
<style>
	
</style>
@stop

@section('content')
<div class="page-header">
	<a href="{{ URL::route('sync.create') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Add New Sync</a>
	<h1>Syncs</h1>
</div>
<div class="row">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Source</th>
				<th>Target</th>
			</tr>
		</thead>
		<tbody>
			@if ($syncs->count() > 0)
			@foreach ($syncs as $sync) 
			<tr>
				<td><a href="{{ URL::route('sync.edit', array($sync->id)) }}">{{ $sync->name }}</a></td>
				<td>{{ $sync->source->con_name }}</td>
				<td>{{ $sync->target->con_name }}</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="3">
					No Sync listed.
				</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
@stop
