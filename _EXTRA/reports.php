<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $queryTeachers;
  $teacherId;
  $reportName;
  if ($_GET) {
    $teacherId = $_GET['userId'];
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

    $getTeacherName = $mysqli->query("SELECT `firstName`, `middleName`, `lastName` FROM teachers WHERE `teacherId` = $teacherId");
    $names = $getTeacherName->fetch_assoc();
    $fn = $names['firstName'];
    $mn = $names['middleName'];
    $ln = $names['lastName'];

        $querystring = ("SELECT * FROM users, classes_taught_by_teacher, subjects, classes, topics WHERE users.userId = $teacherId AND classes_taught_by_teacher.userId = $teacherId AND classes_taught_by_teacher.subjectId = subjects.subjectId  AND classes_taught_by_teacher.classId = classes.classId AND topics.classId = classes.classId AND topics.subjectId = subjects.subjectId  ORDER BY classes.classId ASC");

        $qstring = $mysqli->query($querystring);

        echo "<table style='width:90%; margin-left:5%;'>";
        while ($qrow = $qstring->fetch_assoc()) {
          // array array_unique($array , $sort_flags)
          echo "<tr>";
            if ($report == "Classes") {
                echo "<td style='text-align:left; padding: 5px;'>".$qrow['classNumber']."</td>";
            }
            if ($report == "Classes By Subject") {
                echo "<td style='text-align:left;  padding: 5px;'>".$qrow['classNumber']." </td><td style='text-align:left;'>".$qrow['Subject']."</td>";
            }
            if ($report == "Subject By Topic Name") {
                echo "<td style='text-align:left;  padding: 5px;'>".$qrow['classNumber']." </td>
                      <td style='text-align:left;'>".$qrow['Subject']."</td>";
                echo "<td style='text-align:left;'>";
                  echo "<li>".$qrow['topicName']."</li>";
                echo "</td>";
            }
            echo "</tr>";
          }
          echo "</table>";
        }
?>
