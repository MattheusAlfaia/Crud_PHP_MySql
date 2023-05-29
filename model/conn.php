<?php
class MysqlConnection extends PDO{
	private $Host;
	private $User;
	private $Password;
	private $Schema;
	public  $MySql;
	
	function __construct(){	
		$this->Host = "localhost";
		$this->User = "root";
		$this->Password = "";
		$this->Schema = "amais_desafio";
		$this->StartConnection();	
	}	
	
	protected function StartConnection(){
		header('Content-Type: text/html; charset=utf-8');
		try{
			@$this->MySql = new PDO("mysql:host={$this->Host};dbname={$this->Schema}", $this->User, $this->Password);
			$this->MySql->exec("SET CHARACTER SET utf8mb4");
			$this->MySql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die(utf8_encode($e->getMessage()));
		}
		
	}

}
?>
