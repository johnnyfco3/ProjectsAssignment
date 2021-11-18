<?php
require "config.php";
#include "qa2.php";
include "removeCommonWords.php";
error_reporting(0);
?>
<!DOCTYPE html>
<style>
  .bodyfont{
    font-family: 'Merriweather', serif;
    font-size: 20px;
   
  }
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
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Noto+Sans+Mono:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c7451615db.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
        
  <!--Main content-->

        <?php
        if (isset($_GET['search'])) {
          //writing the question to a file.txt
          $myfile = fopen("../files/a-db/question.txt", "w");
          $questiontxt = $_GET['question'];
          fwrite($myfile, $questiontxt);
          ?>
          <input class="input is-rounded is centered" type="text" name="question" placeholder="<?php echo file_get_contents('../files/a-db/question.txt') ?>"style="padding-right:10px;">
        <button type="submit" name="search" class="button is-primary is-rounded" onclick="changeImage();">Search</button>
      </div>
    </form>
  </div><?php
          $outfile = fopen("../files/a-db/keyword.txt", "w");
          $outfile2 = fopen("../files/a-db/keyword2.txt", "w");
          $outfile3 = fopen("../files/a-db/keyword3.txt", "w");
          $outfile4 = fopen("../files/a-db/plants.txt", "w");
          $questionkey = removeCommonWords($questiontxt); //removes common words in input that are lower case
          $questionkey = removeCommonWords(strtolower($questionkey)); //in case user inputs an upper case word

          fwrite($outfile, $questionkey);
          $questionkey2 = ucwords($questionkey);  //first character in all words capitalized
          fwrite($outfile2, $questionkey2);
          $questionkey3 = strtoupper($questionkey);   //all characters capitalized
          fwrite($outfile3, $questionkey3);
          $stringArray = explode(' ', $questionkey); //creates Array where separation occurrs by each space
          $stringArray = array_filter($stringArray, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
          
          foreach($stringArray as &$value){  //loop removes all commas, qmarks, colons, semicolons entered if given in input from the keyword
            $value = str_replace(",", "", $value);
            $value = str_replace("?", "", $value);
            $value = str_replace(":", "", $value);
            $value = str_replace(";", "", $value);
          }
         
          fclose($outfile);
          fclose($outfile2);
          fclose($outfile3);
          fclose($myfile);  
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");
          $medplant = False;
          $book2 = False;
          $book3 = False;
          $book5 = False;

          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            ?>

            <div style="font-weight: bold" >Here are the plants associated with  <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div><?php 

            
            foreach ($stringArray as &$value) {
      
          $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {
                    $medplant = True;

                    while ($row = mysqli_fetch_array($result)) {
                      
                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";

                  } 
                  }
                  $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
                  Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
                    
                  $result1 = mysqli_query($link, $sql1);
            
                  if ($queryResults = mysqli_num_rows($result1)) {
                    $book2 = True;
                     while ($row = mysqli_fetch_array($result1)) {
            
                          echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                    } 
                }
    
                $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
                  Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

                  $result2 = mysqli_query($link, $sql2);
            
                  if ($queryResults = mysqli_num_rows($result2)) {
                    $book3 = True;
                     while ($row = mysqli_fetch_array($result2)) {
            
                          echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                    } 
                }
            }
          }
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");
          $stringArray2 = explode(' ', $questionkey2); //creates Array where separation occurrs by each space
          $stringArray2 = array_filter($stringArray2, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });

          while (!feof($file_handle2)) {          
            $line_of_text = fgets($file_handle2);
                 
            foreach ($stringArray2 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {
                    $medplant = True;
                    while ($row = mysqli_fetch_array($result)) {

                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                    } 
                  }
                
              $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result1 = mysqli_query($link, $sql1);
        
              if ($queryResults = mysqli_num_rows($result1)) {
                $book2 = True;
                 while ($row = mysqli_fetch_array($result1)) {
        
                      echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                } 
            }

            $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
              OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
              OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
              Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
        
              $result2 = mysqli_query($link, $sql2);
        
              if ($queryResults = mysqli_num_rows($result2)) {
                $book3 = True;
                 while ($row = mysqli_fetch_array($result2)) {
        
                      echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                } 
            }    
              }
          }
          fclose($file_handle2);
          $file_handle3 = fopen("../files/a-db/keyword3.txt", "rb");
          $stringArray3 = explode(' ', $questionkey3); //creates Array where separation occurrs by each space
          $stringArray3 = array_filter($stringArray3, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
        

          while (!feof($file_handle3)) {          
            $line_of_text = fgets($file_handle3);
                       
            foreach ($stringArray3 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);


                  if ($queryResults = mysqli_num_rows($result)) {
                    $medplant = True;
                    while ($row = mysqli_fetch_array($result)) {

                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                    } 
                  }
                  $sql1 = "SELECT * FROM book2_Medicinal_Plants_of_Korea WHERE Chemical_Components REGEXP '[[:<:]]${value}[[:>:]]' OR Bio_Activities REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
                  Korean_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
            
                  $result1 = mysqli_query($link, $sql1);
            
                  if ($queryResults = mysqli_num_rows($result1)) {
                    $book2 = True;
                     while ($row = mysqli_fetch_array($result1)) {
            
                          echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                    } 
                }
    
                $sql2 = "SELECT * FROM book3_Medicinal_plants_in_China WHERE Dosage REGEXP '[[:<:]]${value}[[:>:]]' OR Indications REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Description REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR
                  Chinese_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";
            
                  $result2 = mysqli_query($link, $sql2);
            
                  if ($queryResults = mysqli_num_rows($result2)) {
                    $book3 = True;
                     while ($row = mysqli_fetch_array($result2)) {
            
                          echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
                    } 
                }
                  
            }
          }
          fclose($file_handle3);

          echo file_get_contents("../files/a-db/plants.txt");
          shell_exec("python ../cgi-bin/v1-web/closeplant.py");
                 
                 
          shell_exec("python ../cgi-bin/v1-web/close.py");
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");
          ?>
          <hr>
          
          <div style="font-weight: bold" >Here is Web information associated with <?php echo file_get_contents("../files/a-db/keyword.txt"); ?>
                        </div><?php 
        
          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            foreach ($stringArray as &$value) {

                      echo shell_exec("python ../cgi-bin/v1-web/extractkey2.py ${value}");           
                  }
            }
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");

          while (!feof($file_handle2)) {          
            $line_of_text = fgets($file_handle2);         
            foreach ($stringArray2 as &$value) {
                      echo "<br>";
                      echo shell_exec("python ../cgi-bin/v1-web/extractkey2.py ${value}");           
                  }
                  
            }
          fclose($file_handle2);
          $file_handle3 = fopen("../files/a-db/keyword3.txt", "rb");
          
          while (!feof($file_handle3)) {          
            $line_of_text = fgets($file_handle3);
                  
            foreach ($stringArray3 as &$value) { 
                      echo "<br>";
                      echo shell_exec("python ../cgi-bin/v1-web/extractkey2.py ${value}");   
            }
          }
          fclose($file_handle3);
        }
          ?>
          <hr>
          <div style="font-weight:bold;">References:
                      </div>
          <?php 


          $handle = fopen('../files/a-web/source.txt', 'r');


          if ($handle) {
          while (($line = fgets($handle)) !== false) 
          {
          
          ?><a href="<?php echo $line; ?>"><?php echo $line?></a><br>

          <?php
          }
        }
?>
          <div class="pdf">
          <?php
        if($medplant == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/Medplant.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book1-Medicinal plants in Viet Nam.pdf</a><br>";
        }
        if($book2 == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/book2_Medicinal_Plants_of_Korea.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book2_Medicinal_Plants_of_Korea.pdf</a><br>";
        }
        if($book3 == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/book3_Medicinal_plants_in_China.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book3_Medicinal_plants_in_China.pdf</a><br>";
        }
        if(file_get_contents('../files/a-db/textbook.txt') == 'True'){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/Medicinal-Plants-of-North-America.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>Medicinal-Plants-of-North-America.pdf</a><br>";
        }
        ?>
        </div>
        <hr>
        <div class="tabs is-toggle is-fullwidth is-large">
  <ul>
    <li class="is-active">
    <a>
        <span>Normal View</span>
      </a>
    </li>
    <li>
      <a href="academicviewdraft2.php">
        <span>Academic View</span>
      </a>
</li>
  </ul>
</div>
      </div>
          
</body>

</html>