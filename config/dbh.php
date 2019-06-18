<?php 

/* 
* Make connection to MySQL database using mysqli Object Oritentated.
*/

// uname is ryan123 and pwd is the same

$username = "ryan123";
$db_name = "wjgarments";
$servername = "localhost";
$db_password = "ryan123";

// Connect to database

$conn = mysqli_connect($servername, $username, $db_password,$db_name);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>