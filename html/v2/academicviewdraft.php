<?php
#require "config.php";
include "qa2.php";
include "removeCommonWords.php";
include "../cgi-bin/v1-web/extractkey.py ";
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
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
  <title>Results Page</title>
</head>

<body>
  <!--Main content-->
  
<div class="section" style="background-color: green;">
    <div class="card">
      <div class="card-content">
        <?php
          shell_exec("python ../cgi-bin/v1-web/close.py");
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
          shell_exec("python ../cgi-bin/v1-web/open.py");
          
            foreach ($stringArray as &$value) {
      
          $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

        ?>
              <div class="columns" style="font-family: 'Merriweather', serif;border-style:inset;border-width:10px;border-color:brown;">
                <div class="column">

                  
            <div style="font-weight: bold" >Here are the plants associated with  <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div><?php 




                  

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>
                      <li style="border-style:inset;border-width:10px;border-color:lightgreen">
                        <ul><?php echo "<a style='color:black;' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                        </ul>
                      </li>

                  <?php } 
                  }
                  $sql1 = "SELECT * FROM book2 WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
          
              $result1 = mysqli_query($link, $sql1);
        
              if ($queryResults = mysqli_num_rows($result1)) {
                 while ($row = mysqli_fetch_array($result1)) {
                  ?>
                  <li style="border-style:inset;border-width:10px;border-color:lightgreen">
                    <ul><?php echo "<a style='color:black;' href='#?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                        ?>
                    </ul>
                  </li>

              <?php } 
              }

            $sql2 = "SELECT * FROM book3 WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result2 = mysqli_query($link, $sql2);
        
              if ($queryResults = mysqli_num_rows($result2)) {
                 while ($row = mysqli_fetch_array($result2)) {
                  ?>
                  <li style="border-style:inset;border-width:10px;border-color:lightgreen">
                    <ul><?php echo "<a style='color:black;' href='#?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                        ?>
                    </ul>
                  </li>

              <?php }
              }
                  ?>
                  </div>
                  <?php
                  
                  ?>
                
                <div class="column">

                <div style="font-weight: bold" >Here are the plants associated with  <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div>
                  <section style="border-style:double;border-width:10px;border-color:lightgreen;">
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                </div>
                </div>
                <?php
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

        ?>
              <div class="columns" style="border-style:inset;border-width:10px;border-color:brown;">
                <div class="column">

                  <div class="hero" style="background-color:burlywood;">
                    <div class="hero-body">
                      <div class="title">Here is information on plants from a PDF document about <?php echo "$value" ?></div>
                    </div>
                  </div>
                  <?php

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>
                   <li style="border-style:inset;border-width:10px;border-color:lightgreen">
                        <ul><?php echo "<a style='color:black;' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                        </ul>
                      </li>

                  <?php } 
                  }
                  ?>
                  </div>
                  <?php
                  
                  ?>
                
                <div class="column">

                 
                  <section style="border-style:double;border-width:10px;border-color:lightgreen;">
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                </div>
                </div>
                <?php
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

        ?>
              <div class="columns" style="border-style:inset;border-width:10px;border-color:brown;">
                <div class="column">

                  <?php

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                  ?>
                   <li style="border-style:inset;border-width:10px;border-color:lightgreen">
                        <ul><?php echo "<a style='color:black;' href='dbanswer.php?ID=" . $row['ID'] . "'>" . $row['Plant_Name'] . "</a>";
                            ?>
                        </ul>
                      </li>

                  <?php } 
                  }
                  ?>
                  </div>
                  <?php
                  
                  ?>
                
                <div class="column">

                  
                  <section style="border-style:double;border-width:10px;border-color:lightgreen;">
              <?php

              echo "<br>";
              echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");
              echo "<p><a style='color:blue;' href='webinfo.php'>Read More</a>";
              ?>
              </section>
                </div>
                </div>
                <?php
            }
          
          fclose($file_handle3);
         ?>
              </div>
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