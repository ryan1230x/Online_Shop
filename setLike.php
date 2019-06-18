<?php
// Start session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Connection to database
  require_once "config/dbh.php";

  // Declare variable
  $itemId = $_POST["item"];
  $user = $_SESSION["username"];

  // Select the correct user from the user table
  $sql = "INSERT INTO wishlist(username, product_id) VALUES(?,?)";

  //prepare the statement
  $stmt = mysqli_stmt_init($conn);

  //Error handling the statement
  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location : index.php?error");
    exit();
  } else {

    // If here are no error, execute this code to insert data in the database
    mysqli_stmt_bind_param($stmt, "si", $user, $itemId);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} else {
  header("Location: index.php");
  exit();
}