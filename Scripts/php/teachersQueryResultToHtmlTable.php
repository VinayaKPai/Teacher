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
        tableBody(  $result,$pageHeading );
    echo '</table>';
}

function tableHead(  $result ) {  //$result is ALL the records for all teachers
        echo '<thead>';
        foreach ( $result as $teacher ) {//create the table heading
            echo '<tr>';
            foreach ( $teacher as $j => $k ) {
                if ($j !='CSSections' AND $j != 'CSSubjects'){
                  echo '<th>' . $j . '</th>';
                }
            }
            break;
        }
        echo '</thead>';
}

function tableBody(  $result,$pageHeading ) { //$result is ALL the records for all teachers
      echo '<tbody>';
        foreach ( $result as $teacher ) { //$teacher is now data of a single teacher
          $tId = $teacher['T Id'];
          $togId = "t".$tId;

          $CSSubjects = $teacher['CSSubjects'];
          $CSSections = $teacher['CSSections'];

          $teacherCSSubs = json_decode($CSSubjects, true);
          $teacherCSSecs = json_decode($CSSections, true);
          //to display main data only - ie no CSSubjects or students
          echo "<tr>";
            displayTeacherData($teacher,$pageHeading,$tId,$togId,$teacherCSSecs,$teacherCSSubs);
          echo "</tr>";
          //displaying CORRECTLY
        }
      echo '</tbody>';
}

function displayTeacherData($teacher,$pageHeading,$tId,$togId,$teacherCSSecs,$teacherCSSubs) { //$teacher is the data for a SINGLE teacher

    foreach ( $teacher as $x => $y ) {//the CSSubjects & CSSections shd not be displayed as theads
        if ($x !='CSSections' AND $x != 'CSSubjects'){//because students and subject are displayed differetly
          echo "<td>";
          echo "<a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a>";
          echo "</td>";  //displaying CORRECTLY
        }
      if ($x=='CSSubjects') {
        echo "<tr>";
        echo "<td colspan='8'>";
              echo "<div id='".$togId."' class='panel panel-default panel-collapse collapse'>";
                stuDiv( $teacher,$pageHeading );

              echo "</div>";
          echo "</td>";  //displaying CORRECTLY
        echo "</tr>";
      }
    }
}
function createCollapsibleCSS($teacher,$pageHeading,$tId,$togId,$teacherCSSecs,$teacherCSSubs) {
  //$teacherCSSubs is an array of arrays, where the inner arrays are details of each CSectionSubjects
  foreach ($teacherCSSubs as $key => $css ){ //$key here is [0],[1]....
    //and $css is of the format Array ( [Class Id] => 1 [Class Num] => I [Sec Id] => 1 [Sec Name] => A [Sub Id] => 5

    $classId = $css['Class Id'];
    $sectionId = $css['Sec Id'];
    $subjectId = $css['Sub Id'];

    $className = $css['Class Num'];
    $sectionName = $css['Sec Name'];
    $subjectName = $css['Sub Name'];
    $cssTogId = "css".$classId.$sectionId.$subjectId.$togId;
      echo "<div class='panel panel-heading centered'>
      <a data-toggle='collapse'' href='#".$cssTogId."'>Class " . $className . " Section ". $sectionName . " Subject " . $subjectName . "</a>
      </div>";

        createCollapsibleDivForCSecStu($pageHeading,$teacherCSSecs,$classId,$className,$sectionId,);
    // echo "</div>";
  }
}

function createCollapsibleDivForCSecStu($pageHeading,$teacherCSSecs,$classId,$className,$sectionId) {
stuDiv( $result,$pageHeading );
}
// display of students for each class is taken care of by studentsQueryResultToHtmlDiv.php script

 ?>
