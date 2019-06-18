<?php
//make sure if the user pressed on the button
if(isset($_POST['login_btn'])) {

    //include database connection
    require_once '../config/dbh.php';

    ####################################
    //define variable
    ###################################
    $mailuid = $_POST['username'];
    $password = $_POST['password'];

    ####################################
    //error handlers
    ####################################

    // Check if the fields are empty
    if(empty($mailuid) || empty($password)) {
        header("Location: ../signin.php?error=emptyfields");
        exit();

    } else {
        ###########################################################################
        /* Select all from users table where username or email matches user input*/
        ############################################################################

        $query = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = $conn->stmt_init();

        if(!$stmt->prepare($query)) {
            header("Location: ../signin.php?error=error");
            exit();

        }
        $stmt->bind_param("ss", $mailuid, $mailuid);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            $pwdCheck = password_verify($password, $row["password"]);
            $userCheck = $row["username"];

            if($mailuid === $userCheck && $pwdCheck == TRUE) {

                session_start();
                $_SESSION['userId'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../index.php?login=sucess");
                exit();
            } else {
                header("Location: ../signin.php?error=wrongpwd");
                exit();
            }
        }                
    }
} else {
    header("Loction: signin.php");
    exit();
}