<?php
#require "config.php";
include "qa2.php";
include "removeCommonWords.php";
error_reporting(0);
?>
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

  .box {
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 40px;
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
  <title>Results Page</title>
</head>

<body>
  <!--Main content-->



  </div>
  <div class="card">
    <div class="card-content">
      <div class="content">
        <?php
        if (isset($_GET['search'])) {
          //writing the question to a file.txt
          $myfile = fopen("../files/a-db/question.txt", "w");
          $questiontxt = $_GET['question'];
          $outfile = fopen("../files/a-db/keyword.txt", "w");
          $questionkey = removeCommonWords($questiontxt);
          fwrite($outfile, $questionkey);
          fwrite($myfile, $questiontxt);
          fclose($outfile);
          fclose($myfile);
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");

          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            $parts = explode(', ', $line_of_text);
            foreach ($parts as &$value) {
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

        ?>

              <div class="hero is-warning">
                <div class="hero-body">
                  <div class="title">Here is information on plants from a PDF document</div>
                </div>
              </div>


              <?php

              if ($queryResults = mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {

              ?>


                  <li>
                    <?php echo "<a href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                    ?>
                  </li>
                  </ul>


              <?php }
              }
              ?>
              <div class="hero is-warning">
                <div class="hero-body">
                  <div class="title">Here is Webcrawler Information based on Plant/s</div>
                </div>
              </div>
        <?php
              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
            }
          }
          fclose($file_handle);
        } ?>

      </div>
    </div>
  </div>
</body>

</html>