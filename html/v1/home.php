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
<div class="box">
  Welcome! 
  <div>Let's Start Learning</div>
</div>
<div class="columns">
  <div class="column">
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-24">Medicinal Plants</p>
                </div>
            </div>
            <div class="content">
              Medicinal plants, also called medicinal herbs, have been discovered and used in
              traditional medicine practices since prehistoric times. Plants make hundreds
              of chemical compounds for functions including defence against insects, fungi, diseases,
              and herbivorous mammals. This website includes a numerous amount of sources that inform you about 
              different types of medicinal plants and their importance. To learn about specific plants, press the 
              Start button below! To quiz yourself on the information, press the Quiz button below!
              
            </div>
                <a class='button is-info' role='button' href="info.php">Start</a>
                <a class='button is-info' role='button' href="quiz.php">Quiz</a>
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
</body>
</html>
