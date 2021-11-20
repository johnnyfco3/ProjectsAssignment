<?php
include_once ('config.php');

  if(isset($_GET['file']))
  {
    $file = $_GET['file'];
    $query = " delete from files where fname = '".$file."'";
    $result = mysqli_query($link,$query);

    if($result)
    {
      header("location:viewfiles.php?success");
    }
    else
    {
      echo ' Please Check Your Query ';
    }
    unlink("../files/books/$file");
  }
  else
  {
    header("location:viewfiles.php?nochange");
  }

 ?>
