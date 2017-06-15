<?php
require_once('DB.class.php');
class Country{

	private $conn;
	
	public function __construct(){
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}

	public function getAllCountry(){
		$stmt = $this->conn->prepare('SELECT id_country,name FROM country');
		$stmt->execute();
	   	return $stmt;  
	}
	

	
}

