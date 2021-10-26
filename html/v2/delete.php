<?php
include_once ('config.php');

  if(isset($_GET['file']))
  {
    $file = $_GET['file'];
    $query = " delete from files where fname = '".$file."'";
    $result = mysqli_query($link,$query);

    if($result)
    {
      header("location:viewfiles.php");
    }
    else
    {
      echo ' Please Check Your Query ';
    }
  }
  else
  {
    header("location:viewfiles.php");
  }

 ?>
