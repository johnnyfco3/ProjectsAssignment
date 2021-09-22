<?php
    require_once "config.php";

    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM files WHERE TID LIKE $ID";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $file = $row['fname'];
        }
        header("content-disposition: attachment; filename=" . basename($file));

        $fb = fopen($file, "r");

        while(!feof($fb)){
            echo fread($fb, 8192);
            flush();
        }

        fclose($fb);
    } 
?>