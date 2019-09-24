<?php
session_start();
if(!isset($_SESSION["username"]))
{
  header("Location: signin.php");
}
require_once 'PDOconfig/dbh.php';
echo <<<_end
<!DOCTYPE html>
  <html>
    <head>
      <meta name="theme-color" content="#ee6e73">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <style>
        .mb-top{margin-top:7%;}
      </style>
    </head>
    <body>
      <nav>
        <div class="nav-wrapper">
          <a href="admindashboard.php" class="brand-logo center">WJGarments</a>
        </div>
      </nav>
_end;
