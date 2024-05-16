<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
<h1>My Guests Application</h1>

<?php
if(isset($_SESSION['message'])) {
  if($_SESSION['message'] == 'guestadded' ) {
  echo '<div class="alert alert-success"> 
  <strong> Success! </strong> Guest added. </div>';
}
  if($_SESSION['message'] == 'guestdeleted' ) {
  echo '<div class="alert alert-danger"> 
  <strong> Success!</strong> Guest deleted. </div>';
}
if($_SESSION['message'] == 'guestupdated' ) {
  echo '<div class="alert alert-warning"> 
  <strong> Success!</strong> Guest Updated. </div>';
}

unset($_SESSION['message']);
}

if(isset($_POST['editguest'])) {
?>
<form action="updateguest.php" method="post">
  <input type="hidden" name="id" value="<?=$_POST['id']?>">
<label>First Name: <input class="form-control"  type="text" name="firstname" value="<?=$_POST['firstname']?>" required></label>
<br>
<label>Last Name: <input class="form-control" type="text" name="lastname" value="<?=$_POST['lastname']?>" required></label>
<br>
<label>Email: <input class="form-control" type="email" name="email"  value="<?=$_POST['email']?>"required></label>
<br>
<button type="submit" name="updateguest" class="btn btn-info">Update Guest</button>
</form>
 
<?php
} else {
?>

<form action="addguest.php" method="post">
<label>First Name: <input class="form-control" type="text" name="firstname" value="Nicholas" required></label>
<br>
<label>Last Name: <input class="form-control" type="text" name="lastname" value="Masters" required> </label>
<br>
<label>Email: <input class="form-control" type="email" name="email" value="nmasters52@gmail.com" required> </label>
<br>
<button type="submit" name="addguest" class="btn btn-success">Add Guest</button>
</form>
<?php
}
?>


 <br>

<table class="table table-hover table-striped">
<thead>
  <td>ID</td>
  <td>firstname</td>
  <td>lastname</td>
  <td>email</td>
  <td>reg_date</td>
  <td>Delete</td> 
  <td>Edit</td>
</thead>
<tbody>
<?php

require_once 'dp.php';

$sql = "SELECT id, firstname, lastname, email, reg_date FROM myguests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>

    
<tr>
  <td><?=$row['id']?></td>
  <td><?=$row['firstname']?></td>
  <td><?=$row['lastname']?></td>
  <td><?=$row['email']?></td>
  <td><?=$row['reg_date']?></td>
  <td><form action="deleteguest.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <button type="submit" name="deleteguest" class="btn btn-sm btn-danger">x</button>
  </form></td>
  <td><form action="index.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="hidden" name="firstname" value="<?=$row['firstname']?>">
    <input type="hidden" name="lastname" value="<?=$row['lastname']?>">
    <input type="hidden" name="email" value="<?=$row['email']?>">
    <button type="submit" name="editguest" class="btn btn-sm btn-success">edit</button>
  </form></td>
</tr>

<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>



</table>
</div></div></div>



</body>



<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





</html>