<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $studentId = $_GET['studentId'];
  echo $studentId;

  $query = $mysqli->query("SELECT * FROM studentdetails, classes, sections WHERE studentdetails.sId = '$studentId' AND classes.classId = studentdetails.st_classId AND sections.sectionId = studentdetails.st_sectionId ");


  echo "<table style='width:90%;'><tr><th class='col-sm-2'>Class-Section</th><th class='col-sm-2'>Roll Number</th><th class='col-sm-5'>Alternate Email</th><th class='col-sm-3'>Explore</th></tr>";
  while ($row=$query->fetch_assoc()) {
    $cn = $row['classNumber'];
    $cnId = $row['classId'];
    $sa = $row['Sections'];
    $saId = $row['sectionId'];
    $rn = $row['rollNumber'];
    $altEmail = $row['st_Email'];
    $title = $studentId." ".$cnId." ".$saId;
    echo "<tr title='$title'>";
    echo "<td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$cn." ".$sa."</td>
          <td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$rn."</td>
          <td style='padding:5px; border-right:solid 1px black;' class='col-sm-5'>".$altEmail."</td>
          <td class='col-sm-3'>
            <button class='btn-xs btn-info' style='float:right;' id='$title'data-toggle='modal' data-target='#exploreModal' style='color:white; cursor: pointer;' onclick='exploreclick(this)' >Explore</button>
          </td>";
    echo "</tr>";
  }
echo "</table>";


?>
