<?php
#require "config.php";
include "qa2.php";
include "removeCommonWords.php";
include "../cgi-bin/v1-web/extractkey.py ";
error_reporting(0);
?>
<!DOCTYPE html>
<style>
  .bodyfont{
    font-family: 'Cinzel', serif;
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
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
</head>

<body class="bodyfont">
  <!--Main content-->
  <div class="tabs is-toggle is-fullwidth is-large">
  <ul>
    <li class="is-active">
    <a>
        <span>Normal View</span>
      </a>
    </li>
    <li>
      <a href="academicviewdraft.php">
        <span>Academic View</span>
      </a>
</li>
  </ul>
</div>
<div style="font-weight: bold;" >Here are the plants associated with your question
                        </div>
        <?php
        if (isset($_GET['search'])) {
          //writing the question to a file.txt
          $myfile = fopen("../files/a-db/question.txt", "w");
          $questiontxt = $_GET['question'];
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
         
          //print_r($stringArray); //prints the array for testing purposes
          fwrite($myfile, $questiontxt); //writes the questiontxt into a file
          fclose($outfile);
          fclose($outfile2);
          fclose($outfile3);
          fclose($myfile);  
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");

          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            //$parts = explode(', ', $line_of_text);
            //print_r($parts);
            ?> <!--<hr>--> <?php
            foreach ($stringArray as &$value) {
      
          $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {

                    //echo $value;
                    while ($row = mysqli_fetch_array($result)) {
                      
                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";

                  } 
                  }
                  ?>
                  
                <?php
            }
          }
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");
          $stringArray2 = explode(' ', $questionkey2); //creates Array where separation occurrs by each space
          $stringArray2 = array_filter($stringArray2, function($a) {  //function deletes all empty indices left over after removing commonWords
            return trim($a) !== "";
        });
        //print_r($stringArray2); //prints the array for testing purposes

          while (!feof($file_handle2)) {          
            $line_of_text = fgets($file_handle2);
            //$parts = explode(', ', $line_of_text);
            //print_r($parts);
            ?> <!--<hr>--> <?php           
            foreach ($stringArray2 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);

                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
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
        //print_r($stringArray3); //prints the array for testing purposes

          while (!feof($file_handle3)) {          
            $line_of_text = fgets($file_handle3);
            //$parts = explode(', ', $line_of_text);
            //print_r($parts);
            ?> <!--<hr>--> <?php           
            foreach ($stringArray3 as &$value) {             
              $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${value}[[:>:]]'
          OR Parts_Used REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${value}[[:>:]]' 
          OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR English_Names REGEXP '[[:<:]]${value}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${value}[[:>:]]' OR
          Plant_Name REGEXP '[[:<:]]${value}[[:>:]]'";

              $result = mysqli_query($link, $sql);


                  if ($queryResults = mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_array($result)) {

                      echo "<a href='dbanswer.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                    } 
                  }
                  
            }
          }
          fclose($file_handle3);

          echo file_get_contents("../files/a-db/plants.txt");
          shell_exec("python ../cgi-bin/v1-web/closeplant.py");
                 
                 
          shell_exec("python ../cgi-bin/v1-web/close.py");
          $file_handle = fopen("../files/a-db/keyword.txt", "rb");
          shell_exec("python ../cgi-bin/v1-web/open.py");
          ?>
          <hr>
          
          <div style="font-weight:bold;">Here is web information concerning your question
                      </div>
          <?php
          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            foreach ($stringArray as &$value) {

                      //echo "<br>";
                      echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");           
                  }
            }
          fclose($file_handle);
          $file_handle2 = fopen("../files/a-db/keyword2.txt", "rb");

          while (!feof($file_handle2)) {          
            $line_of_text = fgets($file_handle2);         
            foreach ($stringArray2 as &$value) {
                      echo "<br>";
                      echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");           
                  }
                  
            }
          fclose($file_handle2);
          $file_handle3 = fopen("../files/a-db/keyword3.txt", "rb");
          
          while (!feof($file_handle3)) {          
            $line_of_text = fgets($file_handle3);
                  
            foreach ($stringArray3 as &$value) { 
                      echo "<br>";
                      echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${value}");   
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
          
</body>

</html>