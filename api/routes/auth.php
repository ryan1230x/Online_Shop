<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
include_once '../config/Database.php';
include_once '../models/Auth.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {

    # instanciate database
    $database = new Database();
    $db = $database->connect();

    # Instanciate Auth Obj
    $auth = new Auth($db);

    # Call login Method
    $auth->login();
}