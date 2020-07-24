<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/queryBuilder.php";
    // code to insert a new assignment into the db
    $arrayGET = $_GET['qarray'];

//MODIFY BELOW CODE FOR INSERTING ASSIGNMENT INTO THE DB
    $inpTitle = $_GET['inpTitle'];

    $stmt = $mysqli->prepare("INSERT INTO `assessments`( `assessment_Title`, `assessment_questions`) VALUES (?, ?)");
    $stmt->bind_param("ss", $inpTitle,  $arrayGET);
    $mysqli->autocommit(TRUE);
$stmt->execute();
echo $mysqli->errno;



echo "===============";
$assId = $mysqli->insert_id;

$arg = explode(",",$arrayGET);

$stmtaq = $mysqli->prepare("INSERT INTO `assessment_questions` ( `assessment_Id`, `question_Id`) VALUES (?, ?)  ");

$len = count($arg);

for ($i=0;$i<$len;$i++) {
  echo gettype($arg[$i]);
  $stmtaq->bind_param("ii", $assId, $arg[$i]);
  $mysqli->autocommit(TRUE);
  $stmtaq->execute();
}
echo $mysqli->errno;
    // $stmt->close();
    // $mysqli->close();
?>
