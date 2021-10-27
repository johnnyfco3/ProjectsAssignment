<?php
function uploadFile()
{
    $uploaddir = "/html/files/books/";
    $dirpath = realpath(dirname(getcwd())) . $uploaddir;
    $uploadfile = $dirpath . basename($_FILES['userfile']['name']);

    //$fileName = $_FILES['userfile']['name'];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        return "File is valid, and was successfully uploaded.\n";
    } else {
        return "Possible file upload attack!\n";
    }
}
