<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['cn'].$_GET['sa'];

$t = gettype($remId);
$query = ("DELETE FROM classsections WHERE Id = '$remId'");
$mysqli->query($query);
if ($mysqli->query($query) === TRUE)
{
  echo 1;
} else
{
  echo 0;
}

// $mysqli->close();
	//echo "<h4><a href='../../SetUpPages/newClasses.php'>Add More</a></h4>";
	//header('Location: ../SetUpPages/newclasssections.php');
?>
