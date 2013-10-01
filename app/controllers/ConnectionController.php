<?php

class ConnectionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$connections = Connection::orderBy('con_name')->get();
		return View::make('connection.index', compact(array('connections')));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('connection.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$connection = new Connection();
		$connection->con_name = Input::get('con_name');
		$connection->con_host = Input::get('con_host');
		$connection->con_database = Input::get('con_database');
		$connection->con_user = Input::get('con_user');
		$connection->con_password = Input::get('con_password');
		$connection->save();
		return Redirect::route('connection.index')
				->with('success', 'A new connection added.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$connection = Connection::findOrFail($id);
		return View::make('connection.edit', array('connection' => $connection));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$connection = Connection::findOrFail($id);
		$connection->con_name = Input::get('con_name');
		$connection->con_host = Input::get('con_host');
		$connection->con_database = Input::get('con_database');
		$connection->con_user = Input::get('con_user');
		$connection->con_password = Input::get('con_password');
		$connection->save();
		return Redirect::route('connection.index')
				->with('success', 'A connection has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$connection = Connection::findOrFail($id);
		$connection->delete();
		return Redirect::route('connection.index')
				->with('success', 'A connection has been deleted.');
	}

}