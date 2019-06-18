<?php
session_start();
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
<link href="css/product-view.css">
<!-- Address Bar Color -->
<meta name="theme-color" content="#f5f5f5"/>
<style media="screen">
html, body {
  font-family: \'Crimson Text\', serif;
}
header, main, footer, .page-footer {
  padding-left: 240px;
}

@media only screen and (max-width : 992px) {
  header, main, footer {
    padding-left: 0;
  }      
}
.img-height {
height: 393.23px;
}
nav a {
  color: #000;
}
.side-nav {
  width: 240px;
}
nav form {
  width: 200px;
  margin-left: auto;
}
.jumbo {
  padding: 40px 0;
  margin-bottom: 40px;
  background-color: #999;
}
blockquote {
  margin: 20px;
  border-left-color: #999
}
.card-action a {
  color: #000 !important;
}
#section_1, #section_2 {
  margin-bottom: 40px;
}
</style>
    <title>WJGarments</title>
</head>

<body>

<nav>
  <div class="nav-wrapper white">
    <a href="#!" class="brand-logo black-text">WJGarments</a>
    <a href="#" data-activates="mobile-menu" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <ul class="side-nav fixed" id="mobile-menu">
      <li style="margin:7.5px;"><a href="index.php"><span class="left-text" style="font-size:1.75em;">WJGarments</span></a></li>
      <li class="divider"></li>
      <li>
        <a href="index.php">Home
        </a>
      </li>
      <li>
        <a href="mobile.html">Deals
        </a>
      </li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordian">
          <li>
            <a class="collapsible-header" style="padding:0 32px;">Men
            </a>
            <div class="collapsible-body" style="background-color:#e0e0e0;">
              <ul>                
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordian">
          <li>
            <a class="collapsible-header" style="padding:0 32px;">Woman
            </a>
            <div class="collapsible-body" style="background-color:#e0e0e0;">
              <ul>              
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>';
      if(isset($_SESSION["username"])) {
        echo '
        <li class="divider"></li>
        <li>
          <a href="shopping-cart.php">Shopping Cart
          </a>
      </li>
      <li>
          <a href="wishlist.php">Wishlist
          </a>
      </li>
        ';
      }
      echo '
      <li class="divider"></li>';
      if(isset($_SESSION["username"])) {
      echo '
      <li>
        <a href="included/signout.inc.php">Logout
        </a>
      </li>';
      } else {
      echo'
      <li>
        <a href="signin.php">Register / Sign In
        </a>
      </li>';
      }
      echo '        
    </ul>
  </div>
</nav>';
?>