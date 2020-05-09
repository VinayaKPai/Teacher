<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remFn = $_GET['fn']; //first name
$remLn = $_GET['ln']; //last name
$remPm = $_GET['pm']; //mobile


// $query = ("DELETE FROM teachers WHERE firstName = '$remFn' AND lastName = '$remLn' AND phoneNumber = '$remPm'");

$query = "UPDATE `users` SET `visibility`='N' WHERE firstName = '$remFn' AND lastName = '$remLn' AND phoneNumber = '$remPm'";

$mysqli->query($query);
$effRows = mysqli_affected_rows($mysqli);

if ($effRows = 1){
  echo $effRows;
  $message = $_GET['fn']."-".$_GET['ln']." has been deleted from the database";
}
else {
  echo $effRows;
  $errno = $stmt->errno;
  $message = "Could not delete".$_GET['fn']." ".$_GET['ln']." - If the error reoccurs, please contact admin with $errno";
}
echo $message;

// $stmt->close();
$mysqli->close();
	{header('Location: ../SetUpPages/newTeachers.php');}
?>
