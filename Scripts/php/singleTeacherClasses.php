<table style='width:90%;'><tr><th class='col-sm-2'>Class</th><th class='col-sm-2'>Section</th><th class='col-sm-5'>Subject</th><th class='col-sm-3'>Explore</th></tr>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $teacherId = $_GET['teacherId'];
  if ($teacherId) {
      $query = $mysqli->query("SELECT DISTINCT users.firstName, users.middleName, users.lastName, classes.classId, classes.classNumber, sections.sectionId, sections.Sections, subjects.Subject
        FROM
        users,
        classes_taught_by_teacher,
        teachers,
        classes,
        sections,
        subjects
        WHERE
        classes_taught_by_teacher.userId = $teacherId AND
        users.userId = classes_taught_by_teacher.userId AND
        classes.classId = classes_taught_by_teacher.classId AND
        sections.sectionId = classes_taught_by_teacher.sectionId AND
        subjects.subjectId = classes_taught_by_teacher.subjectId
        ORDER BY classes.classId ASC, sections.sectionId ASC");
    }
    else {
        $query = $mysqli->query("SELECT * FROM classes_taught_by_teacher, teachers, classes, sections, subjects WHERE classes_taught_by_teacher.userId = $teacherId AND users.userId = classes_taught_by_teacher.userId AND classes.classId = classes_taught_by_teacher.classId AND sections.sectionId = classes_taught_by_teacher.sectionId AND subjects.subjectId = classes_taught_by_teacher.subjectId ORDER BY classes.classId ASC");
      }



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
            <button class='btn-xs btn-info' style='float:right;' id='$title' data-toggle='modal' data-target='#exploreModal' style='color:white; cursor: pointer;' onclick='exploreclick(this)' >Explore</button>
          </td>";
    echo "</tr>";
  }


?>
</table>
