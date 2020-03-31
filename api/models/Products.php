<?php
class Products {
    private $conn;
	private $product_id;
	private $user;
	

    # Create Contructor function
    # Database connection
    function __construct($db) {
        $this->conn = $db;
    }   

	//Add to Wishlist
	public function addWishlist() {
		
		//Get the form data in JSON 
		$data=json_decode(file_get_contents('php://input'), true);
	
		//GET THE FORM DATA
		$this->product_id=$data["product_id"];
		$this->user=$data["user"];
		
		
		//CHECK THE USERNAME EXISTS IN THE DATABASE
		$query="SELECT username FROM users WHERE username=:username";
		$stmt=$this->conn->prepare($query);
		//BIND DATA TO NAMED PARAMETER
		$stmt->bindValue(":username", $this->user);
		$stmt->execute();
		if($stmt->rowCount() < 0) {
			echo json_encode(array("Message"=>"The username does not exist"));
			exit();
		} elseif(empty($this->user)) {
			echo json_encode(array("Message"=>"Please sign in to add to wishlist"));
			exit();
		}
		
		//CHECK THE PRODUCT_ID EXISTS
		$query="SELECT product_id FROM products_info WHERE product_id=:product_id";
		$stmt=$this->conn->prepare($query);
		//BIND DATA TO NAMED PARAMETER
		$stmt->bindValue(":product_id", $this->product_id);
		$stmt->execute();
		if(!$stmt->rowCount() > 0) {
			echo json_encode(array("Message"=>"ProductID does not exist"));
			exit();
		}

		//CHECK IF THE PRODUCT ALREADY EXISTS IN THE CURRENT USER WISHLIST
		$query="SELECT * FROM products_wishlist WHERE product_id=:product_id AND user=:user";
		$stmt=$this->conn->prepare($query);
		$stmt->bindValue(":product_id", $this->product_id);
		$stmt->bindValue(":user", $this->user);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			echo json_encode(array("Message"=>"Already In Your Wishlist"));
			exit();
		}

		//INSERT THE DATA INTO THE DATABASE
		$query="INSERT INTO products_wishlist SET product_id=:product_id, user=:user";
		$stmt=$this->conn->prepare($query);
		// BIND DATA TO NAMED PARAMETERS
		$stmt->bindValue(":product_id", $this->product_id);
		$stmt->bindValue(":user", $this->user);
		// EXECUTE
		if($stmt->execute()) echo json_encode(array("Message"=>"Added to Wishlist"));
		else echo json_encode(array("Message"=>"Error! Please try again!"));
	}
    
}
