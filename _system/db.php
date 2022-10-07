<?php
include_once __DIR__.'/_function.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sausage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>