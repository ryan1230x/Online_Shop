<?php

# Create Database class
class Database {

# Create function to connect to database	
public function connect() {
	$this->conn = null;
	$dsn = "mysql:host=127.0.0.1;dbname=wjgarments;charset=utf8mb4";
	$user = "ryan123";
	$pass = "ryan123";
	try {
			$this->conn = new PDO($dsn, $user, $pass);			

	} catch (PDOException $e) {
		echo "connection failed: ".$e->getMessage();
	}
	
	return $this->conn;
}

}