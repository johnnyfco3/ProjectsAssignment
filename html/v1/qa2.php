<?php
session_start();
require "config.php";
error_reporting(0);
?>

<!DOCTYPE html>
<style>
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
    .searchbar input{
      width: 80%;
    }
    .searchbar button{
        margin-left: 15px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Medicinal Plants</title>
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
<div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4">Question and Answer</p>
        <p class="subtitle is-6">Ask Away!</p>
      </div>
    </div>

    <div class="content">
      <form action="result2.php" method="post" class="container-fluid">
          <div class="searchbar">
            <input class="input is-rounded is centered" type="text" name="question" placeholder="Enter a question in lowercase">
            <button type="submit" name="search" class="button is-primary is-outlined is-rounded">Search</button>
          </div>
      </form>
    </div>
  </div>
  </div>

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