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
<?php
    if (isset($_POST['search'])) {
      //writing the question to a file.txt
      $myfile = fopen("question.txt","w");
      $questiontxt = $_POST['question'];
      $questionkey = removeCommonWords($questiontxt);
      fwrite($myfile, $questionkey);
      $contents = file_get_contents("question.txt");
      fclose($myfile);
      
      $sql = "SELECT * FROM Medplant WHERE Therapeutic_Uses REGEXP '[[:<:]]Jcquirity[[:>:]]' OR Chemical_Composition REGEXP '[[:<:]]Jcquirity[[:>:]]'
      OR Parts_Used REGEXP '[[:<:]]Jcquirity[[:>:]]' OR Distribution REGEXP '[[:<:]]Jcquirity[[:>:]]' OR Flowering_Period REGEXP '[[:<:]]Jcquirity[[:>:]]' 
      OR Description REGEXP '[[:<:]]Jcquirity[[:>:]]' OR English_Names REGEXP '[[:<:]]Jcquirity[[:>:]]' OR Local_Names REGEXP '[[:<:]]Jcquirity[[:>:]]' OR
      Plant_Name REGEXP '[[:<:]]Jcquirity[[:>:]]'"; //need to replace Jcquirity with $contents but struggling

      $result = mysqli_query($link, $sql);
      if($queryResults = mysqli_num_rows($result)){
      echo $queryResults;       //added echo to check how many results there are
      while ($row = mysqli_fetch_array($result)){ 
      ?>

<div class="columns">
    <div class="column">
    <figure class="image">
        <img src="<?php echo $row['Image_Link']; ?>"> <!--Planning on adding image here-->
    </figure>
    </div>

    <div class="column is-two-thirds">
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
        <?php echo $row['Flowering_Period']; }}}?>
    </div>

    <div class="source">
        <h1 class="subtitle is-4">Sources:</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
</div>
</body>
</html>