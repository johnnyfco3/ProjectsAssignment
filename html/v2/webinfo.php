<!DOCTYPE html>
<style>
  .navbar-brand {
    font-size: 25px;
    font-family: fantasy;
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
  <title>Web Details</title>
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
    </nav>
  </div>
  <!--Main Content-->

        <h1 class="banner" style="background-color:lightgreen">Web Information</h1>

        <section style="border-style: double;border-color:green;border-width:10px;font-size: 20px;">
        <iframe src="../files/a-web/fullanswer.txt" style="width:100%; height: 900px;">
    </iframe>
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