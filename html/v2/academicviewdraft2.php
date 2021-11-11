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
  .columns{
    font-family: 'Merriweather', serif;
    font-size: 25px;
   
  }
  a{
    
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
              $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result3 = mysqli_query($link, $sql3);
        
              if ($queryResults = mysqli_num_rows($result3)) {
              while ($row = mysqli_fetch_array($result3)) {
              ?>
                <li>
                    <?php echo "<a style='color:black;' href='dbanswer5.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
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
              $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result3 = mysqli_query($link, $sql3);
        
              if ($queryResults = mysqli_num_rows($result3)) {
              while ($row = mysqli_fetch_array($result3)) {
              ?>
                <li>
                    <?php echo "<a style='color:black;' href='dbanswer5.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
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
              $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result3 = mysqli_query($link, $sql3);
        
              if ($queryResults = mysqli_num_rows($result3)) {
              while ($row = mysqli_fetch_array($result3)) {
              ?>
                <li>
                    <?php echo "<a style='color:black;' href='dbanswer5.php?ID=" . $row['ID'] . "'>" . $row['English_Name'] . "</a>";
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