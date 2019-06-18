<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    # included session
    session_start();

    # included db connection
    require_once 'config/dbh.php';

    # Put User input in variable + sanitize
    $email = $conn->real_escape_string($_POST["userEmail"]);

    # Query the db + Init prepared statements
    $query = "INSERT INTO newsletter(email) VALUES(?)";

    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

}
// else {
//     header("Location: ../index.php");
//     exit();
// }
