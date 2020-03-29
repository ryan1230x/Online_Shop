<?php
$username = "";
$db_name = "";
$host = "localhost";
$db_password = "";
$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

// Connection to database
try {
    $conn = new PDO($dsn, $username, $db_password);

} catch(PDOException $e) {
    echo("Connection failed ".$e->getMessage());
}

?>
