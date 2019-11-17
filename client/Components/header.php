<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="theme-color" content="#222">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">  
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/view.css">
  <title>Online Store | Home</title>
</head>
<body>
  <!-- Header Start -->
  <header>
  <nav>
  <div class="nav-wrapper">     
    <a href="#!" data-activates="slide-out" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>   
    <div class="d-flex justify-end ml-auto" id="nav-icons">
      <?php
      if (isset($_SESSION["username"])) echo '<span>Hello, '.$_SESSION["username"].'</span>';      
      ?>
      <a href="#loginModal" class="modal-trigger" style="margin-left:10px;">
        <i class="material-icons" 
          style="display:flex;justify-content:center;">person</i>
      </a>            
    </div>   
    <ul id="slide-out" class="side-nav fixed">
    <li>
      <div class="user-view" style="height:200px;">
        <div class="background" style="height:200px;">
          <a href="index.php" style="padding:0">
            <img src="https://i.pinimg.com/originals/92/0b/3d/920b3d90f07d4f56b37e2d8768d73422.jpg" width="300" height="200">
          </a>
        </div>            
      </div>
    </li>
    <li style="padding: 0 32px">
      <form action="#" method="post">
      <div class="input-field" style="display:flex;justify-content:center;">
        <input type="text" name="q" id="nav-search" placeholder="Search..."  />
      </div>
      </form>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordian">
        <li>
          <a class="collapsible-header">Option 1
            <i class="material-icons">arrow_drop_down</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Option 1</a></li>
              <li><a href="#">Option 2</a></li>
              <li><a href="#">Options 3</a></li>
              <li><a href="#">Option 4</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordian">
        <li>
          <a class="collapsible-header">Option 2
            <i class="material-icons">arrow_drop_down</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Options 1</a></li>
              <li><a href="#">Options 2</a></li>
              <li><a href="#">Options 3</a></li>
              <li><a href="#">Options 4</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordian">
        <li>
          <a class="collapsible-header">Option 3
            <i class="material-icons">arrow_drop_down</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Option 1</a></li>
              <li><a href="#">Option 2</a></li>
              <li><a href="#">Option 3</a></li>
              <li><a href="#">Option 4</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li>
      <a href="#" style="padding: 0 15px;">Deal
        <i class="material-icons">whatshot</i>
      </a>
    </li>
    <?php
    if ($_SESSION["username"] === 'Admin') echo '
    <li>
      <a href="AdminPortal" style="padding: 0 15px" id="portalBtn">AdminPortal
        <i class="material-icons">supervisor_account</i>
      </a>
    </li>';
    if($_SESSION["username"]) echo'
    <li>
      <a href="#" style="padding: 0 15px;" id="logout-btn">Logout
        <i class="material-icons">logout</i>
      </a>
    </li>'
    ?>
  </ul>
  </div>
  </nav>
</header>
  <!-- Header End -->