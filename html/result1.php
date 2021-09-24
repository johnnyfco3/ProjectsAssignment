<?php
#require "config.php";
include "qa.php";
include "removeCommonWords.php";
error_reporting(0);
?>
<!DOCTYPE html>
<style>
  .navbar-brand {
    font-size: 25px;
    font-family: fantasy;
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
  <title>Results Page</title>
</head>

<body>
  <table>


    <tr>
      <th>Image Link</th>
      <th>Therapeutic Uses</th>
      <th>Chemical Composition</th>
      <th>Parts Used</th>
      <th>Distribution</th>
      <th>Flowering Period</th>
      <th>Description</th>
      <th>English Name</th>
      <th>Local Name</th>
      <th>Plant Name</th>
      <th>Plant Number</th>

    </tr><br>


    <?php
    $connection = mysqli_connect("localhost", "root");
    $db = mysqli_select_db($connection, "DataTest");

    if (isset($_POST['search'])) {

      
    


     


    

      //writing the question to a file.txt
      $myfile = fopen("question.txt","w");
      $questiontxt = $_POST['id'];
      $questionkey = removeCommonWords($questiontxt);
      fwrite($myfile, $questionkey);
      fclose($myfile);
      echo $questionkey; //Test to show question key on screen
       //$questionkey  holds the keyword! here Webcrawler can use question.txt/$questionkey has a key for info from a website

       //Johnny's code for searching the Query for the specified keyword below:
      $search = mysqli_real_escape_string($link, $questionkey);
      $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses LIKE '%$search%' OR Chemical_Composition LIKE '%$search%' 
        OR Parts_Used LIKE '%$search%' OR Distribution LIKE '%$search%' OR Flowering_Period LIKE '%$search%' 
        OR Description LIKE '%$search%' OR English_Names LIKE '%$search%' OR Local_Names LIKE '%$search%' OR Plant_Name LIKE '%$search%'
        OR  LIKE '%$search%'";
      $result = mysqli_query($link, $sql);
     // $queryResults = mysqli_num_rows($result);
      echo $queryResults;       //added echo to check how many results there are 
   
      


      //HENRYS TEST CODE FOR  LOOKING UP ID, (WORKS)
      $id = $_POST['id'];
      $query = "SELECT * FROM `Medplant` where id='$id' ";
      $query_run = mysqli_query($connection, $query);
     //tried changing the below parameter in the msqli_fetch_array to take in $result (result of the string sql search query)
     //nothing happens for now though, changed back to query-run
      while ($row = mysqli_fetch_array($query_run)){





    ?>
        <tr>

          <br>

          <td> <?php echo $row['Image_Link']; ?> </td>
          <td> <?php echo $row['Therapeutic_Uses']; ?> </td>
          <td> <?php echo $row['Chemical_Composition']; ?> </td>
          <td> <?php echo $row['Parts_Used']; ?> </td>
          <td> <?php echo $row['Distribution']; ?> </td>
          <td> <?php echo $row['Flowering_Period']; ?> </td>
          <td> <?php echo $row['Description']; ?> </td>
          <td> <?php echo $row['English_Names']; ?> </td>
          <td> <?php echo $row['Local_Names']; ?> </td>
          <td> <?php echo $row['Plant_Name']; ?> </td>
          <td> <?php echo $row['Plant_Number']; ?> </td>
        </tr>

    <?php

      }
    }
    ?>




  </table>



</body>

</html>