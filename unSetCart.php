<?php
// Start session
if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
    # Connetion to db
    require_once 'PDOconfig/dbh.php';

    # Variables
    $itemId = $_POST["item"];

    # Query the db
    $query = "DELETE FROM shoppingCart WHERE product_id=? LIMIT 1";
    $stmt = $conn->prepare($query); $stmt->execute([$itemId]);

}
else {
    header("Location: shopping-cart.php");
    exit();
}