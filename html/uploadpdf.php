<!DOCTYPE html>
<style>
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Upload File</title>
</head>
<body>
<!--Navbar-->
<div class="container">
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
<form action="" method="post" enctype="multipart/form-data">
<div class="columns">
  <div class="column is-one-third">
<div class="field">
  <label class="label">Title</label>
  <div class="control">
    <input class="input is-link" type="text" name="title" placeholder="Choose an appropriate title">
  </div>
</div>
</div>
</div>

<div class="field">
  <label class="label">Type</label>
  <div class="column is-one-fifth">
    <input class="input" type="text" value="PDF" name="type" readonly>
  </div>
</div>

<div class="field">
  Upload File to Scan
  <input type="file" name="userfile" id="userfile" required>
</div>

<div class="field">
  <div class="control">
    <button class="button is-link" type="submit" name="submit">Submit</button>
  </div>
</div>
</form>
<?php

// Include config file
require_once "config.php";

if(isset($_POST['submit'])){
    $Title = $_POST['title'];
    $Type = $_POST['type'];
    $uploads_dir = '/html/doc';
    $fname = $_FILES['userfile']['name'];
    move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']);
    $query = "INSERT into files (title, type, fname) values ('$Title', '$Type', '$fname')";
    $result = mysqli_query($link, $query);
    if($result)
    {
        header("Location: viewfiles.php?uploadsuccess");
    }
    else{
        echo ' Please Check Your Query ';
    }
}
?>
<script src="https://unpkg.com/vue@next"></script>
<script>
        
        const VM = {
          data() {
            return {
              navBarIsActive: false,  
            }
          }
        }

        Vue.createApp(VM).mount('.container')
      </script>
</body>
</html>