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

  .column .image {
    width: 350px;
  }

  .column .title {
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  }

  .column .subtitle {
    font-family: 'Times New Roman', Times, serif;
    margin-top: 10px;
  }

  .banner {
    font-size: 80px;

    font-family: 'Fleur De Leah', cursive;

    text-align: center;

  }
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Noto+Sans+Mono:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
  <title>Plant Details</title>
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
        Ask a Question
      </a>
      <a class="navbar-item" href="http://cs.newpaltz.edu/p/f21-11/v0/home.php">
            Browse our Database
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
    </nav>
  </div>
  <!--Main Content-->
  <?php
  require_once "config.php";


  if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM Medplant WHERE ID LIKE $ID";

    $result = mysqli_query($link, $sql);
    if ($queryResults = mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_array($result)) {

  ?>





        <h1 class="banner" style="background-color:lightgreen"><?php echo $row['Plant_Name']; ?></h1>

        <figure class="image">
          <div class=columns>
            <div class=column></div>

            <div class=column style="padding-right: 185px;"><a href="..<?php echo $row['Image_Link']; ?>">Click here for the plant picture!</a></div>
          </div>


        </figure>

        <section style="border-style: double;border-color:green;border-width:10px;">

          <div class="local-name">
            <h1 class="subtitle is-4">Local Name:</h1>
            <?php echo $row['Local_Names']; ?>
          </div>

          <div class="eng-name">
            <h1 class="subtitle is-4">English Name:</h1>
            <?php echo $row['English_Names']; ?>
          </div>

          <div class="description">
            <h1 class="subtitle is-4">Description:</h1>
            <?php echo $row['Description']; ?>
          </div>

          <div class="habitat">
            <h1 class="subtitle is-4">Distribution:</h1>
            <?php echo $row['Distribution']; ?>
          </div>

          <div class="traditional-uses">
            <h1 class="subtitle is-4">Traditional Uses:</h1>
            <?php echo $row['Therapeutic_Uses']; ?>
          </div>

          <div class="constituents">
            <h1 class="subtitle is-4">Chemical Composition:</h1>
            <?php echo $row['Chemical_Composition']; ?>
          </div>

          <div class="biological-activity">
            <h1 class="subtitle is-4">Parts Used:</h1>
            <?php echo $row['Parts_Used']; ?>
          </div>

          <div class="biological-activity">
            <h1 class="subtitle is-4">Flowering Period:</h1>
      <?php echo $row['Flowering_Period'];
      }
    }
  } ?>
          </div>
        </section>

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