<?php
header('Content-Type: application/json');
	include "../basecode-create_connection.php";

//this script gets parameters from the ajaxcalls.js script
//uses the GET variables in the url
// Retrieve data from Query String
$classNumber = $_GET['classNumber'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$classNumber = $mysqli->real_escape_string($classNumber);
$rowSectionArray = array();
$rowSubjectArray = array();
$rowTopicArray = array();

//queries the db/table for a row matching the parameter from the url

$query = $mysqli->query("SELECT DISTINCT subjectName FROM subjects WHERE classNumber = '$classNumber'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 or many (if present)

	while ($row=mysqli_fetch_assoc($query)){	//fetch all columns of the query results

		$sub = $row['subjectName'];
		array_push($rowSubjectArray,$sub);	//Id of the returned row

}


		$sendSubjectArray = json_encode($rowSubjectArray);
		echo $sendSubjectArray;


//mysqli_close($mysqli);
?>
