<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Start session
  session_start();
  // Connection to database
  require_once "PDOconfig/dbh.php";

  // Declare variable
  $itemId = $_POST["item"];
  $user = $_SESSION["username"];

  // Select the correct user from the user table
  $sql = "INSERT INTO wishlist(username, product_id) VALUES(?,?)";

  //prepare the statement and execute
  $stmt = $conn->prepare($query);
  $stmt->execute([$user, $itemId]);

} else {
  header("Location: index.php");
  exit();
}