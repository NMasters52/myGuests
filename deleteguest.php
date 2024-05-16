<?php
session_start();

if(isset($_POST['id'])) {
    //delete from the database
    require_once 'dp.php';

// sql to delete a record
$sql = "DELETE FROM myguests WHERE id='{$_POST['id']}'";
if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = "guestdeleted";
  header("location: index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

} else {
    header("location:index.php");
}
?>