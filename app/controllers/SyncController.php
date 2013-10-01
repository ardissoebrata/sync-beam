<?php

class SyncController extends \BaseController {
	
	/**
	 * Connection Repository
	 * 
	 * @var Connection
	 */
	protected $sync;
	
	public function __construct(Sync $sync = null)
	{
		parent::__construct();
		
		$this->sync = $sync;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$syncs = Sync::orderBy('name')->get();
		return View::make('sync.index', compact(array('syncs')));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$conn_list = array();
		$connections = Connection::orderBy('con_name')->get();
		foreach($connections as $connection) {
			$conn_list['' . $connection->id] = $connection->con_name;
		}
		return View::make('sync.create', array('connections' => $conn_list));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sync = new Sync();
		$sync->name = Input::get('name');
		$sync->source_id = Input::get('source_id');
		$sync->target_id = Input::get('target_id');
		$sync->save();
		return Redirect::route('sync.index')
				->with('success', 'A new sync added.');
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
		$sync = Sync::findOrFail($id);
		
		$conn_list = array();
		$connections = Connection::orderBy('con_name')->get();
		foreach($connections as $connection) {
			$conn_list['' . $connection->id] = $connection->con_name;
		}
		
		return View::make('sync.edit', array('connections' => $conn_list, 'sync' => $sync));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sync = Sync::findOrFail($id);
		$sync->name = Input::get('name');
		$sync->source_id = Input::get('source_id');
		$sync->target_id = Input::get('target_id');
		$sync->save();
		return Redirect::route('sync.index')
				->with('success', 'A sync has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sync = Sync::findOrFail($id);
		$sync->delete();
		return Redirect::route('sync.index')
				->with('success', 'A sync has been deleted.');
	}

}