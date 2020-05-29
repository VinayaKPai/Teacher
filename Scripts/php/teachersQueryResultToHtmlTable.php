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
        echo '<thead>';
        foreach ( $result as $teacher ) {
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

      foreach ( $teacher as $x => $y ) {//the Students and Subject shd not be displayed as theads
        if ($x !='Students' AND $x != 'Subjects'){//because students and subject are displayed differetly
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
      //there will be a set of collapsibles - one each for every class
          //inside the class collapsible, we need a sections-subjects combo
          //inside the class collapsible, we also need a section-students combo
          //so create a function to display a collapsible first which will be passed the teacherId-classId
          echo "<td colspan=9 style='color: White;'>";
          collapsibleClasses($teacher['Subjects'],$teacher['Students'],$tId);
      echo "</td></tr>";
    }

function collapsibleClasses($subjects,$students,$tId) {
                echo "<div class='panel-heading'>
                    <div id='".$tId."' class='panel-collapse collapse'>
                      <div class='panel-body'>";
                      echo gettype($subjects);
                        $subs = json_decode($subjects, true);
                        foreach ($subs as $subjectByCS) {//each $subjectByCS is a single class-section-subject combo
                          echo "<div class='panel panel-default' style='color: #00000f'>";
                          //we call a function to display this combo
                          $sCSId = "sCsT".$tId.$subjectByCS['Class Id'].$subjectByCS['Sec Id'].$subjectByCS['Sub Id'];
                          echo "<h6><a data-toggle='collapse' href='#".$sCSId."'>
                            Class: ". $subjectByCS['Class Id']
                            . " Section: ".$subjectByCS['Sec Id']
                            ." Subject: ".$subjectByCS['Sub Id']
                            . "</a></h6>";
                              collapsibleSubjectByCS ($subjectByCS,$students,$sCSId,$subjectByCS['Class Id'],$subjectByCS['Sec Id']);
                          echo "</div>";
                        }
                        // foreach ($subs as $a => $b) {
                        //   displaySubjectsClassesForTeacher($b,$studs,$tId);
                        // }
                    echo "</div>
                  </div>";
    }
    function collapsibleSubjectByCS($subjectByCS,$students,$sCSId,$studCId,$studSId) {//each $subjectByCS is a single class-section-subject combo, $sCSId is id for the collapsibles, $studCId is the classId for this student and ,$studSId is section Id for this student
      //we need an id for the collapsibles inside this. Subject is common, class and section are different
      //here we will create another collapsible which will hold the students in it

      echo "<div class='panel-heading'>
          <div id='".$sCSId."' class='panel-collapse collapse'>
            ";
            $studs = json_decode($students, true);
            // print_r($studs);
            foreach ($studs as $cntr => $stuDets) {//$stuDets is an array with 'C Id', 'sectionId', 'Stu Id'
              if ($stuDets['C Id'] == $studCId && $stuDets['sectionId'] == $studSId) {
                  echo "<p>Student Id is ".$stuDets['Stu Id']."</p>";
              }

            }
      echo "</div></div>";

    }

 ?>