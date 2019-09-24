<?php
// Start session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connection to database
  require_once "PDOconfig/dbh.php";

  // Declare variable
  $size = $_POST["size"];
  $color = $_POST["color"];
  $itemId = $_POST["item"];

  // Session variables
  $user = $_SESSION["username"];

  $query = "INSERT INTO shoppingCart(product_id, username, size, color) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($query);
  $stmt->execute([$itemId, $user, $size, $color]);
  

} else {
  header("Location: index.php");
  exit();
}
