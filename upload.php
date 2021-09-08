<?php

// Include config file
require_once "config.php";

if(isset($_POST['submit'])){
    $Title = $_POST['title'];
    $Topic = $_POST['topic'];
    $uploads_dir = '/ProjectsAssignment';
    $fname = $_FILES['userfile']['name'];
    move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']);
    $query = "INSERT into p_users (title, topic, fname) values ('$Title', '$Topic', '$fname')";
    $result = mysqli_query($link, $query);
    if($result)
    {
        header("Location: viewfiles.php?uploadsuccess");
    }
    else{
        echo ' Please Check Your Query ';
    }
}