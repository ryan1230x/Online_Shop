<?php

# Create Database class
class Database {

# Create function to connect to database	
public function connect() {
	$this->conn = null;
	$dsn = "mysql:host=localhost;dbname=u122331496_online_shop;charset=utf8mb4";
	$user = "u122331496_ryan_shop";
	$pass = "r.harp3r";
	try {
			$this->conn = new PDO($dsn, $user, $pass);			

	} catch (PDOException $e) {
		echo "connection failed: ".$e->getMessage();
	}
	
	return $this->conn;
}

}