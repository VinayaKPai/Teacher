<?php

  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  //BASIC INSERT query
  //INSERT INTO `classes_taught_by_teacher`(`cttId`, `userId`, `classId`, `sectionId`, `subjectId`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

  // create acceptable data for the 'confirm' post variable to prevent highjacked data
  $confArray = ["CTT" => "insertClassesTaughtByTeachers", "NSD" => "insertStudent", "NTD" => "insertTeacher", "NQD" => "insertQuestion", "NUD" => "insertUnit", "NTD" => "insertTopic"];
print_r ($mysqli);
  $conf = $_POST['confirm'];
  echo $conf;
  if (array_key_exists($conf,$confArray)) {
      // insertClassesTaughtByTeachers($_POST);
      $func =  $confArray[$conf];
      echo $func;
      $func($_POST, $mysqli);
  }
  else {
    dummy();
  }
  function insertClassesTaughtByTeachers($d, $mysqli) {
    foreach ($d as $key => $value) {
      echo "<p>".$key . " is " . $value ."</d>";
      // code...
    }
    $teacherName = $_POST['teacherName'];

    $classNumber = $_POST['classNumber'];

    $sectionAlpha = $_POST['sectionAlpha'];

    $subjectName = $_POST['subjectName'];

    $stmt = $mysqli->prepare("INSERT INTO `classes_taught_by_teacher`( `userId`, `classId`, `sectionId`, `subjectId`) VALUES (?,?,?,?)");
    $stmt->bind_param("iiii", $teacherName, $classNumber, $sectionAlpha, $subjectName);
    echo ("Errorcode: " . $mysqli -> errno);
  }

  function dummy() {
    echo "DUMMY";
  }
?>
