<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['cn'].$_GET['sa'];


$query = ("DELETE FROM classes_taught_by_teachers WHERE Id = '$remId'");
$mysqli->query($query);
$effRows = mysqli_affected_rows($mysqli);

if ($effRows = 1){
  echo $effRows;
  $message = $classNumberSafe."-".$sectionAlphaSafe." has been deleted from the database";
}
else {
  echo $effRows;
  $errno = $stmt->errno;
  $message = "Could not add $classNumberSafe $sectionAlphaSafe - If the error reoccurs, please contact admin with $errno";
}


// $stmt->close();
$mysqli->close();
	{header('Location: ../SetUpPages/newclasses_taught_by_teachers.php');}
?>
