<?php

	include "../basecode-create_connection.php";


// Retrieve data from Query String
$classNumber = $_GET['classNumber'];
// Escape User Input to help prevent SQL Injection
$classNumber = $mysqli->real_escape_string($classNumber);
$sectionAlpha = $_GET['sectionAlpha'];
// Escape User Input to help prevent SQL Injection
$sectionAlpha = $mysqli->real_escape_string($sectionAlpha);

//$rowcount = 0;
$query = $mysqli->query("SELECT * FROM classsections WHERE classNumber = '$classNumber' AND sectionAlpha = '$sectionAlpha'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 or 1
	$row=mysqli_fetch_assoc($query);	//fetch all colums of the query results

		$rowId = $row['Id'];	//Id of the returned row

		$returnArray = [$rowcount, $rowId];
		$sendArray = json_encode($returnArray);
		echo $sendArray;	//this is what will be held in the ajax Response text in ajaxCalls.js
mysqli_close($mysqli);
?>
