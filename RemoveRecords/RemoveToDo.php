<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['recordId'];

print_r($_GET);
$query = ("DELETE FROM todolist WHERE todoId = '$remId'");
$mysqli->query($query);
$effRows = mysqli_affected_rows($mysqli);

if ($effRows = 1){
  echo $effRows;
  $message = $_GET['recordId']." has been deleted from the database";
}
else {
  echo $effRows;
  $errno = $stmt->errno;
  $message = "Could not delete". $_GET['recordId']." - If the error reoccurs, please contact admin with". $errno;
}


// $stmt->close();
$mysqli->close();
            	{header('Location: ../../index.php');}
?>
