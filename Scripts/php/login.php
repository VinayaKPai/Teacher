<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $Utype = $_POST['Utype'];
  $loggedUserId = $_POST['phemail'];
  echo $Utype." ".$loggedUserId;
  //right now assuming that this is the email.
  //Will need to include other forms of identification later .

  if ($Utype=="S") {
    $userType = "Student";
    $_SESSION['userType'] = $userType;
    postStudentLogin($mysqli, $Utype, $loggedUserId);
  }
  elseif ($Utype=="T") {
    $userType = "Teacher";
    $_SESSION['userType'] = $userType;
    teacherLogin($mysqli, $Utype, $loggedUserId);
  }
  elseif ($Utype=="A") {
    $userType = "Administrator";
    $_SESSION['userType'] = $userType;
    adminLogin($mysqli, $Utype, $loggedUserId);
  }
  else {
    echo "Unauthorized login attempt";
  }

  function postStudentLogin ($mysqli, $Utype, $loggedUserId) {
      $query = $mysqli->query("SELECT * FROM `studentdetails`
        INNER JOIN users on users.userId = studentdetails.userId
        INNER JOIN classes as c on c.classId = studentdetails.classId
        INNER JOIN sections as s on s.sectionId = studentdetails.sectionId
        WHERE users.Email = '$loggedUserId'");
      $dets = $query->fetch_assoc();
      if (mysqli_num_rows($query)==0) {
        echo "User does not exist";
      }

      $role = $dets['role'];
      if ($role != $Utype) {
        echo "You are not authorised to view this page.";
        echo "Possible reason: <li>Login credentials are incorrect</li><li>Forgot to select your role before logging in</li>";
        echo "<a href='/index.php'>Back to Login Page</a>";
      }
      else {
          $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];
          $classNumber = $dets['classId'];
          $sectionNumber = $dets['sectionId'];

          $_SESSION['userId'] = $dets['userId'];
          $_SESSION['user'] = $userName;
          $_SESSION['sectionNumber'] = $sectionNumber;
          $_SESSION['classNumber'] = $classNumber;
          $_SESSION['c'] = $dets['classNumber'];
          $_SESSION['d'] = $dets['sectionName'];
        }
          // {header('Location:/StudentViews/indexS.php?c='.$clnm.'&d='.$scnm);}
          {header('Location:/StudentViews/indexS.php');}
    }

  function teacherLogin($mysqli, $Utype, $loggedUserId) {
    echo  $Utype.", ".$loggedUserId;
    //only checks for the teacher in the user table and creates a couple of session variables.
    $query = $mysqli->query("SELECT * FROM `users` WHERE `Email`='$loggedUserId' AND `role` = '$Utype'");
    $cnt = mysqli_num_rows($query);
    if ($cnt==0) {
      echo "User does not exist";
    }
    else {
      while ($dets = $query->fetch_assoc()) {
        $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];
        $_SESSION['user'] = $userName;
        $_SESSION['userId'] = $dets['userId'];
      }
      postTeacherLogin($mysqli, $Utype, $loggedUserId);
    }
  }
  function postTeacherLogin($mysqli, $Utype, $loggedUserId) {
    //get all the classes taught by the teacher
    //create session variables to facilitate getting appropriate data for other teacher view pages
    $query = $mysqli->query("SELECT * FROM `classes_taught_by_teacher` as ctt
      INNER JOIN users on users.userId = ctt.userId
      INNER JOIN classes as c on c.classId = ctt.classId
      INNER JOIN sections as s on s.sectionId = ctt.sectionId
      WHERE users.Email = '$loggedUserId'
       ORDER BY ctt.classId ASC");

    $cnt = mysqli_num_rows($query);
    // echo $cnt;
    if ($cnt==0) {
      $url = 'Location:/TeacherViews/indexT.php';
    }

    else {
        $url = 'Location:/TeacherViews/indexT.php?c=';
        $clArray = [];//used in loggedtop.php and generateopenactivities.php for students

        $subArray = [];//used in subjectdropdown.php
        $clsecArray = [];//to be used in Scripts/php/studentsQueryResultToHtmlDiv

        while ($dets = $query->fetch_assoc()) {
          $cls = $dets['classNumber']; //I,II etc
          $scs = $dets['sectionName'];//A,B etc
          $cli = $dets['classId'];
          $sci = $dets['sectionId'];
          // $clsecid = $dets['classId'];
          // $scid = $dets['sectionId'];
          // $csIds = [$clsecid,$scid];
          // array_push($clsecIdArray,$csIds);
          //create the $_GET parameters
          $clsec = $cli."-".$cls."-".$scs."-".$sci;
          $url = $url.$cls."-".$scs.",";
          $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];

          array_push($clArray,$cli);
          array_push($clsecArray,$clsec);
          array_push($subArray,$dets['subjectId']);//1,2,3 etc
        }
        $url = rtrim($url, ",");
        // $_SESSION['clsecIdArray'] = $clsecIdArray;
        $_SESSION['c'] = $clArray;
        $_SESSION['sub'] = $subArray;
        $_SESSION['clsec'] = $clsecArray;
        $url = $url."&cnt=".$cnt;
        $url = $url."&d=";
    }

      // print_r($)
      {header($url);}
  }

  function adminLogin($mysqli, $Utype, $loggedUserId) {
    $query = $mysqli->query("SELECT * FROM `users` WHERE `Email`='$loggedUserId' AND `role` = '$Utype'");
    $cnt = mysqli_num_rows($query);
    if ($cnt==0) {
      echo "User does not exist";
    }
    else {
      while ($dets = $query->fetch_assoc()) {
        $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];
        $_SESSION['user'] = $userName;
        $_SESSION['userId'] = $dets['userId'];
      }
      postAdminLogin($mysqli, $Utype, $loggedUserId);
    }
  }
  function postAdminLogin($mysqli, $Utype, $loggedUserId) {
    $query = $mysqli->query("SELECT * FROM `classes_taught_by_teacher` as ctt
      INNER JOIN users on users.userId = ctt.userId
      INNER JOIN classes as c on c.classId = ctt.classId
      INNER JOIN sections as s on s.sectionId = ctt.sectionId
      WHERE users.Email = '$loggedUserId'
       ORDER BY ctt.classId ASC");

    $cnt = mysqli_num_rows($query);
    // echo $cnt;
    if ($cnt==0) {
      $url = 'Location:/AdminViews/indexA.php';
    }

    else {
        $url = 'Location:/AdminViews/indexA.php?c=';
        $clArray = [];
        $subArray = [];
        $clsecArray = [];
        while ($dets = $query->fetch_assoc()) {
          $cls = $dets['classNumber']; //I,II etc
          $scs = $dets['sectionName'];
          //create the $_GET parameters
          $clsec = $cls."-".$scs;
          $url = $url.$cls."-".$scs.",";
          $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];
          array_push($clArray,$dets['classId']); //array_push($a,"blue","yellow");
          array_push($clsecArray,$clsec);
          array_push($subArray,$dets['subjectId']);//1,2,3 etc
        }
        $url = rtrim($url, ",");

        $_SESSION['c'] = $clArray;
        $_SESSION['sub'] = $subArray;
        $_SESSION['clsec'] = $clsecArray;
        $url = $url."&cnt=".$cnt;
        $url = $url."&d=";
    }

      // print_r($)
      {header($url);}
  }


?>
