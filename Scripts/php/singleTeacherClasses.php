<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $teacherId = $_GET['teacherId'];

  $query = $mysqli->query("SELECT * FROM classes_taught_by_teacher, teachers, classes, sections, subjects WHERE ctt_teacherId = $teacherId AND teachers.teacherId = classes_taught_by_teacher.ctt_teacherId AND classes.classId = classes_taught_by_teacher.ctt_classId AND sections.sectionId = classes_taught_by_teacher.ctt_sectionId AND subjects.subjectId = classes_taught_by_teacher.ctt_subjectId ORDER BY classes.classId ASC");

  echo "<h6 class='centered'>To see students for each class click Explore button</h6>";
  echo "<table style='width:90%;'><tr><th class='col-sm-2'>Class</th><th class='col-sm-2'>Section</th><th class='col-sm-5'>Subject</th><th class='col-sm-3'>Explore</th></tr>";
  while ($row=$query->fetch_assoc()) {
    $cn = $row['classNumber'];
    $cnId = $row['classId'];
    $sa = $row['Sections'];
    $saId = $row['sectionId'];
    $su = $row['Subject'];
    $title = $teacherId." ".$cnId." ".$saId." ".$su;
    echo "<tr title='$title'>";
    echo "<td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$cn."</td>
          <td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$sa."</td>
          <td class='col-sm-5' style='border-right:solid 1px black;'>".$su."</td>
          <td class='col-sm-3'>
            <button class='btn-xs btn-info' style='float:right;' id='$title'data-toggle='modal' data-target='#exploreModal' style='color:white; cursor: pointer;' onclick='exploreclick(this)' >Explore</button>
          </td>";
    echo "</tr>";
  }
echo "</table>";


?>
