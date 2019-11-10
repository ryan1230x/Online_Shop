<?php
session_start();
if(!isset($_SESSION["username"])) header("Location: signin.php");
require_once 'config/dbh.php';
echo '
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
<!-- Playfair Display -->
<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
<link href="css/master.css" rel="stylesheet">
<!-- Address Bar Color -->
<meta name="theme-color" content="#4b636e"/>
<title>WJGarments</title>
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
      <li><a href="productsView.php"><i class="material-icons">edit</i>Products</a></li>';
      if(isset($_SESSION["username"])) 
      echo '
      <li>
      <a href="../index.php"><i class="material-icons">arrow_back</i>Shop</a>
      </li>
      <li>
        <a href="included/signout.php"><i class="material-icons">logout</i>Logout</a>
      </li>';       
      echo '        
      <div class="sleeve"></div>
    </ul>
  </div>
</nav>';
?>