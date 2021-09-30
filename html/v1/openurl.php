<?php
    require_once "config.php";

    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM files WHERE TID LIKE $ID";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $url = $row['fname'];
        }
        header("Location: $url");
    } 
?>