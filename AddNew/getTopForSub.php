<?php
header('Content-Type: application/json');
	include "../basecode-create_connection.php";

//this script gets parameters from the ajaxcalls.js script
//uses the GET variables in the url
// Retrieve data from Query String
$subjectName = $_GET['subjectName'];
$classNumber = $_GET['classNumber'];
// Escape User Input to help prevent SQL Injection and reassign to same variable
$subjectName = $mysqli->real_escape_string($subjectName);
$classNumber = $mysqli->real_escape_string($classNumber);

$rowTopicArray = array();

//queries the db/table for a row matching the parameter from the url

$query = $mysqli->query("SELECT DISTINCT topicName FROM topics WHERE subjectName = '$subjectName' && classNumber = '$classNumber'");

	$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present) or 1 or many (if present).

	while ($row=mysqli_fetch_assoc($query)){	//fetch all columns of the query results

		$top = $row['topicName'];
		array_push($rowTopicArray,$top);	//Id of the returned row

}


		$sendTopicArray = json_encode($rowTopicArray);
		echo $sendTopicArray;


mysqli_close($mysqli);
?>
