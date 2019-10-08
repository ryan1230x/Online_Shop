<?php
if(isset($_POST["login_btn"])) {

    // // Include the database connection
    require_once '../PDOconfig/dbh.php';    

    // // Declare variables
    $mailuid = $_POST["username"];
    $password = $_POST["password"];

    // // Error handlers
    if(empty($mailuid) || empty($password)) {
        header("Location: ../signin.php?error=emptyfields");
        exit();
    }
    // //Select all users from the table where, username or email match users input
    $query = "SELECT * FROM users WHERE username=? OR email=?;";
    $stmt = $conn->prepare($query);
    $stmt->execute([$mailuid, $mailuid]);

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pwdCheck = password_verify($password, $row["password"]);
        $userCheck = $row["username"];

        if($mailuid === $userCheck && $pwdCheck === true) {
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
    } else {
        header("Location: ../signin.php");
        exit();        
    }
} else {
    header("Location:../signin.php");
    exit();
}

?>