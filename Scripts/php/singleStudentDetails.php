<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $studentId = $_GET['studentId'];
  $stud = $mysqli->query("SELECT `st_firstName`, `st_lastName` FROM studentdetails WHERE studentdetails.sId = '$studentId'");
  $studname = $stud->fetch_assoc();
  echo "<h4 class='centered' id='modalSpan'>".$studname['st_firstName']." ".$studname['st_lastName']."</h4>";
  $query = $mysqli->query("SELECT * FROM studentdetails, classes, sections WHERE studentdetails.sId = '$studentId' AND classes.classId = studentdetails.st_classId AND sections.sectionId = studentdetails.st_sectionId ");
          // $row=$query->fetch_assoc();
          // echo $row['st_firstName']."".$f['st_lastName'];

  echo "<table style='width:100%;'><tr><th class='col-sm-2'>Class-Section</th><th class='col-sm-2'>Roll Number</th><th class='col-sm-5'>Alternate Email</th><th class='col-sm-3'>Explore</th></tr>";
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

            <button class='btn-xs btn-info btn-block' style='float:right;' style='color:white; cursor: pointer;' onclick='explore()' >Explore</button>
          </td>";
    echo "</tr>";
echo "</table>";

echo "<div id='moreDetails' style='background: var(--BodyGradient); display:none;'>
        <h5>Non academic details for ". $row['st_firstName']." ".$row['st_lastName']."</h5>

          <table class='centered' style='width:100%;'>
            <tr><td class='col-lg-6' style='text-align: right;'>Roll Number: </td><td class='col-lg-6'>". $row['rollNumber']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Class: </td><td class='col-lg-6'>". $row['classNumber']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Section: </td><td class='col-lg-6'>". $row['Sections']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Email (<small>external</small>): </td><td class='col-lg-6'>". $row['st_Email']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Email: (<small>internal</small>): </td><td class='col-lg-6'>". $row['st_systemEmail']." </td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Joined in: </td><td class='col-lg-6'>". $row['st_joinYear']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Exp to finish </td><td class='col-lg-6'>". $row['st_endYear']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Mobile: </td><td class='col-lg-6'>". $row['st_phoneMobile']."</td></tr>
          </table>
        <div id='editDiv' class='centered col-lg-12'>
          <button class='btn-info btn-block rndbtn'  onclick='editStudent()'>EDIT</button>
        </div>
        <div id='confirmDiv' class='centered' style='display:none;'>
          <button id='confirmButton' class='btn-success btn-block  rndbtn' onclick='saveChanges(this)'>CONFIRM</button>
          <button id='cancelButton' class='btn-secondary btn-block  rndbtn' onclick='saveChanges(this)'>CANCEL</button>
        </div>
      </div>";
    }



?>
