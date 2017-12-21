<?php

namespace Library;

use PDO;

class DbConnect
{
	private $host;
	private $dbname;
	private $username;
	private $password;
	private $pdo;
	private $stmt;

	function __construct()
	{
		try{
			$this->host= __HOST;
			$this->dbname=__DBNAME;
			$this->username=__USERNAME;
			$this->password=__PASSWORD;

			$this->pdo = new \PDO("mysql:host=".$this->host.";
			dbname=".$this->dbname.";", $this->username,$this->password);
			$this->stmt=null;
		}
		catch(\Exception $ex)
		{
			throw $ex;
		}
	}

	function execute($query, $data=null)
	{
		$this->stmt = $this->pdo->prepare($query);
		if(!is_null($data)){
			$result = $this->stmt->execute($data);
		}else
		{
			$result = $this->stmt->execute();
		}
		if(!$result){
			$err = $this->stmt->errorInfo();
			$this->error = $err[2];
		}
		return $result;
	}


	function insert($query, $data)
	{
		return $this->execute($query,$data);
	}

	function view($query)
	{
		$result= $this->execute($query);
		if (!$result){
			return null;
		}
		$data=$this->stmt->fetchAll();
		return $data;
	}

	function update($query, $data)
	{
		return $this->execute($query, $data);
	}

	function delete($query)
	{
		return $this->execute($query);
	}

	protected function dd($d) {
		echo '<br>';
		var_dump($d);
		echo '</br>';
		die();

	}
}
