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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
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

      <a class="navbar-item" href="qa2.php">
        Medicinal Plants
      </a>
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
      </tr>
    </thead>
    <tbody>
      <?php
      //Search through the "doc" folder to get the resulted book titles and file size
      //then display them on a table
      $directory = '../files/books';
      $bookFiles = array_diff(scandir($directory), array('..', '.'));  
      $PDFPrep = '../files/books/'; //This line is will be concatenated with the filename so that the pdf opens when the button is clicked
      $fileSize = 0;
      $humanReadableFileSize = "";
      $sql = "SELECT * FROM files WHERE type LIKE 'PDF'";
      $result = mysqli_query($link, $sql);
      $pdf = ' ';
      while ($row = mysqli_fetch_assoc($result)) {
        $pdf = $row['type'];
      }
        foreach($bookFiles as $files){
            if(!is_file($files)){
            echo "<tr>
              <td>{$files}</td></td><td>". $pdf . "</td><td>";
        $fileDirectory = $directory. $files;
        //Prepare file size and pdf to open
        // $filesize = filesize($fileDirectory);
        //$humanReadableFileSize = FileSizeConvert($filesize);
        $PDFDirectory = $PDFPrep . $files;  
        echo "<!--<td>{$humanReadableFileSize}</td>-->
              <td>
                <a class='button is-primary' href='{$PDFDirectory}' role='button'>Open</a>
              </td>
              </tr>\n";
        }
        }
      ?>
      
      <?php
      //Taken from PHP.net
      /**
      * Converts bytes into human readable file size.
      *
      * @param string $bytes
      * @return string human readable file size (2,87 Мб)
      * @author Mogilev Arseny
      */
      function FileSizeConvert($bytes)
      {	
          if($bytes == 0){ 
            return "0 MB";
          }
          $bytes = floatval($bytes);
              $arBytes = array(
                  0 => array(
                      "UNIT" => "TB",
                      "VALUE" => pow(1024, 4)
                  ),
                  1 => array(
                      "UNIT" => "GB",
                      "VALUE" => pow(1024, 3)
                  ),
                  2 => array(
                      "UNIT" => "MB",
                      "VALUE" => pow(1024, 2)
                  ),
                  3 => array(
                      "UNIT" => "KB",
                      "VALUE" => 1024
                  ),
                  4 => array(
                      "UNIT" => "B",
                      "VALUE" => 1
                  ),
              );
      
          foreach($arBytes as $arItem)
          {
              if($bytes >= $arItem["VALUE"])
              {
                  $result = $bytes / $arItem["VALUE"];
                  $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                  break;
              }
          }
          return $result;
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
      </tr>
    </thead>
    <tbody>
      <?php
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
