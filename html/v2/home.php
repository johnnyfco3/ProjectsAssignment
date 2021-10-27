<!DOCTYPE html>
<style>
  .navbar-brand {
    font-size: 25px;
    font-family: fantasy;
  }

  .navbar-menu {

    font-family: 'Roboto Condensed', sans-serif;
    font-weight: bold;
  }

  .i {
    word-spacing: 20px;

  }

  .section{
    
    }

  .hero {
    text-align: center;


    font-family: 'Shadows Into Light', cursive;
    font-size: 35px;
    border-style: inset;
    padding-bottom: 10px;
    border-width: 10px;
  }

  .databasebio {
    background: url("https://media.tehrantimes.com/d/t/2020/07/15/4/3500545.jpg");
    background-size: cover;
    font-family: 'Ubuntu', sans-serif;
    font-size: 30px;
    border-style: groove;
    border-width: 5px;
    color: white;
    font-weight: 600;
  }

  .banner {
    font-size: 80px;

    font-family: 'Fleur De Leah', cursive;

    text-align: center;

  }

  .media-content p {
    text-align: center;
  }
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Noto+Sans+Mono:wght@300;400&family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Fleur+De+Leah&family=Noto+Sans+Mono:wght@300;400&family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
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
      </div>
    </nav>
  </div>
  <!--Main Content-->

  <div class="hero is-primary">
    <div class="columns">

      <div class=column style="padding:30px;">
        <i class="fab fa-leanpub fa-2x fa-spin"></i>

      </div>
      <div class=column>
        <div>Welcome!</div>
        <div>Let's Start Learning</div>

      </div>

      <div class=column style="padding-top:30px;">

        <i class="fas fa-chalkboard-teacher fa-2x fa-spin"></i>
      </div>
    </div>
  </div>
  <div>
    <div>
      <div id="bg" class="section">
        <div>
          <h2 class="banner"style="border-style:double;border-width:15px;">Medicinal Plants <i class="fab fa-pagelines" ></i></h2>


          <div class="databasebio">
            Medicinal plants, also called medicinal herbs, have been discovered and used in
            traditional medicine practices since prehistoric times. Plants make hundreds
            of chemical compounds for functions including defence against insects, fungi, diseases,
            and herbivorous mammals. This website includes a numerous amount of sources that inform you about
            different types of medicinal plants and their importance. To learn about specific plants, press the
            Start button below! To quiz yourself on the information, press the Quiz button below!

          </div>
          <a class='button is-info' role='button' href="qa2.php" style="height:60px;width:60px; font-family: 'Roboto Condensed';font-weight:bold;">Start</a>

        </div>
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
  <script src="https://kit.fontawesome.com/c7451615db.js" crossorigin="anonymous"></script>
</body>

</html>