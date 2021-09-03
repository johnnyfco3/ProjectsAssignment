<!DOCTYPE html>
<style>
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
    .main-content{
        width: 98%;
        margin-left: 10px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Home</title>
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
          <a class="navbar-item" href="#">
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
          <a class="button is-primary" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<!--Main Content-->
<div class="main-content">
<div class="title">
<h1 class="title is-1">About</h1>
</div>
<div class="content is-normal">
    <h1>Mission</h1>
    <p>Welcome to our Knowledge Base website. Our mission is to educate students about 
        a few aspects of computer science. We teach our audience the fundamentals of Data Structures
        and provide them useful information about the field of Information Technology. In order to
        teach Data Structures, we include various practice questions in which they can complete.  
    </p>
    <h2>Developers</h2>
    <p>The minds behind Knowledge Base are full time students at the State University of New York at New
        Paltz. These students major in Computer Science and are aiming to share their skills with the world.
    </p>
    <p>
        Developers Names: 

    </p>
  </div>
  </div>
</body>
</html>