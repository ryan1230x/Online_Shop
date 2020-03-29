<?php
$username = "u122331496_ryan_shop";
$db_name = "u122331496_online_shop";
$host = "localhost";
$db_password = "r.harp3r";
$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";



// Connection to database
try {
    $conn = new PDO($dsn, $username, $db_password);

} catch(PDOException $e) {
    echo("Connection failed ".$e->getMessage());
}

?>