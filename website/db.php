<?php
$servername = "localhost";
$username = "venu_user";
$password = "Life@2021";
$dbname = "venu";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>