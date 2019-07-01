<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['sb'].$_GET['cn'].$_GET['sa'];

print_r($_GET);
$query = ("DELETE FROM subjects WHERE Id = '$remId'");
$mysqli->query($query);
$effRows = mysqli_affected_rows($mysqli);

if ($effRows = 1){
  echo $effRows;
  $message = $_GET['sb']." for  ".$_GET['cn']. $_GET['sa']." has been deleted from the database";
}
else {
  echo $effRows;
  $errno = $stmt->errno;
  $message = "Could not delete". $GET['sb']." for ". $_GET['cn']. $_GET['sa']." - If the error reoccurs, please contact admin with". $errno;
}


// $stmt->close();
$mysqli->close();
	{header('Location: ../SetUpPages/newSubjects.php');}
?>
