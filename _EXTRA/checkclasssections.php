<?php

	include "../basecode-create_connection.php";

//this script gets parameters from the ajaxcalls.js script
//uses the GET variables in the url
// Retrieve data from Query String
$classNumber = $_GET['classNumber'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$classNumber = $mysqli->real_escape_string($classNumber);
$sectionAlpha = $_GET['sectionAlpha'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$sectionAlpha = $mysqli->real_escape_string($sectionAlpha);

//queries the db/table for a row matching the parameters from the url
$query = $mysqli->query("SELECT * FROM classes_taught_by_teachers WHERE classNumber = '$classNumber' AND sectionAlpha = '$sectionAlpha'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 (if present)
	$row=mysqli_fetch_assoc($query);	//fetch all columns of the query results

		$rowId = $row['Id'];	//Id of the returned row

		$returnArray = [$rowcount, $rowId];
		$sendArray = json_encode($returnArray);
		echo $sendArray;	//this is what will be held in the ajax Response text in ajaxCalls.js
//mysqli_close($mysqli);
?>
