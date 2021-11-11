<?php
#require "config.php";
include "qa2.php";
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
</style>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <!--Main content-->
  <div class="bodyfont" style="background-color: lightgreen";>
  

<div style="padding-left: 50px;padding-right: 50px">


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
          $medplant = False;
          $book2 = False;
          $book3 = False;
          $book5 = False;

          while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);
            //$parts = explode(', ', $line_of_text);
            //print_r($parts);
            ?> <!--<hr>--> <?php
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

                    //echo $value;
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
            
                          echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
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
            
                          echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                    } 
                }
                $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

                  $result3 = mysqli_query($link, $sql3);
            
                  if ($queryResults = mysqli_num_rows($result3)) {
                    $book5 = True;
                     while ($row = mysqli_fetch_array($result3)) {
            
                          echo "<a href='dbanswer5.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
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
        
                      echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
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
        
                      echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                } 
            }
            $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

                  $result3 = mysqli_query($link, $sql3);
            
                  if ($queryResults = mysqli_num_rows($result3)) {
                    echo 'yooo';
                    $book5 = True;
                     while ($row = mysqli_fetch_array($result3)) {
            
                          echo "<a href='dbanswer5.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
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
            
                          echo "<a href='dbanswer2.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
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
            
                          echo "<a href='dbanswer3.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['Plant_Name'] . "</a>,";
                    } 
                }
                $sql3 = "SELECT * FROM book5_MEDICINAL_PLANTS_Mongolia WHERE Bioactivites REGEXP '[[:<:]]${value}[[:>:]]' OR Qualitative_and_quantitative_standards REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Qualitative_and_quantitative_assays REGEXP '[[:<:]]${value}[[:>:]]' OR Chemical_constituents REGEXP '[[:<:]]${value}[[:>:]]' OR Microscopic_characteristics REGEXP '[[:<:]]${value}[[:>:]]' 
                  OR Traditional_uses REGEXP '[[:<:]]${value}[[:>:]]' OR Parts_used REGEXP '[[:<:]]${value}[[:>:]]' OR Habitat REGEXP '[[:<:]]${value}[[:>:]]' OR Distribution REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Description REGEXP '[[:<:]]${value}[[:>:]]' OR Synonym REGEXP '[[:<:]]${value}[[:>:]]' OR English_Name REGEXP '[[:<:]]${value}[[:>:]]' OR Tibetan_Name REGEXP '[[:<:]]${value}[[:>:]]'
                  OR Mongolian_Name REGEXP '[[:<:]]${value}[[:>:]]'";

                  $result3 = mysqli_query($link, $sql3);
            
                  if ($queryResults = mysqli_num_rows($result3)) {
                    $book5 = True;
                     while ($row = mysqli_fetch_array($result3)) {
            
                          echo "<a href='dbanswer5.php?ID=" . $row['ID'] . "' style='text-decoration: underline;'>" . $row['English_Name'] . "</a>,";
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

                      //echo "<br>";
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

        if($medplant == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/Medplant.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book1-Medicinal plants in Viet Nam.pdf<a><br>";
        }
        if($book2 == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/book2_Medicinal_Plants_of_Korea.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book2_Medicinal_Plants_of_Korea.pdf<a><br>";
        }
        if($book3 == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/book3_Medicinal_plants_in_China.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book3_Medicinal_plants_in_China.pdf<a><br>";
        }
        if($book5 == True){
          $bookFiles = array_diff(scandir($directory), array('..', '.'));  
          $PDFPrep = '../files/books/book5_MEDICINAL_PLANTS_Mongolia.pdf';
          $fileDirectory = $directory. $bookFiles;
          $PDFDirectory = $PDFPrep . $files;
          echo "<br><a href='{$PDFDirectory}'>book5_MEDICINAL_PLANTS_Mongolia.pdf<a><br>";
        }
        ?>
          <hr>
          <div class="tabs is-toggle is-fullwidth is-large">
            <li class="is-active">
              <a><span>Normal View</span></a>
            </li>
            <li>
              <a href="academicviewdraft2.php"><span>Academic View</span></a>
            </li>
          </div>
      </div>
      </div>
          
</body>

</html>