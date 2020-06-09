<?php
function cttQueryResultToHtmlTable( $result ) {
  $result->fetch_array( MYSQLI_ASSOC );
  // print_r($result);
  if ($result) {
      $rowcount=mysqli_num_rows($result);
      if ($rowcount > 0) {
        $cls = "'color: Green;'";
      }
      else { $cls = "'color: Red;'";}
    }
    echo "<h4 class='topbanner'>Currently $rowcount active Teachers in your setup</h4>" ;
  echo "<table style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
      ctttableHead(  $result );
      ctttableBody(  $result );
  echo '</table>';
}
function ctttableHead(  $result ) {  //$result is ALL the records for all teachers
        echo '<thead>';
        foreach ( $result as $subject ) {//create the table heading
            echo '<tr>';
            foreach ( $subject as $j => $k ) {
                if ($j !='Sub Id' AND $j != 'C Id' AND $j != 'T Id'){
                  echo '<th>' . $j . '</th>';
                }
            }
            break;
        }
        echo '</thead>';
}
function ctttableBody( $result ) { //$result is ALL the records for all teachers

      echo '<tbody>';
        foreach ( $result as $subject ) {
          $sId = $subject['Sub Id'];
          $togId = "s".$sId;

          echo "<tr>";
            displaySubjectData($subject,$sId,$togId);
          echo "</tr>";
        }
      echo '</tbody>';
}

function displaySubjectData($subject,$sId,$togId) { //$teacher is the data for a SINGLE teacher

    // foreach ( $subject as $x => $y ) {
      foreach ( $subject as $j => $k ) {
          if ($j !='Sub Id' AND $j != 'C Id' AND $j != 'T Id'){
            // echo '<th>' . $j . '</th>';
            echo "<td style='padding-left: 5px;'>";
            echo "<a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $k . "</a>";
            echo "</td>";  //displaying CORRECTLY
          }
      }

    // }
}

function cttsecsDivCollapsible( $secs,$cId,$cNum) {
    while ($row = $result->fetch_assoc())  {
        $rescn = strip_tags($row['classId']);
        $slno++;

        $classNum = $row['classId'];
        $clnum = $mysqli->query("SELECT `classNumber` FROM classes WHERE `classId` = $classNum LIMIT 1");
        $clrow = $clnum->fetch_assoc();
        $cn = $clrow['classNumber'];

        $sectionAplha = $row['sectionId'];
        $secAlph = $mysqli->query("SELECT `Sections` FROM sections WHERE `sectionId` = $sectionAplha LIMIT 1");
        $sarow = $secAlph->fetch_assoc();
        $sa = $sarow['Sections'];

        $subjectName = $row['subjectId'];
        $subn = $mysqli->query("SELECT `Subject` FROM subjects WHERE `subjectId` = $subjectName LIMIT 1");
        $srow = $subn->fetch_assoc();
        $sb = $srow['Subject'];

        $remIdDB = $sb.$cn.$sa;

        $url = "../../RemoveRecords/RemoveSubject.php?cn=".$cn."&sa=".$sa."&sb=".$sb;
        echo "<tr>
                <td>".$slno."</td>
                <td>".$cn."</td>
                <td>".$sa."</td>
                <td><a href='#' style='color: #fff;'>$sb</a></td>
                <td title='Delete $cn $sa $sb from Database'>
                  <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                </td>
              </tr>";
              echo "</div>";
      }
    // }
}
function cttdisplayStudentsForClassSec($studs,$cId,$cNum,$secId) {
      // $cId is the classId for the student $cIdIn is the specific class Id coming from the teacher

      echo "<ul>";
        foreach ($studs as $cnt => $studets) {
          if ($pageHeading=='Students') {
              if ($studets['Stu C Id']==$cId && $studets['Stu sectionId']==$secId) {
              $dets = "<li>Id : "
                  .$studets['Stu Id']
                  ."<ul><li>"
                  ." Roll number : "
                  .$studets['Stu RN']
                  ."</li><li>Name : "
                  .$studets['S First Name']
                  ." "
                  .$studets['S Middle Name']
                  ." "
                  .$studets['S Last Name']
                  ."</li></ul>"
              ."</li>";
                echo $dets;
              }
          }
          else { // ie page heading is teachers
            //
            echo "last else of student disaplay";
          }
        }
      echo "</ul>";
}

?>
