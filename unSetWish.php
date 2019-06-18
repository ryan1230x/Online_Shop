<?php
// Start session
if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
    # Connetion to db
    require_once 'config/dbh.php';

    # Variables
    $itemId = $_POST["item"];

    # Query the db
    $query = "DELETE FROM wishlist WHERE product_id=? LIMIT 1";
    $stmt = $conn->stmt_init();
    
    if(!$stmt->prepare($query)) {
        exit();
    }
    
    $stmt->bind_param("i", $itemId);
    $stmt->execute();


}
else {
    header("Location: wishlist.php");
    exit();
}