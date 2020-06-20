<table style='width:100%;'><tr><th class='col-sm-2'>Class-Section</th><th class='col-sm-2'>Roll Number</th><th class='col-sm-5'>Alternate Email</th><th class='col-sm-3'>Explore</th></tr>
<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

  $studentId = $_GET['studentId'];

  if ($studentId) {
      $query = $mysqli->query("SELECT users.Email, users.systemEmail, users.joinYear, users.endYear, users.phoneMobile, users.firstName, users.middleName, users.lastName, classes.classId, classes.classNumber, sections.sectionId, sections.sectionName, studentdetails.rollNumber
        FROM
        users,
        studentdetails,
        classes,
        sections
        WHERE
        studentdetails.userId = $studentId AND
        users.userId = studentdetails.userId AND
        classes.classId = studentdetails.classId AND
        sections.sectionId = studentdetails.sectionId
        ORDER BY classes.classId ASC, sections.sectionId ASC");
    }

  while ($row=$query->fetch_assoc()) {
    $cn = $row['classNumber'];
    $cnId = $row['classId'];
    $sa = $row['sectionName'];
    $saId = $row['sectionId'];
    $rn = $row['rollNumber'];
    $altEmail = $row['Email'];
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
        <h5>Non academic details for ". $row['firstName']." ".$row['lastName']."</h5>

          <table class='centered' style='width:100%;'>
            <tr><td class='col-lg-6' style='text-align: right;'>Roll Number: </td><td class='col-lg-6'>". $row['rollNumber']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Class: </td><td class='col-lg-6'>". $row['classNumber']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Section: </td><td class='col-lg-6'>". $row['sectionName']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Email (<small>external</small>): </td><td class='col-lg-6'>". $row['Email']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Email: (<small>internal</small>): </td><td class='col-lg-6'>". $row['systemEmail']." </td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Joined in: </td><td class='col-lg-6'>". $row['joinYear']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Exp to finish </td><td class='col-lg-6'>". $row['endYear']."</td></tr>
            <tr><td class='col-lg-6' style='text-align: right;'>Mobile: </td><td class='col-lg-6'>". $row['phoneMobile']."</td></tr>
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
