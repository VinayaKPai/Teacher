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
      echo "<h4 class='topbanner'>Currently $rowcount active Students in your setup</h4>" ;
    echo "<table style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
        tableHead(  $result );
        tableBody(  $result );
    echo '</table>';
}

function tableHead(  $result ) {  //$result is ALL the records for all students
        echo '<thead>';
        foreach ( $result as $student ) {
            echo '<tr>';
            foreach ( $student as $j => $k ) {
                if ($j !='Mobile' AND $j !='Left' AND $j != 'Joined' AND $j !='Int Email' AND $j != 'Ext Email' AND $j !='Sec Id' AND $j != 'Class Id' AND $j !='Id') {
                  echo '<th>' . $j . '</th>';
                }
            }
            echo '<th>Action</th></tr>'; //as we need a delete option for the teacher
            break;
        }
        echo '</thead>';
}

function tableBody(  $result ) { //$result is ALL the records for all students
        echo '<tbody>';
        foreach ( $result as $student ) { //$student is now data of a single student
          echo "<tr>";
            displayStudentData($student);// will display only main dat of student - no details
          echo "</tr>";
        }
        echo '</tbody>';
}

function displayStudentData($student) { //$student is the data for a SINGLE student
      $sId = $student['Id'];
      $togId = "t".$sId;
      $fn = $student['First Name'];
      $mn = $student['Middle Name'];
      $ln = $student['Last Name'];

      $pm = $student['Mobile'];
      $remIdDB = $student['First Name']."-".$student['Middle Name']."-".$student['Last Name'].$student['Mobile'];
      $url = "../../RemoveRecords/RemoveStudent.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;

      foreach ( $student as $x => $y ) {//only main data points in this section of the page
        if ($x !='Mobile' AND $x !='Left' AND $x != 'Joined' AND $x !='Int Email' AND $x != 'Ext Email' AND $x !='Sec Id' AND $x != 'Class Id' AND $x !='Id'){//because further student details  are displayed differetly
          echo "<td>
            <a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a>

          </td>";
        }
      }//display for main columns  OVER
      //creating a delete button
      echo "<td>
        <a id=$remIdDB name=$remIdDB  href='$url'>
          <span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span>
        </a>
      </td>";//end creating a delete button
      //this tr is for further details of the student
      echo "<tr class='panel panel-default'>";
      //there will be a collapsible with further details of the student
          echo "<td colspan=9 style='color: White;'>";
          moreStudentDetails($student,$togId);
      echo "</td></tr>";
    }

function moreStudentDetails($student,$togId) {
  $style = "background-color: #fff; color: #00000f; text-align: left; margin-left: 10px";
  echo "<div id='".$togId."' class='panel-collapse collapse'>
        <div class='panel panel-default'>";
                echo "<p style='".$style."'>Ext Email : " . $student[ 'Ext Email'] . "</p>";
                echo "<p style='".$style."'>Int Email : " . $student['Int Email'] . "</p>";
                echo "<p style='".$style."'>Joined : " . $student[ 'Joined'] . "</p>";
                echo "<p style='".$style."'>Left : " . $student['Left'] . "</p>";
                echo "<p style='".$style."'>Phone : " . $student['Mobile'] . "</p>";
          echo "</div></div>";
        }
 ?>
