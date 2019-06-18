<?php

// Check to see if the user click on the sumbit btn
if(isset($_POST['submit-btn'])){
    // Include conection to the database
    require_once '../config/dbh.php';

    ############################################
    // Declare Variables to store users input
    #############################################
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $password_repeat = $_POST['pwd-repeat'];    

    ###################################
    // Error handlers
    ###################################

    // Checks to see if the user has sumbmitted data through the form
    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }

    // Check to see if the email and the username is invalid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]/", $username)){
        header("Location: ../signup.php?error=invalidmail&username=".$username);
        exit();
    }

    // Check the Email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }

    // Check the username has valid Characters to prevent Injection
    if(!preg_match("/^[a-zA-Z0-9]/", $username)){
        header("Location: ../signup.php?error=invalidusername".$username);
        exit();
    }

    // Check to see if both Password match
    if($password !== $password_repeat){
        header("Location: ../signup.php?error=passwordcheck&usermame".$username."&email=".$email);
        exit();
    } else {

        ########################################################
        /* Check if there are any users with the same username */
        ########################################################
        
        $query= "SELECT username FROM users WHERE username=?;";
        $stmt = $conn->stmt_init();

        if(!$stmt->prepare($query)) {
            header("Location: ../signup.php?error");
            exit();

        }

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $stmt->store_result();
        $result = $stmt->num_rows;

        if($result > 0) {
            header("Location: ../signup.php?error=usenametaken");
            exit();
        }

        #############################################################################
        /* If there are no users with that username insert into the db */
        ############################################################################
        
        $query = "INSERT INTO users(username, email, password) VALUES(?, ?, ?)";
        $stmt = $conn->stmt_init();

        if(!$stmt->prepare($query)) {
            header("Location: ../signup.php?error");
            exit();
        }
        
        $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param("sss", $username, $email, $pwdHashed);
        $stmt->execute();
        $row = $stmt->get_result();

        session_start();
        $_SESSION['userId'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION["email"] = $row['email'];
        header("Location: ../signin.php?signup=success");
        exit();
    }
    $stmt->close();
    $conn->close();

} else {
    header("Location: ../signup.php");
    exit();
}