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
          <a class="button is-primary" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!--Main Content-->
<div class="box">
  Welcome! 
  <div>Let's Start Learning</div>
</div>
<div class="columns is-multiline is-mobile">
  <div class="column is-half">
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-24">Data Structures</p>
                </div>
            </div>
            <div class="content">
            A data organization, management, and storage format that 
            enables efficient access and modification. A collection of data values, the relationships
            among them, and the functions or operations that can be applied to the data. Here we will see
            data structure related questions. To get started, press below!
            </div>
            <div class="buttons">
                <button class="button is-info">Start</button>
            </div>
        </div>
    </div>
  </div>
<div class="column is-half">
<div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-24">Information Technology</p>
      </div>
    </div>
    <div class="content">
        The study or use of systems for storing, retrieving, and sending information. Here you can learn 
        about what it takes to be successful in IT jobs and find jobs in this field. To get started, press 
        below!
    </div>
    <div class="buttons">
        <button class="button is-info">Start</button>
  </div>
</div>
</div>
</body>
</html>