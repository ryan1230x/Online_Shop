<?php
// Start session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connection to database
  require_once "config/dbh.php";

  // Declare variable
  $size = $_POST["size"];
  $color = $_POST["color"];
  $itemId = $_POST["item"];

  // Session variables
  $user = $_SESSION["username"];

  $query = "INSERT INTO shoppingCart(product_id, username, size, color) VALUES (?,?,?,?)";
  $stmt = $conn->stmt_init();
  
  if (!$stmt->prepare($query)) {
    header("Location: index.php");
    exit();
  }

  $stmt->bind_param("isss", $itemId, $user, $size, $color);
  $stmt->execute();
  $stmt->close();
  $conn->close();

} else {
  header("Location: index.php");
  exit();
}
