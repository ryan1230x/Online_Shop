<?php
class Auth {

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
    
    function login() {

        $data = json_decode(file_get_contents('php://input'), true);

        # Clean data
        $this->username = htmlspecialchars(strip_tags(trim($data["username"])));
        $this->password = htmlspecialchars(strip_tags(trim($data["password"])));

        # Error Handling
        if(empty($this->username) || empty($this->password)) {
            echo json_encode(array('message' => 'Please fill all fields'));
            exit();
        }

        # Query the database
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);

        # Bind Param
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->password_check = password_verify($this->password, $row["password"]);
            $this->username_check = $row["username"];

            if($this->username === $this->username_check && $this->password_check === TRUE) {
                session_start();                
                $_SESSION['username'] = $row["username"];                  
                echo json_encode(array(
                    'message' => 'user logged in',
                    'username' => $_SESSION["username"],                    
                ));
                exit();

            } else {
                echo json_encode(array('message' => 'Incorrect Password'));
                exit();
            }

        } else {
            echo json_encode(array('message' => 'Please Use your Crediantals'));
            exit();
        }        
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        echo json_encode(array('message' => 'Logged Out'));
        exit();
    }
}
