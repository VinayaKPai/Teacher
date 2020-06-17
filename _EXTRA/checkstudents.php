<?php

	include "../basecode-create_connection.php";

//this script gets parameters from the ajaxcalls.js script
//uses the GET variables in the url
// Retrieve data from Query String
$firstName = $_GET['firstName'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$firstName = $mysqli->real_escape_string($firstName);
$lastName = $_GET['lastName'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$lastName = $mysqli->real_escape_string($lastName);
$phoneMobile = $_GET['phoneMobile'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$phoneMobile = $mysqli->real_escape_string($phoneMobile);

//queries the db/table for a row matching the parameters from the url
$query = $mysqli->query("SELECT * FROM studentdetails WHERE firstName = '$firstName' AND lastName = '$lastName' AND phoneMobile = '$phoneMobile'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 (if present)
	$row=mysqli_fetch_assoc($query);	//fetch all columns of the query results

		$rowId = $row['Id'];	//Id of the returned row

		$returnArray = [$rowcount, $rowId];
		$sendArray = json_encode($returnArray);
		echo $sendArray;	//this is what will be held in the ajax Response text in ajaxCalls.js
//mysqli_close($mysqli);
?>
