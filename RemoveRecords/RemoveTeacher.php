<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remFn = $_GET['fn']; //first name
$remLn = $_GET['ln']; //last name
$remPm = $_GET['pm']; //mobile


// $query = ("DELETE FROM teachers WHERE tc_firstName = '$remFn' AND tc_lastName = '$remLn' AND tc_phoneNumber = '$remPm'");

$query = "UPDATE `teachers` SET `tc_visibility`='N' WHERE tc_firstName = '$remFn' AND tc_lastName = '$remLn' AND tc_phoneNumber = '$remPm'";

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
