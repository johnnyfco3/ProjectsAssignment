<!DOCTYPE html>
<style>
    .navbar-brand{
        font-size: 25px;
        font-family: fantasy;
    }
    .media-content p{
        text-align: center;
    }
    .search-bar{
      margin-top: 30px;
      width: 50%;
      margin-left: 30px;
      margin-bottom: 25px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
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
<div class="search-bar">
<div class="field is-grouped">
  <p class="control is-expanded">
    <input class="input" type="text" placeholder="Find a plant">
  </p>
  <p class="control">
    <a class="button is-link is-rounded">
      Search
    </a>
  </p>
</div>
</div>
<div class="columns">
    <div class="column is-half">
    <div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4">Names of Plants</p>
      </div>
    </div>

    <div class="content">
    <table class="table">
  <thead>
    <tr>
        <th>Name</th>
        <th>Learn More</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Abrus precatorius L. Leguminosae</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
        
    </tr>
    <tr>
        <td>Centel</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
    <tr>
        <td>ACOllolll</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
    <tr>
        <td>POlyg</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
  </tbody>
</table>
    </div>
  </div>
</div>
    </div>

    <div class="column is-half">
    <div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4">Countries Found</p>
      </div>
    </div>

    <div class="content">
    <table class="table">
  <thead>
    <tr>
        <th>Country</th>
        <th>View Plants</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>China</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
        
    </tr>
    <tr>
        <td>South Pacific</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
    <tr>
        <td>Vietnam </td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
    <tr>
        <td>Republic of Korea</td>
        <td><a class='button is-info' role='button' href='#'>*</a></td>
    </tr>
  </tbody>
</table>
    </div>
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