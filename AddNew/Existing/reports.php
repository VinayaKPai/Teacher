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

    // Full texts
    // teacherId
    // tc_firstName
    // tc_middleName
    // tc_lastName
    $getTeacherName = $mysqli->query("SELECT `tc_firstName`, `tc_middleName`, `tc_lastName` FROM teachers WHERE `teacherId` = $teacherId");
    $names = $getTeacherName->fetch_assoc();
    $fn = $names['tc_firstName'];
    $mn = $names['tc_middleName'];
    $ln = $names['tc_lastName'];
        // $querystring = ("SELECT * FROM teachers, classes_taught_by_teacher, subjects, classes WHERE teachers.teacherId = $teacherId AND classes_taught_by_teacher.ctt_teacherId = $teacherId AND classes_taught_by_teacher.ctt_subjectId = subjects.subjectId  AND classes_taught_by_teacher.ctt_classId = classes.classId ORDER BY classes.classId ASC");

        $querystring = ("SELECT * FROM teachers, classes_taught_by_teacher, subjects, classes, topics WHERE teachers.teacherId = $teacherId AND classes_taught_by_teacher.ctt_teacherId = $teacherId AND classes_taught_by_teacher.ctt_subjectId = subjects.subjectId  AND classes_taught_by_teacher.ctt_classId = classes.classId AND topics.topic_classId = classes.classId AND topics.topic_subjectId = subjects.subjectId  ORDER BY classes.classId ASC");

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
