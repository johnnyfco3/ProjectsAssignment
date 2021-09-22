<?php

session_start();
require "config.php";
error_reporting(0);




?>

<!DOCTYPE html>
<style>

  table,th,td{

    border: 3px solid black;
    width:1200px;
    background-color: silver;
  }
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
    .box{
        text-align: center;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 40px;
    }
    .media-content p{
        text-align: center;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Knowledge Base</title>
</head>
<body>
<!--Navbar-->
<div class="nav">
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
    <a class="navbar-item" href="home.php">Knowledge Base</a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" :class="{ 'is-active' : navBarIsActive }" @click="navBarIsActive = !navBarIsActive">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-menu" :class="{ 'is-active' : navBarIsActive }">
    <div class="navbar-start">
      <a class="navbar-item" href="home.php">
        Home
      </a>

      <a class="navbar-item" href="qa.php">
        Medicinal Plants
      </a>

      <a class="navbar-item" href="quiz.php">
        Pop Quiz
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="about.php">
            About
          </a>
          <a class="navbar-item" href="#">
            Contact
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="login.html">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
</div>
<!--Main Content-->
<div class="container-fluid">
 <h2>
  <strong>Browse:</strong>
 </h2>
</div>
<div class="container-fluid">
   <h3>
     Medicinal Plants
  </h3>
</div>

<strong>
<div class="container-fluid">Enter an ID number to bring up the corresponding Plant Data!</div>
</strong>
<form action="result1.php" method="post" class="container-fluid">
  <input type="text"  name="id" placeholder="enter a ID number" style="width:400px;height:75px">
  <input type="submit" name="search">


  


  </form>

<script src="https://unpkg.com/vue@next"></script>
<script>
        
        const VM = {
          data() {
            return {
              navBarIsActive: false,  
            }
          }
        }

        Vue.createApp(VM).mount('.nav')
      </script>
</body>

</html>