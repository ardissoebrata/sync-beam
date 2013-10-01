<?php
class Sync {
	
	/**
	 * 
	 * @var array 
	 */
	private $response = array();
	
	private $mysqli;
	
	/**
	 *
	 * @var string
	 */
	private $command = '';

	public function __construct()
	{
		$this->command = $this->get('command');
		switch($this->command) {
			case 'test' :
				$this->test_connection();
				break;
		}
	}
	
	function test_connection()
	{
		if ($this->connect())
		{
			$result = mysqli_query($this->mysqli, "SHOW TABLES");
			if ($result) 
			{
				$this->response['type'] = 'success';
				$this->response['message'] = 'Connection Success!!';

				/* free result set */
				mysqli_free_result($result);
			}
			else
			{
				$this->response['type'] = 'error';
				$this->response['message'] = 'Connect Error: Can\'t SHOW TABLES';
			}
			mysqli_close($this->mysqli);
		}

		$this->response_json();
	}
	
	private function connect()
	{
		$database = $this->get('con_database');
		$user = $this->get('con_user');
		$password = $this->get('con_password');

		$this->mysqli = @mysqli_connect('localhost', $user, $password, $database);

		if (!$this->mysqli) 
		{
			$this->response['type'] = 'error';
			$this->response['message'] = 'Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
			return false;
		}
		return true;
	}
	
	private function get($key)
	{
		if (isset($_GET[$key]))
			return $_GET[$key];
		else
			return '';
	}
	
	private function response_json()
	{
		header('Content-Type: application/json; charset=utf-8');
		if (isset($_GET['callback']))
			echo $_GET['callback'] . '(' . json_encode ($this->response) . ')';
		else
			echo json_encode($this->response);
	}
}

$sync = new Sync();
