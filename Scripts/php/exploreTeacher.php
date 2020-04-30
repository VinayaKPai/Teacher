<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $teacherId = $_GET['teacherId'];
  $classNumber = $_GET['classNumber'];
  $sectionAlpha = $_GET['sectionAlpha'];

  $query = $mysqli->query("SELECT * FROM studentdetails, classes_taught_by_teacher, teachers, classes, sections WHERE ctt_teacherId = $teacherId AND classes.classId = $classNumber AND sections.sectionId = $sectionAlpha AND teachers.teacherId = classes_taught_by_teacher.ctt_teacherId AND classes.classId = classes_taught_by_teacher.ctt_classId AND sections.sectionId = classes_taught_by_teacher.ctt_sectionId AND studentDetails.st_classId = classes_taught_by_teacher.ctt_classId AND studentDetails.st_sectionId = classes_taught_by_teacher.ctt_sectionId ");

  // echo "<h5>".."</h5>"
  echo "<table style='width:90%;'><tr><th class='col-sm-2'>Class</th><th class='col-sm-2'>Section</th><th class='col-sm-5'>Student</th></tr>";
  while ($row=$query->fetch_assoc()) {
    $cn = $row['classNumber'];
    $sa = $row['Sections'];
    $sf = $row['st_firstName'];
    $sl = $row['st_lastName'];
    $title = $cn." ".$sa." ".$sl;
    echo "<tr title='$title'>";
    echo "<td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$cn."</td><td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$sa."</td><td class='col-sm-5' style='border-right:solid 1px black;'>".$sf." ".$sl."</td>";
    // echo "<td class='col-sm-3'><button class='btn-xs btn-info' style='float:right;' name='$cn.$sa.$sf.$sl' id='$title'data-toggle='modal' data-target='#exploreModal' style='color:white; cursor: pointer;' onclick='exploreclick(this)' >Explore</button></td>";
    echo "</tr>";
  }
echo "</table>";


?>
