<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    # included session
    session_start();

    # included db connection
    require_once 'PDOconfig/dbh.php';

    # Put User input in variable + sanitize
    $email = $_POST["userEmail"];

    # Query the db + Init prepared statements
    $query = "INSERT INTO newsletter(email) VALUES(?)";

    $stmt = $conn->prepare($query);
    $stmt->execute([$email]);
}
else {
    header("Location: ../index.php");
    exit();
}
