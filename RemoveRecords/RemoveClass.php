<?php
session_start();
 include "../basecode-create_connection.php"; //working fine DO NOT TOUCH!
//Script to remove class

$cn = $_GET['cn'];
$sa = $_GET['sa'];
echo "<br>^^^^^^^^^^^^^^^^^^^<br>";
echo "From Remove class<script>console.log('" . json_encode($cn) . "-" . $cn . "~~~~" . json_encode($sa) . "-"  . $sa ."');</script>";

if ($cn && $sa) {
  echo $cn , $sa;
}
else {
  echo "<script>console.log('failed');</script>"
}
// $query = mysqli->query("SELECT * classsections" WHERE 'className' = $cn && 'sectionAlpha' = $sa);


// $stmt->close();
// $mysqli->close();
	//echo "<h4><a href='../../SetUpPages/newClasses.php'>Add More</a></h4>";
	//header('Location: ../SetUpPages/newclasssections.php');
?>
