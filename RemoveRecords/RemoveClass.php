<?php

 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class
$remId = $_GET['cn'].$_GET['sa'];

$t = gettype($remId);
$query = ("DELETE FROM classsections WHERE 'Id' = $remId");
if ($mysqli->query($query) === TRUE)
{
  echo "Removed";
} else
{"Error deleting record: " . $query->error;}
//$query->execute();

// $stmt->close();
// $mysqli->close();
	//echo "<h4><a href='../../SetUpPages/newClasses.php'>Add More</a></h4>";
	//header('Location: ../SetUpPages/newclasssections.php');
?>
