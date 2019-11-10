<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include_once '../config/Database.php';
include_once '../models/Products.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {

    # Instanciate a database connection
    $database = new Database();
    $db = $database->connect();

    # Instanciate a Product Object
    $product = new Products($db);

    # Create a Product
    $product->create();
    print_r($data);
}