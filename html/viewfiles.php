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

      <a class="navbar-item" href="info.php">
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
</nav>
</div>
<!--Main Content-->
<div class="box">
    Available Files 
  </div>
  <div class="columns">
    <div class="column is- half">
      <form method="post" action="viewfiles.php">
        <table class="table is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>Title</th>
        <th>Type</th>
        <th>View Content</th>
      </tr>
    </thead>
    <tbody>
      <?php

        $sql = "SELECT * FROM files WHERE type LIKE 'PDF'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['title'] . "</td><td>"
              . $row['type'] . "</td><td><a class='button is-primary' role='button' href='openfile.php?ID="
              . $row['TID'] . "'>Open</a>";
        }

      ?>
    </tbody>
</table> 
  <a class='button is-warning' role='button' href="uploadpdf.php">Upload New PDF</a>
  </div>
      </form>

      <div class="column is-half">
  <form method="post" action="viewfiles.php">
        <table class="table is-striped is-hoverable is-fullwidth">
    <thead>
      <tr>
        <th>Title</th>
        <th>Type</th>
        <th>View Content</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $directory = 'doc';
        $bookFiles = array_diff(scandir($directory), array('..', '.'));  
        $PDFPrep = 'doc/'; //This line is will be concatenated with the filename so that the pdf opens when the button is clicked
        $fileSize = 0;
        $humanReadableFileSize = "";
        $sql = "SELECT * FROM files WHERE type LIKE 'URL'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['title'] . "</td><td>"
              . $row['type'] . "</td><td><a class='button is-primary' role='button' href='openurl.php?ID="
              . $row['TID'] . "'>Open</a>";
        }

      ?>
    </tbody>
</table> 
  <a class='button is-warning' role='button' href="uploadurl.php">Upload New URL</a>
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