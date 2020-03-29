<?php

# Create Database class
class Database {

# Create function to connect to database	
public function connect() {
	$this->conn = null;
	$dsn = "mysql:host=localhost;dbname=...;charset=utf8mb4";
	$user = "";
	$pass = "";
	try {
			$this->conn = new PDO($dsn, $user, $pass);			

	} catch (PDOException $e) {
		echo "connection failed: ".$e->getMessage();
	}
	
	return $this->conn;
}

}
