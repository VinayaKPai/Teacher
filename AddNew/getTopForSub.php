<?php
header('Content-Type: application/json');
	include "../basecode-create_connection.php";

//this script gets parameters from the ajaxcalls.js script
//uses the GET variables in the url
// Retrieve data from Query String
$subjectNameDG = $_GET['subjectNameDG'];
$classNumberDG = $_GET['classNumberDG'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$subjectNameDG = $mysqli->real_escape_string($subjectNameDG);
$rowSectionArray = array();
$rowSubjectArray = array();
$rowTopicArray = array();

//queries the db/table for a row matching the parameter from the url
$query = $mysqli->query("SELECT * FROM classsections WHERE classNumber = '$classNumberDG' && subjectName = '$subjectNameDG'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 or many (if present)
// 	while ($row=mysqli_fetch_assoc($query)){	//fetch all columns of the query results
//
// 		$cls = $row['subjectName'];
// 		array_push($rowSectionArray,array("cls" => $cls));	//Id of the returned row
//
// }

$query = $mysqli->query("SELECT DISTINCT topicName FROM topics WHERE subjectName = '$subjectNameDG' && classNumber = '$classNumberDG'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 or many (if present)
	while ($row=mysqli_fetch_assoc($query)){	//fetch all columns of the query results

		$sub = $row['subjectName'];
		array_push($rowSubjectArray,$sub);	//Id of the returned row

}


		$sendSubjectArray = json_encode($rowSubjectArray);
		echo $sendSubjectArray;


mysqli_close($mysqli);
?>
