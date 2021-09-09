<?php
// Include config file
require_once "config.php";
?>
<!DOCTYPE html>
<style>
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
    .box{
        text-align: center;
        font-size: 40px;
    }
    .file{
        margin-top: 15px;
    }
    .file .title{
        font-size: 18px;
        margin-right: 10px;
        margin-top: 15px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>View Files</title>
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
  </div>
</nav>
<!--Main Content-->
<div class="box">
    Choose Text Category 
  </div>
  <form method="post" action="viewfiles.php">
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
            Here you will find all PDFs and URLs concerning Data Structures
            </div>
            <div class="buttons">
                <button class="button is-info" name="ds-search">View</button>
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
    Here you will find all PDFs and URLs concerning IT information
    </div>
    <div class="buttons">
        <button class="button is-info" name="it-search">View</button>
  </div>
</div>
</div>
  </div>
  </div>
  </div>
<table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>View Content</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST['ds-search'])) {
        $sql = "SELECT * FROM texbooks WHERE topic = 'Data Structures'";
        $result = mysqli_query($link, $sql);
        $queryResults = mysqli_num_rows($result);
        if ($queryResults > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['title'] . "</td><td><a class='button is-info' role='button' href='openfile.php?ID="
              . $row['textID'] . "'>View</a></td></tr>";
            }
          }
      } else if (isset($_POST['it-search'])) {
        $sql = "SELECT * FROM texbooks WHERE topic LIKE 'IT'";
        $result = mysqli_query($link, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['title'] . "</td><td>" . $row['topic'] . "</td><td><a class='button is-info' role='button' href='openfile.php?ID="
              . $row['TID'] . "'>View</a></td></tr>";
            }
          }
      }
      ?>
    </tbody>
</table> 
  <a class='button is-primary' role='button' href="uploadform.html">Upload New</button>
</body>
</html>