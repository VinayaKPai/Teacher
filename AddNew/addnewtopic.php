<?php
//WORKING CORRECTLY ON 26/6/2020 at 12:09
//WORKING IN BRANCH StudentDisplayInTeachersPage
include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
echo "Adding new topic<br>";
  print_r($_POST);

  $classNumber = $_POST['classNumber'];

  $subjectName = $_POST['subjectName'];

  $topicName = $_POST['topicName'];

  $stmt = $mysqli->prepare("INSERT INTO `topics`( `classId`, `subjectId`, `topicName`) VALUES (?,?,?)");

  $stmt->bind_param("iis", $classNumber, $subjectName, $topicName);
  $stmt->execute();
  // if (!$stmt->execute()){
  // echo ("Errorcode: " . $mysqli -> errno);}
  // else {echo "added";}

?>
