<?php
$servername = "localhost";
$username = "nmasters";
$password = "kneTe6EtaU2MFpR4";
$dbname = "nmasters";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>