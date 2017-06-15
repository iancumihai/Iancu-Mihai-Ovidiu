<?php
require_once('DB.class.php');
class Register{

	private $conn;
	
	public function __construct(){
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}

	public function registerUser($first_name,$last_name,$gender,$id_country,$email,$phone,$password){
		$new_password = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->conn->prepare("INSERT INTO users(first_name,last_name,gender,id_country,email,phone,password) 
		                                               VALUES(:first_name,:last_name,:gender,:id_country,:email,:phone,:password)");

		$stmt->bindparam(":first_name", $first_name);
		$stmt->bindparam(":last_name", $last_name);
		$stmt->bindparam(":gender", $gender);
		$stmt->bindparam(":id_country", $id_country);
		$stmt->bindparam(":email", $email);
		$stmt->bindparam(":phone", $phone);
		$stmt->bindparam(":password", $new_password);										  
				
		$stmt->execute();	
			
		return $stmt;	
	}	
}

