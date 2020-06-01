<?php
function table( $mysqli, $result,$pageHeading ) {

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
        tableHead(  $result );
        tableBody(  $mysqli,$result,$pageHeading );
    echo '</table>';
}

function tableHead(  $result ) {  //$result is ALL the records for all teachers
        echo '<thead>';
        foreach ( $result as $teacher ) {//create the table heading
            echo '<tr>';
            foreach ( $teacher as $j => $k ) {
                if ($j !='Students' AND $j != 'Subjects'){
                  echo '<th>' . $k . '</th>';
                }
            }
            echo '<th>Action</th></tr>'; //as we need a delete option for the teacher
            break;
        }
        echo '</thead>';
}

function tableBody(  $mysqli,$result,$pageHeading ) { //$result is ALL the records for all teachers
        echo '<tbody>';
        foreach ( $result as $teacher ) { //$teacher is now data of a single teacher
          echo "<tr>";
            displayTeacherData($mysqli,$teacher,$pageHeading);
          echo "</tr>";
        }
        echo '</tbody>';
}

function displayTeacherData($mysqli,$teacher,$pageHeading) { //$teacher is the data for a SINGLE teacher
      $tId = $teacher['T Id'];
      $togId = "t".$tId;
      $fn = $teacher['T First Name'];
      $mn = $teacher['T Middle Name'];
      $ln = $teacher['T Last Name'];

      $pm = $teacher['T Mobile'];
      $remIdDB = $teacher['T First Name']."-".$teacher['T Middle Name']."-".$teacher['T Last Name'].$teacher['T Mobile'];
      $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;

      foreach ( $teacher as $x => $y ) {//the Subject shd not be displayed as theads
        if ($x != 'Subjects'){//because students and subject are displayed differetly
          echo "<td>
            <a data-toggle='collapse' style='color:white;' href='#".$tId."'> " . $y . "</a>
          </td>";
        }
      }//display for columns other than students and subjects OVER
      //creating a delete button
      echo "<td>
        <a id=$remIdDB name=$remIdDB  href='$url'>
          <span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span>
        </a>
      </td>";//end creating a delete button
      //this tr is for subjects and Students  y class-section for that teacher
      echo "<tr class='panel panel-default'>";
          echo "<td colspan=9 style='color: White;'>";
          $subjects = $teacher['Subjects'];
          collapsibleClasses($mysqli,$subjects,$tId,$pageHeading);
      echo "</td></tr>";
    }

function collapsibleClasses($mysqli,$subjects,$tId,$pageHeading) {
      echo "<div class='panel-heading'>
          <div id='".$tId."' class='panel-collapse collapse'>";
              $subs = json_decode($subjects, true);
              foreach ($subs as $subjectByCS) {//each $subjectByCS is a single class-section-subject combo

                $cId = $subjectByCS['Class Id'];
                $cNum = $subjectByCS['Class Num'];
                $secId = $subjectByCS['Sec Id'];
                $sCSId = "sCsT".$tId.$cId.$secId.$subjectByCS['Sub Id'];
                echo "<h6 class='th white'><a data-toggle='collapse' href='#".$sCSId."' class='white'>
                  Class: ". $cNum
                  . " Section: ".$subjectByCS['Sec Name']
                  ." Subject: ".$subjectByCS['Sub Id']
                  . "</a></h6>";
                    // WE NEED TO PASS CLASS ID AND SECTION ID TO THE stuDiv_forTeacher FUNCTION
                    echo "<div id='".$sCSId."' class='panel panel-default panel-collapse collapse' style='color: #0f0f0f;'>";
                      // students($mysqli,$pageHeading,$cId,$secId );
                      displayStudentsForClassSec($subjectByCS,$cId,$cNum,$secId,$pageHeading);
                    echo "</div>";
              }
          echo "</div>
          </div>";
    }
// display of students for each class is taken care of by studentsQueryResultToHtmlDiv.php script

 ?>
