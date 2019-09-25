<?php
 require_once 'PDOconfig/dbh.php';
echo <<<_end
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
  <!-- Address Bar Color -->
  <meta name="theme-color" content="#f5f5f5"/>
<style media="screen">
html, body {
    background-color: #f0f0f0;
  font-family: \'Crimson Text\', serif;
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
    <title>Document</title>
</head>

<body>

<nav>
  <div class="nav-wrapper white">
    <a href="index.php" class="brand-logo black-text center">WJGarments</a>
    <a href="#" data-activates="mobile-menu" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <ul class="side-nav" id="mobile-menu">
      <li style="margin:7.5px;"><a href="index.php"><span class="left-text" style="font-size:1.75em;">WJGarments</span></a></li>
      <li class="divider"></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="mobile.html">Deals</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordian">
          <li><a class="collapsible-header" style="padding:0 32px;">Men</a>
            <div class="collapsible-body">
              <ul>
                <li class="divider"></li>
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
          <li><a class="collapsible-header" style="padding:0 32px;">Woman</a>
            <div class="collapsible-body">
              <ul>
                <li class="divider"></li>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li class="divider"></li>
      <li><a href="signin.php">Register / Sign In</a></li>
    </ul>
  </div>
</nav>
<body>
  <main>
    <div class="row" id="box" style="margin-top:5em;">
      <div class="container">
        <form action="PDOincluded/signup.php" method="post" class="col s12 center-align">
        <h4>Register</h4>
        <div class="input-field col s12">
          <input type="text" name="username" id="username">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s12">
          <input type="email" name="email" id="email">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input type="password" name="pwd" id="pwd">
          <label for="password">Password</label>
        </div>
        <div class="input-field col s12">
          <input type="password" name="pwd-repeat" id="pwd-repeat">
          <label for="pwd-repeat">Confirm Password</label>
        </div>
        <p style="padding: 0 .75em;">Already have an account? <a href="signin.php">Click Here</a></p>            
        <button type="submit" class="btn waves-effect black" name="submit-btn">signup</button>
      </form>
    </div>
  </div>
</main>
_end;
require_once 'required/footer.php';
