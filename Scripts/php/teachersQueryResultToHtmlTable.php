<?php
function table( $result ) {

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
        tableBody(  $result );
    echo '</table>';
}

function tableHead(  $result ) {  //$result is ALL the records for all teachers
echo "<p>Below is New display using functions. Prefer to replace the modals with expandable sections.</p>";
        echo '<thead>';
        foreach ( $result as $teacher ) {
            echo '<tr>';
            foreach ( $teacher as $k => $y ) {
                echo '<th>' . $k . '</th>';
            }
            echo '<th>Action</th></tr>'; //as we need a delete option for the teacher
            break;
        }
        echo '</thead>';


}

function tableBody(  $result ) { //$result is ALL the records for all teachers
        echo '<tbody>';
        foreach ( $result as $teacher ) { //$teacher is now data of a single teacher
          echo "<tr>";
            displayTeacherData($teacher);
          echo "</tr>";
        }
        echo '</tbody>';
}

function displayTeacherData($teacher) { //$teacher is the data for a SINGLE teacher
      $tId = $teacher['T Id'];
      $togId = "t".$tId;
      $fn = $teacher['T First Name'];
      $mn = $teacher['T Middle Name'];
      $ln = $teacher['T Last Name'];

      $pm = $teacher['T Mobile'];
      $remIdDB = $teacher['T First Name']."-".$teacher['T Middle Name']."-".$teacher['T Last Name'].$teacher['T Mobile'];
      $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;

      foreach ( $teacher as $y ) {
          echo "<td><a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a></td>";
      }

      echo "<td>
        <a id=$remIdDB name=$remIdDB  href='$url'>
          <span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span>
        </a>
      </td>";

      echo "<tr  class='panel panel-default'>
              <td colspan=9 style='color: White;'>
                <div class='panel-heading'>
                    <div id='".$togId."' class='panel-collapse collapse'>
                  <div class='panel-body'>";
                     //DATA PASSED HERE WILL LIKELY CHANGE ONCE QUERIES ARE MERGERED
                    displaySubjectsClassesForTeacher($fn,$mn,$ln,$tId);//first level - display classes-sections-subjects taught by teacher
                    echo "</div>
                  </div>
              </td>
          </tr>";
}

function displaySubjectsClassesForTeacher($fn,$mn,$ln,$tId) { //DATA PASSED HERE WILL LIKELY CHANGE ONCE QUERIES ARE MERGERED
  echo "<h5>
          <a data-toggle='collapse' style='color:white;' href='#REPLACED".$tId."'>CLICKSubjects - Classes For Teacher ".$fn." ".$mn." ".$ln." go here</a>
        </h5>";
  echo "<div class='panel panel-default'>
          <div class='panel-heading'>
            <div id='REPLACED".$tId."' class='panel-collapse collapse'>
              <div class='panel-body'> This is a collapsible panel.<br>";
              echo "<h5>Classes Students For Teacher ".$fn." ".$mn." ".$ln." go here</h5>";
                 //DATA PASSED HERE WILL LIKELY CHANGE ONCE QUERIES ARE MERGERED
                 displayClassSectionsStudentsForTeacher($fn,$mn,$ln);//second level - display list of students for the given class-section
                echo "</div>
              </div>
          </div>
        </div>";
}
function displayClassSectionsStudentsForTeacher($fn,$mn,$ln) { //DATA PASSED HERE WILL LIKELY CHANGE ONCE QUERIES ARE MERGERED
  echo "<p>Each class section will be another collapsible inside this collapsible";
}
 ?>
