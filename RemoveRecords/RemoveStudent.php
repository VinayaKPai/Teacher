<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['fn'].$_GET['ln'].$_GET['pm'];


$query = ("DELETE FROM studentdetails WHERE Id = '$remId'");
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
	{header('Location: ../SetUpPages/newStudents.php');}
?>
