<?php
session_start();
if(!isset($_SESSION["username"])) header("Location: signin.php");
require_once 'config/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Material icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="./dist/css/style.min.css" rel="stylesheet">
<!-- Address Bar Color -->
<meta name="theme-color" content="#4b636e"/>
<title>Online Shop | Administration Portal</title>
</head>

<body>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo black-text"></a>
    <a href="#" data-activates="mobile-menu" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <ul class="side-nav fixed" id="mobile-menu">
      <li style="margin:7.5px;">
        <a href="index.php">
        <span class="left-text" style="font-size:1.75em;">AdminPortal</span>        
        </a>
      </li>
      <li class="divider"></li>      
      <li class="m-top"><a href="index.php"><i class="material-icons">home</i>Home</a></li>
      <li><a href="product-view.php"><i class="material-icons">edit</i>Products</a></li>
      <?php
      if(isset($_SESSION["username"])) 
      echo '
      <li>
      <a href="../index.php"><i class="material-icons">arrow_back</i>Shop</a>
      </li>
      <li>
        <a href="included/signout.php"><i class="material-icons">logout</i>Logout</a>
      </li>';
      ?>                     
      <div class="sleeve"></div>
    </ul>
  </div>
</nav>
<body>