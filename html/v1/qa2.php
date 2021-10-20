<?php
session_start();
require "config.php";
error_reporting(0);
?>

<!DOCTYPE html>
<style>
  .navbar-brand {
    font-size: 25px;
    font-family: fantasy;
  }

  .navbar-menu {
    font-family: 'Amatic SC', cursive;
    font-family: 'Roboto Condensed', sans-serif;
    font-weight: bold;
  }

  .box {
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 40px;
  }

  .media-content p {
    text-align: center;
  }

  .searchbar input {
    width: 80%;
  }

  .searchbar button {
    margin-left: 15px;
  }

  .title {
    font-family: 'Cinzel', serif;
  }

  .p {
    border-style: double;
  }

  .hero {
    border-width: 10px;
    border-style: double;
  }

  .field {
    border-style: groove;
    border-width: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .subtitle {
    font-family: 'Cinzel', serif;
    font-family: 'Noto Sans Mono', monospace;

  }
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Noto+Sans+Mono:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">


  <title>Medicinal Plants</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap');
  </style>
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

          <a class="navbar-item" href="qa2.php">
            Medicinal Plants
          </a>
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
  <section class="hero is-success">
    <div class="hero-body">
      <p class="title">
        Question & Answer
        <i class="fas fa-seedling fa-1x"></i>
      </p>

      <p class="subtitle">
        Ask a question about plants!
        <img id="gif" src="../files/animations/prethinking.gif" width="100" height="100">


      </p>


    </div>
  </section>
  <br>

  <div class="field">
    <form id="searchform" action="result2.php" method="get" class="container-fluid" onsubmit="changeImage();">
      <div class="searchbar">
        <i class="far fa-lightbulb fa-2x"></i>
        <i class="fas fa-grin-alt fa-2x fa-flip"></i>
        <input class="input is-rounded is centered" type="text" name="question" placeholder="Enter a question in lowercase. If you want multiple plants, separate with comma." style="padding-right:10px;">
        <button type="submit" name="search" class="button is-primary is-outlined is-rounded" onclick="changeImage();">Search</button>
        <i class="fas fa-spinner fa-pulse fa-2x"></i>
      </div>
    </form>
  </div>
  </div>
  </div>
  <script src="https://kit.fontawesome.com/c7451615db.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
    const VM = {
      data() {
        return {
          navBarIsActive: false,
        }
      }
    }

    Vue.createApp(VM).mount('.nav')

    function changeImage() {
      document.getElementById("gif").src = "../files/animations/postthinking.gif"
    }
    //setTimeout(() => $("#searchform").submit(), 5000);


/*$('form').on('submit', function(e) {
      var form = this;
      setTimeout(function() {
        form.submit();
        
     
      }, 2000);
      return false;
    });*/
  </script>
</body>

</html>