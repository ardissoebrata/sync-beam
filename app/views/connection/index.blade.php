@extends('layouts.default')

@section('title')
Connections ::
@parent
@stop

@section('styles')
@parent
<style>
	
</style>
@stop

@section('content')
<div class="page-header">
	<a href="{{ URL::route('connection.create') }}" role="button" class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Add New Connection</a>
	<h1>Connections</h1>
</div>
<div class="row">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Host</th>
				<th>Database</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			@if ($connections->count() > 0)
			@foreach ($connections as $connection) 
			<tr>
				<td><a href="{{ URL::route('connection.edit', array($connection->id)) }}">{{ $connection->con_name }}</a></td>
				<td>{{ $connection->con_host }}</td>
				<td>{{ $connection->con_database }}</td>
				<td>{{ $connection->con_user }}</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="4">
					No Connection listed.
				</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
@stop
