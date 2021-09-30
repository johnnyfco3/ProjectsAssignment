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
<!--Main content-->
<div class="card">
  <div class="card-content">
    <div class="content">
<?php
    if (isset($_POST['search'])) {
      //writing the question to a file.txt
      $myfile = fopen("../files/a-db/question.txt","w");
      $questiontxt = $_POST['question'];
      $questionkey = removeCommonWords($questiontxt);
      fwrite($myfile, $questionkey);
      $contents = file_get_contents("../files/a-db/question.txt");
      fclose($myfile);  

      
      $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]${contents}[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]${contents}[[:>:]]'
      OR Parts_Used REGEXP '[[:<:]]${contents}[[:>:]]' OR Distribution REGEXP '[[:<:]]${contents}[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]${contents}[[:>:]]' 
      OR Description REGEXP '[[:<:]]${contents}[[:>:]]' OR English_Names REGEXP '[[:<:]]${contents}[[:>:]]' OR Local_Names REGEXP '[[:<:]]${contents}[[:>:]]' OR
      Plant_Name REGEXP '[[:<:]]${contents}[[:>:]]'";

      $result = mysqli_query($link, $sql);
      if($queryResults = mysqli_num_rows($result)){
      while ($row = mysqli_fetch_array($result)){

      ?>


        <figure class="image">
            <img src="<?php echo $row['Image_Link']; ?>"> <!--Planning on adding image here-->
        </figure>
      </div>
      
      <h1 class="title is-1"><?php echo $row['Plant_Name']; ?></h1>

      <div class="local-name">
        <h1 class="subtitle is-4">Local Name:</h1>
        <?php echo $row['Local_Names']; ?>
      </div>

      <div class="eng-name">
        <h1 class="subtitle is-4">English Name:</h1>
        <?php echo $row['English_Names']; ?>
      </div>

      <div class="description">
        <h1 class="subtitle is-4">Description:</h1>
        <?php echo $row['Description']; ?>
      </div>

      <div class="habitat">
        <h1 class="subtitle is-4">Distribution:</h1>
        <?php echo $row['Distribution']; ?>
      </div>

      <div class="traditional-uses">
        <h1 class="subtitle is-4">Traditional Uses:</h1>
        <?php echo $row['Therapeutic_Uses']; ?>
      </div>

      <div class="constituents">
        <h1 class="subtitle is-4">Chemical Composition:</h1>
        <?php echo $row['Chemical_Composition']; ?>
      </div>

      <div class="biological-activity">
        <h1 class="subtitle is-4">Parts Used:</h1>
        <?php echo $row['Parts_Used']; ?>
      </div>

      <div class="biological-activity">
        <h1 class="subtitle is-4">Flowering Period:</h1>
        <?php echo $row['Flowering_Period']; }?>
    </div>
  </div>
  <?php }}
  echo "<br>";
  echo shell_exec("python ../cgi-bin/v1-web/extractkey.py ${contents}");?>
  </div>
</div>
</div>
</body>
</html>