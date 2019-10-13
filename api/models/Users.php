<?php

class Users {
    
    private $conn;
    private $username;
    private $username_check;
    private $password;
    private $password_repeat;
    private $password_check;
    private $email;

    # Create Construct function with data
    # Database connection
    function __construct($db) {
        $this->conn = $db;
    }
        

    function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        
        # Clean Data
        $this->username = htmlspecialchars(strip_tags(trim($data["username"])));
        $this->email = htmlspecialchars(strip_tags(trim($data["email"])));
        $this->password = htmlspecialchars(strip_tags(trim($data["password"])));
        $this->password_repeat = htmlspecialchars(strip_tags(trim($data["password_repeat"])));


        # Error Handling
        if(empty($this->username) || empty($this->password) || empty($this->email) || empty($this->password_repeat)) {
            echo json_encode(array('message' => 'Please Fill all fields'));
            exit();

        } else if (!filter_var($this->username, FILTER_SANITIZE_STRING)) {
            echo json_encode(array('message' => 'The Username is not valid '));
            exit();

        } else if($this->password !== $this->password_repeat) {
            echo json_encode(array('message' => 'The Passwords do not match'));
            exit();
        }

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);

        # Bind Data
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        if($stmt->rowCount() > 0 ) {
            echo json_encode(array(
                'message' => 'username already taken',
                'original' => $this->username
            ));
        } else {

            $query = "INSERT INTO users 
            SET username = :username, email = :email ,password = :password";

            $stmt = $this->conn->prepare($query);

            # Bind Data
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", password_hash($this->password, PASSWORD_DEFAULT));

            if($stmt->execute()) {
                echo json_encode(array('message' => 'Use Your Credentials To Login'));                
                exit();
            }

            printf("Error: Query could not be executed");
        }
    }
}