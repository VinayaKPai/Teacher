<?php
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	$pageHeading = "Teachers";
	$pageCode = "setup";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teachers Tools LH - Manage Students</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link type="text" href="./Modals/modaltest.html"/link>
		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
		</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered">
				<?php include "../Components/top.php"; ?>
			</h3>
			<!-- <?php include $_SERVER['DOCUMENT_ROOT']."/Components/peopleLinks.php"; ?>
			<hr> -->
			<div>
				<p>Calling students with 2 param</p>
				<?php
					studentsForTeacher($mysqli);
				?>

			</div>

			<hr>
			<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
<?php
function studentsForTeacher($mysqli) {
	$stuQuery = $mysqli->query("SELECT
		SD.userId AS 'U Id',
		SD.classId,
		C.classNumber AS 'Class',
		SD.sectionId,
		S.Sections AS 'Section',
		U.firstName AS 'F Name',
		U.middleName AS 'M Name',
		U.lastName AS 'L Name',
		SD.rollNumber AS 'R No.'
		FROM studentDetails AS SD
		INNER JOIN classes AS C ON C.classId = SD.classId
		INNER JOIN sections AS S ON S.sectionId = SD.sectionId
		INNER JOIN users AS U ON U.userId = SD.userId
		ORDER BY SD.classId ASC, SD.sectionId ASC
		");
		$q = ($stuQuery->fetch_assoc());
teachers($mysqli,$stuQuery);

	}

//***********************************************
function teachers ($mysqli,$stuQuery) {

  $teacherQuery = $mysqli->query("SELECT DISTINCT
    U.userId AS 'T Id',
    U.firstName AS 'T First Name',
    U.middleName AS 'T Middle Name',
    U.lastName AS 'T Last Name',
    U.Email AS 'T External Email',
    U.systemEmail AS 'T Internal Email',
    U.phoneMobile AS 'T Mobile',
    U.visibility AS 'Current',json_arrayagg(DISTINCT json_object(
        'Class Id',CTT.classId,
        'Class Num', C.classNumber,
        'Sec Id', Sec.sectionId,
        'Sec Name', Sec.Sections,
        'Sub Id', Sub.subjectId,
        'Sub Name', Sub.Subject
      ) ) as 'CSSubjects',
      json_arrayagg(DISTINCT json_object(
          'SD C Id', CTT.classId,
          'SD Class Num', C.classNumber,
          'Stu Sec name', Sec.Sections,
          'SD sectionId', Sec.sectionId
        ) ) as 'CSections'
      FROM
        users AS U
          INNER JOIN classes_taught_by_teacher AS CTT
            on CTT.userId = U.userId
          INNER JOIN subjects AS Sub
            on Sub.subjectId = CTT.subjectId
          LEFT JOIN classes as C
            on C.classId= CTT.classId
          LEFT JOIN sections as Sec
            on Sec.sectionId= CTT.sectionId
      GROUP BY U.userId
            ORDER BY U.userId ASC");
			table ($mysqli, $teacherQuery,$stuQuery);

}
//***********************************************
function table( $mysqli, $result,$stuQuery ) {

    $result->fetch_array( MYSQLI_ASSOC );
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

function tableHead(  $result ) {
        echo '<thead>';
        foreach ( $result as $teacher ) {
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

function tableBody(  $mysqli,$result,$stuQuery ) {

      echo '<tbody>';
        foreach ( $result as $teacher ) {
          $tId = $teacher['T Id'];
          $togId = "t".$tId;

          $teacherCSSubs = json_decode($teacher['CSSubjects'], true);
          $teacherCSSecs = json_decode($teacher['CSections'], true);
          echo "<tr>";
            displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);
          echo "</tr>";
        }
      echo '</tbody>';
}
function displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) {

    foreach ( $teacher as $x => $y ) {
        if ($x !='CSections' AND $x != 'CSSubjects'){
          echo "<td>";
          echo "<a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a>";
          echo "</td>";
        }
      if ($x=='CSSubjects') {
        echo "<tr>";
        echo "<td colspan='8'>";
              echo "<div id='".$togId."' class='panel panel-default panel-collapse collapse'>";
                createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);

              echo "</div>";
          echo "</td>";
        echo "</tr>";
      }
    }
}

function createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) {

  foreach ($teacherCSSubs as $key => $css ){

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
				echo "<li>".$st['F Name']." ".$st['M Name']." ".$st['L Name']."</li>";
		}
	}
	echo "</ul>";
}
?>
