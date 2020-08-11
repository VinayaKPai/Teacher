<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $Utype = $_POST['Utype'];
  $loggedUserId = $_POST['phemail'];
  //right now assuming that this is the email.
  //Will need to include other forms of identification later .

  if ($Utype=="S") {
    postStudentLogin($mysqli, $Utype, $loggedUserId);
  }
  elseif ($Utype=="T") {
    postTeacherLogin($mysqli, $Utype, $loggedUserId);
  }
  elseif ($Utype=="A") {
    postAdminLogin($mysqli, $Utype, $loggedUserId);
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

          $_SESSION['user'] = $userName;
          $_SESSION['sectionNumber'] = $sectionNumber;
          $_SESSION['classNumber'] = $classNumber;
          $_SESSION['c'] = $dets['classNumber'];
          $_SESSION['d'] = $dets['sectionName'];
        }
          // {header('Location:/StudentViews/indexS.php?c='.$clnm.'&d='.$scnm);}
          {header('Location:/StudentViews/indexS.php');}
    }

  function postTeacherLogin($mysqli, $Utype, $loggedUserId) {
    $query = $mysqli->query("SELECT * FROM `classes_taught_by_teacher` as ctt
      INNER JOIN users on users.userId = ctt.userId
      INNER JOIN classes as c on c.classId = ctt.classId
      INNER JOIN sections as s on s.sectionId = ctt.sectionId
      WHERE users.Email = '$loggedUserId'
       ORDER BY ctt.classId ASC");
    // $dets = $query->fetch_assoc();
    $cnt = mysqli_num_rows($query);
    if ($cnt==0) {
      echo "User does not exist";
    }

    else {
        $url = 'Location:/TeacherViews/indexT.php?c=';
        while ($dets = $query->fetch_assoc()) {
          $cls = $dets['classNumber'];
          $scs = $dets['sectionName'];
          $url = $url.$cls."-".$scs.",";
          $userName = $dets['firstName']." ".$dets['middleName']." ".$dets['lastName'];
        }
        $url = rtrim($url, ",");
      }
      $_SESSION['user'] = $userName;
      $url = $url."&cnt=".$cnt;
      // print_r($)
      {header($url);}
  }
  if ($Utype=="A") {
    {header('Location:/AdminViews/indexA.php');}
  }


?>
