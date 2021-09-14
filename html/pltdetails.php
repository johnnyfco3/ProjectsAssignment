<!DOCTYPE html>
<style>
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
    .column .image{
        width: 350px;
    }
    .column .title{
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
    .column .subtitle{
        font-family: 'Times New Roman', Times, serif;
        margin-top: 10px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Medicinal Plants</title>
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
<div class="columns">
    <div class="column">
    <figure class="image">
        <img src="https://bulma.io/images/placeholders/256x256.png">
    </figure>
    </div>

    <div class="column is-two-thirds">
    <h1 class="title is-1">Name of Plant</h1>

    <div class="local-name">
        <h1 class="subtitle is-4">Local Name:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="eng-name">
        <h1 class="subtitle is-4">English Name:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="description">
        <h1 class="subtitle is-4">Description:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="habitat">
        <h1 class="subtitle is-4">Habitat:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="traditional-uses">
        <h1 class="subtitle is-4">Traditional Uses:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="constituents">
        <h1 class="subtitle is-4">Constituents:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="biological-activity">
        <h1 class="subtitle is-4">Biological Activity:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>

    <div class="source">
        <h1 class="subtitle is-4">Sources:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
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