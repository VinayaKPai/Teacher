<?php
header('Content-Type: application/json');
	// include "../basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT'].'../Scripts/php/queryBuilder.php';
	include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";
	include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToOptions.php";

//URL indexes with multiple values are strings, so convert the index values to arrays

$arrayGETclassNumbers = [];
$arrayGETsubjectNames = [];

if (isset($_GET['classNumber'])) {
	$arrayGETclassNumbers = explode(",",$_GET['classNumber']);
}

if (isset($_GET['subjectName'])) {
	$arrayGETsubjectNames = explode(",",$_GET['subjectName']);
}





$queryString;

$selectedClassNumbers = [];
$selectedSubjectNames = [];

$queryString = "SELECT topics.Id as 'ID', classes.Class_Number as `Class`, subjects.Subject as `Subject`, topics.Topic_Name as `Topic` FROM topics, classes, subjects  WHERE classes.id = topics.Class_Number AND subjects.id = topics.Subject_Name" ;


if ($arrayGETclassNumbers) {
  $selectedClassNumbers = array_values($arrayGETclassNumbers);
  $queryString = addClassNumbersToQueryString($queryString, $selectedClassNumbers);
}

  if ($arrayGETsubjectNames) {
    $selectedSubjectNames = array_values($arrayGETsubjectNames);
    $queryString = addSubjectNamesToQueryString($queryString, isset($arrayGET['classNumber']), $selectedSubjectNames );

  }

	$queryResult = $mysqli->query($queryString);  //use the queryString built above

	selectOption(false, $queryResult);




mysqli_close($mysqli);
?>
