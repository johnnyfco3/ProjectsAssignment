<?php
require "config.php";
#include "qa2.php";
include "removeCommonWords.php";
#include "../cgi-bin/v1-web/extractkey.py ";
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
  
  .columns{
    font-family: 'Merriweather', serif;
    font-size: 25px;
   
  }
  
  .searchbar input {
    width: 80%;
  }

  .searchbar button {
    margin-left: 15px;
  }

  .title {
    font-family: 'Cinzel', serif;
  }

  .p {
    border-style: double;
  }

  .hero {
    border-width: 10px;
    border-style: double;
  }

  .field {
    
    border-width: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .subtitle {
    font-family: 'Cinzel', serif;
    font-family: 'Noto Sans Mono', monospace;

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
              <a class="button is-warning" href="login.html">
                Log in
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <section class="hero" style="text-align:center; background-color:white">
    <div class="hero-body">
      <p class="title">
        Ask Mr. Wise your Question about Plants
        <i class="fas fa-seedling fa-1x"></i>
      </p>

      <p class="subtitle">
        <img id="gif" src="../files/animations/prethinking.gif" width="100" height="100">
      </p>

    </div>
  </section>

  <div class="bodyfont" style="background-color: lightgreen; padding-left: 50px;padding-right: 50px; padding-top: 15px;">

  <div class="field">
    <form id="searchform" action="" method="get" class="container-fluid" onsubmit="changeImage();">
      <div class="searchbar">
      <i class="far fa-question-circle fa-2x" style="margin-left:10px; margin-right:5px;"></i>
      <input class="input is-rounded is centered" type="text" name="question" placeholder="<?php echo file_get_contents('../files/a-db/question.txt') ?>"style="padding-right:10px;">
        <button type="submit" name="search" class="button is-primary is-rounded" onclick="changeImage();">Search</button>
      </div>
    </form>
  </div>
  <!--Main content-->
  

<div class="section">
    <div style="background-color:lightgreen">
      <div class="card-content">
      <div class="columns">
            <div class="column">

            <div style="font-weight: bold" >Here are the plants associated with  <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div>
                        <br>
        <?php
          //writing the question to a file.txt 
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");
          $stringArray = explode(' ', fgets($file_handle)); //creates Array where separation occurrs by each space
          $stringArray = array_filter($stringArray, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
          
          foreach($stringArray as &$value){  //loop removes all commas, qmarks, colons, semicolons entered if given in input from the keyword
            $value = str_replace(",", "", $value);
            $value = str_replace("?", "", $value);
            $value = str_replace(":", "", $value);
            $value = str_replace(";", "", $value);
          }
          
            foreach ($stringArray as &$value) {
      
          $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);


                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>

                    <li>
                      
                        <?php echo "<a style='color:black; ' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                          
                        
                    </li>
                    <br>
                     

                  <?php } 
                  }
                  $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result1 = mysqli_query($link, $sql1);
        
              if ($queryResults = mysqli_num_rows($result1)) {
                 while ($row = mysqli_fetch_array($result1)) {
                  ?>
                  <li>
                    <?php echo "<a style='color:black;' href='dbanswer2.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                        ?>
                 
                  </li>
                  <br>

              <?php } 
              }

            $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result2 = mysqli_query($link, $sql2);
        
              if ($queryResults = mysqli_num_rows($result2)) {
                 while ($row = mysqli_fetch_array($result2)) {
                  ?>
                  <li>
                   <?php echo "<a style='color:black;' href='dbanswer3.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
                        ?>
                   
                  </li>
                  <br>

              <?php } 
              }
            }
          
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");
          $stringArray2 = explode(' ', fgets($file_handle2)); //creates Array where separation occurrs by each space
          $stringArray2 = array_filter($stringArray2, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
        //print_r($stringArray2); //prints the array for testing purposes

            foreach ($stringArray2 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>
                   <li>
                        <?php echo "<a style='color:black;' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                      
                      </li>
                      <br>

                  <?php } 
                  }
                  $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result1 = mysqli_query($link, $sql1);
        
              if ($queryResults = mysqli_num_rows($result1)) {
                 while ($row = mysqli_fetch_array($result1)) {
                  ?>
                  <li>
                    <?php echo "<a style='color:black;' href='dbanswer2.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                        ?>
                   
                  </li>
                  <br>

              <?php } 
              }

            $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result2 = mysqli_query($link, $sql2);
        
              if ($queryResults = mysqli_num_rows($result2)) {
                 while ($row = mysqli_fetch_array($result2)) {
                  ?>
                  <li>
                  <?php echo "<a style='color:black;' href='dbanswer3.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
                        ?>
                  
                  </li>
                  <br>

              <?php }
              }
            }
          
          fclose($file_handle2);
          $file_handle3 = fopen("../files/a-db/keyword3.txt", "rb");
          $stringArray3 = explode(' ', fgets($file_handle3)); //creates Array where separation occurrs by each space
          $stringArray3 = array_filter($stringArray3, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
        //print_r($stringArray3); //prints the array for testing purposes
     
            foreach ($stringArray3 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>
                   <li>
                        <?php echo "<a style='color:black;' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                        
                      </li>

                      <br>

                  <?php } 
                  }
                  $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result1 = mysqli_query($link, $sql1);
        
              if ($queryResults = mysqli_num_rows($result1)) {
                 while ($row = mysqli_fetch_array($result1)) {
                  ?>
                  <li>
                    <?php echo "<a style='color:black;' href='dbanswer2.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                        ?>
                 
                  </li>
                  <br>

              <?php } 
              }

            $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result2 = mysqli_query($link, $sql2);
        
              if ($queryResults = mysqli_num_rows($result2)) {
                 while ($row = mysqli_fetch_array($result2)) {
                  ?>
                  <li>
                 <?php echo "<a style='color:black;' href='dbanswer3.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
                        ?>
              
                  </li>
                  <br>

              <?php }
              }
            }
          
          fclose($file_handle3);
         ?>
         </div>
         <div class="column">

         <div style="font-weight: bold" >Here is Webcrawler information associated with  <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div>
    <?php 
          shell_exec("python ../cgi-bin/v1-web/close.py");
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");
          shell_exec("python ../cgi-bin/v1-web/open.py");
          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
          
            foreach ($stringArray as &$value) {?>
                  <section>
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                <?php
            }
        }
          
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");
          while (!feof($file_handle2)) {          
            $line_of_text = fgets($file_handle2);         
            foreach ($stringArray2 as &$value) {?>
                  <section>
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                <?php
            }
        }
          
          fclose($file_handle2);
          $file_handle3 = fopen("../files/a-db/keyword3.txt", "rb");
          while (!feof($file_handle3)) {          
            $line_of_text = fgets($file_handle3);
            foreach ($stringArray3 as &$value) { ?>
                  <section>
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                <?php
            }
        }
          
          fclose($file_handle3);
        ?>
        </div>
      </div>

<div class="tabs is-toggle is-fullwidth is-large">
  <ul>
    <li>
    <a onclick="javascript:window.history.back(-1);return false;">
        <span>Normal View</span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span>Academic View</span>
      </a>
</li>
  </ul>
</div>
    
</body>

</html>