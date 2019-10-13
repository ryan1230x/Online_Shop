<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
include_once '../config/Database.php';
include_once '../models/Users.php';

# API route for users
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    # Instanciate a Database Obj
    $database = new Database();
    $db = $database->connect();

    # Instaciate a User Obj
    $user = new Users($db);    

    # Create User
    $user->create();
        
}