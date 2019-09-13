<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $queryTeachers;
  $teacherId;
  $reportName;
  if ($_GET) {
    $teacherId = $_GET['teacherId'];
    $reportName = $_GET['reportName'];

    if ($reportName == "myClasses") {
      $report = "Classes";
    }
    if ($_GET['reportName'] == "myClassesBySubjects") {
      $report = "Classes By Subject";
    }
    if ($_GET['reportName'] == "mySubjectsByTopic") {
      $report = "Subject By Topic Name";
    }

    $getTeacherName = $mysqli->query("SELECT `firstName`, `middleName`, `lastName` FROM teachers WHERE `Id` = $teacherId");
    $names = $getTeacherName->fetch_assoc();
    $fn = $names['firstName'];
    $mn = $names['middleName'];
    $ln = $names['lastName'];
        $querystring = ("SELECT * FROM teachers, classes_taught_by_teacher, subjects, classes WHERE teachers.Id = $teacherId AND classes_taught_by_teacher.teacherId = $teacherId AND subjects.Id = classes_taught_by_teacher.subjectId  AND classes.Id = classes_taught_by_teacher.classId ORDER BY classes.Id ASC");

        $qstring = $mysqli->query($querystring);
        echo "<h5>".$fn." ".$mn." ".$ln." has ".mysqli_num_rows($qstring)." ".$report.".</h5>";


        echo "<table style='width:90%; margin-left:5%;'>";
        while ($qrow = $qstring->fetch_assoc()) {
          echo "<tr>";
            if ($report == "Classes") {
                echo "<td style='text-align:left; padding: 5px;'>".$qrow['classNumber']."</td>";
            }
            if ($report == "Classes By Subject") {
                echo "<td style='text-align:left;  padding: 5px;'>".$qrow['classNumber']." </td><td style='text-align:left;'>".$qrow['Subject']."</td>";
            }
            if ($report == "Subject By Topic Name") {
                echo "<td style='text-align:left;  padding: 5px;'>".$qrow['classNumber']." </td><td style='text-align:left;'>".$qrow['Subject']."</td>";
                $sid = $qrow['subjectId'];
                $topics = $mysqli->query("SELECT `topicName` FROM topics WHERE `subjectId` = $sid ");
                echo "<td style='text-align:left;'><ul>";
                while ($srow = $topics->fetch_assoc()) {
                  echo "<li>".$srow['topicName']."</li>";
                }
                echo "</ul></td>";
            }
            echo "</tr>";
          }
          echo "</table>";
        }
?>
