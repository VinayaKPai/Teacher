<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $studentId = $_GET['studentId'];
echo $studentId."<br>"."Printing... GET";
  print_r($_GET);
  // $query = $mysqli->query("SELECT * FROM studentdetails, classes, sections WHERE users.userId = $studentId AND studentdetails.classId = classes.classId AND studentdetails.sectionId = sections.sectionId ");

$query = $mysqli->query("SELECT * FROM users, studentdetails, classes, sections WHERE users.userId = $studentId AND classes.classId = studentdetails.classId AND sections.sectionId = studentdetails.sectionId ");
  echo "<table style='width:90%;'><tr><th class='col-sm-2'>Class</th><th class='col-sm-2'>Section</th><th class='col-sm-5'>Student</th></tr>";
  while ($row=$query->fetch_assoc()) {
    $cn = $row['classNumber'];
    $sa = $row['Sections'];
    $sf = $row['firstName'];
    $sl = $row['lastName'];
    $title = $cn." ".$sa." ".$sl;
    echo "<tr title='$title'>";
    echo "<td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$cn."</td><td style='padding:5px; border-right:solid 1px black;' class='col-sm-2'>".$sa."</td><td class='col-sm-5' style='border-right:solid 1px black;'>".$sf." ".$sl."</td>";
    // echo "<td class='col-sm-3'><button class='btn-xs btn-info' style='float:right;' name='$cn.$sa.$sf.$sl' id='$title'data-toggle='modal' data-target='#exploreModal' style='color:white; cursor: pointer;' onclick='exploreclick(this)' >Explore</button></td>";
    echo "</tr>";
  }
echo "</table>";


?>
