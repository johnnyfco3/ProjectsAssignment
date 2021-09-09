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
    .buttons{
        margin-left: 250px;
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
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
    <a class="navbar-item" href="home.php">Knowledge Base</a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="home.php">
        Home
      </a>

      <a class="navbar-item" href="#">
        Data Structures
      </a>

      <a class="navbar-item" href="#">
        IT Information
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
</body>
</html>