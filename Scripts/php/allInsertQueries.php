<?php

  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  //BASIC INSERT query
  //INSERT INTO `classes_taught_by_teacher`(`cttId`, `userId`, `classId`, `sectionId`, `subjectId`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

  // create acceptable data for the 'confirm' post variable to prevent highjacked data
  $confArray = [
    "NSD" => "insertUser",
    "NTD" => "insertUser",
    "CTT" => "insertClassesTaughtByTeachers",
    "MSD" => "insertMoreStuDets",
    "NQD" => "insertQuestion",
    "NUD" => "insertUnit",
    "NToD" => "insertTopic",
    "CNR" => "createNewReport",
    "INTD" => "insertNewToDo",
    "INA" => "insertNewAssessment",
    "INPW" => "insertNewPassword",
    "IND" => "insertNewDeploymentlog"
  ];

  $conf = $_POST['confirm'];

  if (array_key_exists($conf,$confArray)) {
      // insertClassesTaughtByTeachers($_POST);
      $func =  $confArray[$conf];
      echo $func;
      print_r($mysqli);
      $func($_POST, $mysqli,$conf);
  }
  else {
    echo "You do not have permission to perform this action";
  }


  function insertUser ($d, $mysqli,$conf) {
    //insert both student and teacher basic details into the users table
    // print_r($_POST);
    // Admin role user will ONLY be inserted by super admin, so there is no need for it here
    if ($conf=="NTD") {
      $role = 'T';
    }
    else {
      $role = 'S';
    }
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $phoneMobile = $_POST['phoneMobile'];
    $email = $_POST['email'];
    $joinYear = $_POST['joinYear'];
    $endYear = $_POST['endYear'];
    $tpw = $_POST['phoneMobile'];
    $visibility = 'Y';

    $stmt = $mysqli->prepare("INSERT INTO `users`( `role`, `firstName`, `middleName`, `lastName`, `Email`, `pw`, `joinYear`, `endYear`, `phoneMobile`, `visibility`) VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssssss", $role, $firstName, $middleName, $lastName, $email, $tpw, $joinYear, $endYear, $phoneMobile, $visibility);
    // $stmt->execute();
    if (!$stmt->execute()){
    echo ("Errorcode: " . $mysqli -> errno);}
    {header('Location: ../SetUpPages/newTeachers.php');}
  }



  function insertClassesTaughtByTeachers($d, $cn) {}
  function insertQuestion () {}
  function insertUnit () {}
  function insertTopic () {}
  function createNewReport () {}
  function insertNewToDo () {}
  function insertNewAssessment () {}
  function insertNewPassword () {}
  function insertNewDeploymentlog() {
      echo "Hi there";
  }
?>
