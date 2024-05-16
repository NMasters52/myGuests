<?php
if(!isset($_POST['editguest'])) {
    header("Location: index.php");
}
session_start();
require_once 'dp.php';

$guestID = $_POST['id'];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
   
   
    $sql = "UPDATE myguests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$guestID";
    // echo $sql;die;
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "guestupdated";
        header("Location: index.php");
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?> 






<?php
// if(isset($_POST['updateguest'])) {
    //update from the database
    

   /* $sql = "UPDATE myguests SET firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}', email='{$_POST['email']}' WHERE id='{$_POST['id']}'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "guestupdated";
        header("location: index.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }

mysqli_close($conn);

} else {
    header("location:index.php");
} */
?>