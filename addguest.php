<?php

session_start();
require_once 'dp.php';


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";
//echo $sql; die;
if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = "guestadded";
  header("location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>