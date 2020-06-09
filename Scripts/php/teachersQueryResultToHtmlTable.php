<?php
// used in SetUpPages/newTeachers.php
// takes the result from query in teachers() in Scripts/php/allQueries.php
// outputs the display of teachers in table, class-sections-subjects in hidden tr below the tr containing teachers details
// another level of clickables in the hidden tr, contains the students for that class-sections
// to get more details of students, tweek the studentsForTeacher() in Scripts/php/allQueries.php
function table( $mysqli, $result,$stuQuery ) {

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
        tableBody(  $mysqli,$result,$stuQuery );
    echo '</table>';
}

function tableHead(  $result ) {  //$result is ALL the records for all teachers
        echo '<thead>';
        foreach ( $result as $teacher ) {//create the table heading
            echo '<tr>';
            foreach ( $teacher as $j => $k ) {
                if ($j !='CSections' AND $j != 'CSSubjects'){
                  echo '<th>' . $j . '</th>';
                }
            }
            break;
        }
        echo '</thead>';
}

function tableBody(  $mysqli,$result,$stuQuery ) { //$result is ALL the records for all teachers

      echo '<tbody>';
        foreach ( $result as $teacher ) { //$teacher is now data of a single teacher
          $tId = $teacher['T Id'];
          $togId = "t".$tId;

          $teacherCSSubs = json_decode($teacher['CSSubjects'], true);
          $teacherCSSecs = json_decode($teacher['CSections'], true); //'SD C Id',	'SD Class Num', 'Stu Sec name', 'SD sectionId' as 'CSections'
          //to display main data only - ie no CSSubjects or students
          echo "<tr>";
            displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);
          echo "</tr>";
          //displaying CORRECTLY
        }
      echo '</tbody>';
}
//displayTeacherData is working correctly
function displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) { //$teacher is the data for a SINGLE teacher

    foreach ( $teacher as $x => $y ) {//the CSSubjects & CSSections shd not be displayed as theads
        if ($x !='CSections' AND $x != 'CSSubjects'){//because students and subject are displayed differetly
          echo "<td>";
          echo "<a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a>";
          echo "</td>";  //displaying CORRECTLY
        }
      if ($x=='CSSubjects') {
        echo "<tr>";
        echo "<td colspan='8'>";
              echo "<div id='".$togId."' class='panel panel-default panel-collapse collapse'>";
                createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);

              echo "</div>";
          echo "</td>";  //displaying CORRECTLY
        echo "</tr>";
      }
    }
}
//displayTeacherData is working correctly
//
function createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) {
  //$teacherCSSubs is an array of arrays, where the inner arrays are details of each CSectionSubjects
  foreach ($teacherCSSubs as $key => $css ){ //$key here is [0],[1].... and $css will have 'SD C Id',	'SD Class Num', 'Stu Sec name', 'SD sectionId' as 'CSections'
    //and $css is of the format Array ( [Class Id] => 1 [Class Num] => I [Sec Id] => 1 [Sec Name] => A [Sub Id] => 5

    $classId = $css['Class Id'];
    $sectionId = $css['Sec Id'];
    $subjectId = $css['Sub Id'];

    $className = $css['Class Num'];
    $sectionName = $css['Sec Name'];
    $subjectName = $css['Sub Name'];
    $cssTogId = "css".$classId.$sectionId.$subjectId.$togId;
      echo "<div class='panel panel-heading centered'>
      				<a data-toggle='collapse'' href='#".$cssTogId."'>
								<span style='float: left;'>Class " . $className . "</span>
								<span style='float: center;'> Section ". $sectionName . "</span>
								<span style='float: right;'> Subject " . $subjectName . "</span>
							</a>
      		</div>";
			echo "<div id='".$cssTogId."' class='panel panel-default panel-collapse collapse'>";
				displayStudentsDataForClassSec($classId,$className,$sectionId,$stuQuery);
    echo "</div>";
  }
}

//****************************************

function displayStudentsDataForClassSec($classId,$className,$sectionId,$stuQuery) {
	$cnt = 0;
	echo "<ul>";
	foreach ($stuQuery as $key => $st) {
		if ($st['classId']==$classId && $st['sectionId']==$sectionId) {
				echo "<li>".$st['F Name']." ".$st['M Name']." ".$st['L Name'];
          echo "<ul>";
            echo "<li>Id : ".$st['U Id']."</li>";
            echo "<li>Id : ".$st['R No.']."</li>";
          echo "</ul>";
        echo "</li>";
		}
	}
	echo "</ul>";
}
 ?>
