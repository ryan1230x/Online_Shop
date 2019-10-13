<?php
$username = "ryan123";
$db_name = "wjgarments";
$host = "127.0.0.1";
$db_password = "ryan123";
$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

// Connection to database
try {
    $conn = new PDO($dsn, $username, $db_password);

} catch(PDOException $e) {
    echo("Connection failed ".$e->getMessage());
}

?>