<?php
$servername = "localhost";
$username = "p_s21_5";
$password = "n5or7p";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " .mysqli_connect_error());
}
echo "Database Connected";
?>
