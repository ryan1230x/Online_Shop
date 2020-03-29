<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

    // include database connection
    require_once "../PDOconfig/dbh.php";

    // Validate email address
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if($email === FALSE) {
        echo json_encode(array(
            'message' => 'Please use a valid email address'
        ));
    } 

    // sanitize the user_email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Insert into newsletter table
    $query = "INSERT INTO newsletter(user_email, subscription_status) VALUES(?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$email, "Active"]);
    
    echo json_encode(array(
        'message' => 'Thanks for Subscribing!'
    ));

}