<style>
 table tr:nth-child(even){background-color: #C5B2B3; color: #000}
 table tr:nth-child(odd){background-color: #b69092; color: #000}
 table th {background-color: #684654; color: #fff}
 table td, th {text-align: center;}
 table {width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';}
</style>
<?php
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
include $_SERVER['DOCUMENT_ROOT'].'../Scripts/php/queryBuilder.php';
include $_SERVER['DOCUMENT_ROOT']."../Scripts/php/sqlQueryResultToHtmlTable.php";
// phpinfo();
// this is coming from newQuestions.php
$queryString;
print_r($_POST);
$arrayPOST = $_POST;
$selectedSubjectNames = [];
$selectedSubjectNames = array_values($arrayPOST['subjectName']);
$selectedClassNumbers = [];
$selectedClassNumbers = array_values($arrayPOST['classNumber']);
print_r($selectedClassNumbers);
$selectedTopicName;
$selectedTopicName = $arrayPOST['topicName'];
$selectedTypeName;
$selectedTypeName = $arrayPOST['typeName'];


//BUILD A QUERY STRING USING THE CLASSNUMBERS AND SUBJECTNAMES COMING FROM THE FORM WITH SUBMIT BUTTON ON NEWQUESTIONS PAGE
//THIS WILL DISPLAY ALL THE QUESTIONS IN THE DB FOR THAT COMBO OF CLASSNUMBERS AND/OR SUBJECTNAMES
//FURTHER FILTERING OF THE QUESTIONS IS HANDLES IN THE filterRecords.js file

$queryString = "SELECT questionbank.qId as 'ID', classes.classNumber as `Class`, subjects.subjectName as `Subject`, topics.topicName as `Topic`, questiontype.typeName as `Type`, questionbank.question as `Question`, questionbank.Option_1 as `Option 1`, questionbank.Option_2 as `Option 2`, questionbank.Option_3 as `Option 3`, questionbank.Option_4 as `Option 4`, questionbank.Option_5 as `Option 5`, questionbank.Option_6 as `Option 6` FROM questionbank, classes, questiontype, subjects, topics WHERE classes.classId = questionbank.classId AND subjects.subjectId = questionbank.subjectId AND topics.topicId = questionbank.topicId AND questiontype.qtId = questionbank.typeId ";



if (isset($arrayPOST['classNumber'])) {
  $queryString = addClassNumbersToQueryString($queryString, $selectedClassNumbers);
  echo "<br>".$queryString."<br>";
}

  if (isset($arrayPOST['subjectName'])) {
    // echo "test";
    $queryString = addSubjectNamesToQueryString($queryString, isset($arrayPOST['classNumber']), $selectedSubjectNames );
    // $queryString = $queryString."<br>";
  }

  if(isset($arrayPOST['topicName'])) {
    $queryString = addTopicNameToQueryString( $queryString, isset($arrayPOST['classNumber']), isset($arrayPOST['subjectName']), $selectedTopicName );
  }

  if(isset($arrayPOST['typeName'])) {
    $queryString = addTypeNameToQueryString( $queryString, isset($arrayPOST['classNumber']), isset($arrayPOST['subjectName']), isset($arrayPOST['topicName']), $selectedTypeName );
  }
echo $queryString;
$queryResult = $mysqli->query($queryString);  //use the queryString built above
table(false, $queryResult);
	//mysqli_close($mysqli);
  // {header('Location: ../../SetupPages/newQuestions.php');}

?>
