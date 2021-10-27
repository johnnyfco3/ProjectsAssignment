<?php
/* Database credentials. */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'p_s21_5');
define('DB_PASSWORD', 'n5or7p');
define('DB_NAME', 'p_s21_5_db');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
