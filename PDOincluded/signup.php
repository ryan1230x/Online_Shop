<?php

// Check to see if the user press the submit button
if(isset($_POST["submit-btn"])) {

    // // Include the database connection
    require_once '../PDOconfig/dbh.php';

    // // Declare Variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_repeat = $_POST['pwd-repeat'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // // Eror handlers
    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }

    // // Check to see if the email and the username is invalid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]/", $username)){
        header("Location: ../signup.php?error=invalidmail&username=".$username);
        exit();
    }

    // // Check the Email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }

    // // Check the username has valid Characters to prevent Injection
    if(!preg_match("/^[a-zA-Z0-9]/", $username)){
        header("Location: ../signup.php?error=invalidusername".$username);
        exit();
    }

    // // Check to see if both Password match
    if($password !== $password_repeat){
        header("Location: ../signup.php?error=passwordcheck&usermame".$username."&email=".$email);
        exit();
    }    

    // // Check if there are any users with the same username
    $query = "SELECT username FROM users WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);

    // // Check if the username is taken
    if($stmt->rowCount() > 0) {
        header("Location: ../signup.php?error=usenametaken");
        exit();        
    }

    // // If there are no users with that username insert into the database
    $query = "INSERT INTO users(username, email, password) VALUES(?,?,?)";
    $stmt = $conn->prepare($query)->execute([$username, $email, $password_hash]);
    
    session_start();
    $_SESSION['userId'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION["email"] = $row['email'];

    header("Location: ../signin.php?signup=success");
    exit();    

} else {
     header("Location: ../signup.php");
     exit();    
}


?>