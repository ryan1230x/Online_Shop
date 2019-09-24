<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    session_start();
    
    # Included the db connection
    require_once 'PDOconfig/dbh.php';
    
    # Declare variables for items
    $item = $_POST["item"];
    $color = $_POST["color"];
    $size = $_POST["size"];
    $address = $_POST["address"];
    $town = $_POST["town"];
    $number = $_POST["mob"];

    # Variables for tokens
    $token = random_bytes(10);
    $token_hash = bin2hex($token);

    # Session variables
    $user = $_SESSION["username"];

    


    
} else {
    header("shopping-cart.php");
    exit();
}



?>