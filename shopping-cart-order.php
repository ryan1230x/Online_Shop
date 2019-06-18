<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    session_start();
    
    # Included the db connection
    require_once 'config/dbh.php';
    
    # Declare variables for items
    $item = $_POST["item"];
    $color = $_POST["color"];
    $size = $_POST["size"];

    # Clients details put in the form
    $address = $conn->real_escape_string($_POST["address"]);
    $town = $conn->real_escape_string($_POST["town"]);
    $number = $conn->real_escape_string($_POST["mob"]);

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