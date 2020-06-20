<?php
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	$pageHeading = "Tests";
	$pageCode = "setup";
	$type = "T";
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
			<?php include $_SERVER['DOCUMENT_ROOT']."/Components/peopleLinks.php"; ?>
			<hr>

			<div class="panel-group" id="accordion">
		 		<?php
		 		$status = "completed";
				$successFlag = 1;
		 			aqtActivityQuery($type,$status,$mysqli,$pageHeading,$successFlag);
		 		?>
		 	</div>

		 	<div class="panel-group" id="accordion">
		 		<?php
		 		$status = "ongoing";
				$successFlag = 1;
		 		aqtActivityQuery($type,$status,$mysqli,$pageHeading,$successFlag);
		 		?>
		 	</div>

		 	<div class="panel-group" id="accordion">
		 		<?php
		 			$status = "undeployed";
					$successFlag = 0;
		 			aqtActivityQuery($type,$status,$mysqli,$pageHeading,$successFlag);
		 		?>
		 	</div>

			<hr>
			<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
<?php
// function studentsForTeacher($mysqli) {
// 	$stuQuery = $mysqli->query("SELECT
// 		SD.userId AS 'U Id',
// 		SD.classId,
// 		C.classNumber AS 'Class',
// 		SD.sectionId,
// 		S.sectionName AS 'Section',
// 		U.firstName AS 'F Name',
// 		U.middleName AS 'M Name',
// 		U.lastName AS 'L Name',
// 		SD.rollNumber AS 'R No.'
// 		FROM studentDetails AS SD
// 		INNER JOIN classes AS C ON C.classId = SD.classId
// 		INNER JOIN sections AS S ON S.sectionId = SD.sectionId
// 		INNER JOIN users AS U ON U.userId = SD.userId
// 		ORDER BY SD.classId ASC, SD.sectionId ASC
// 		");
// 		$q = ($stuQuery->fetch_assoc());
// teachers($mysqli,$stuQuery);
//
// 	}
//
// //***********************************************
// function teachers ($mysqli,$stuQuery) {
//
//   $teacherQuery = $mysqli->query("SELECT DISTINCT
//     U.userId AS 'T Id',
//     U.firstName AS 'T First Name',
//     U.middleName AS 'T Middle Name',
//     U.lastName AS 'T Last Name',
//     U.Email AS 'T External Email',
//     U.systemEmail AS 'T Internal Email',
//     U.phoneMobile AS 'T Mobile',
//     U.visibility AS 'Current',json_arrayagg(DISTINCT json_object(
//         'Class Id',CTT.classId,
//         'Class Num', C.classNumber,
//         'Sec Id', Sec.sectionId,
//         'Sec Name', Sec.sectionName,
//         'Sub Id', Sub.subjectId,
//         'Sub Name', Sub.subjectName
//       ) ) as 'CSSubjects',
//       json_arrayagg(DISTINCT json_object(
//           'SD C Id', CTT.classId,
//           'SD Class Num', C.classNumber,
//           'Stu Sec name', Sec.sectionName,
//           'SD sectionId', Sec.sectionId
//         ) ) as 'CSections'
//       FROM
//         users AS U
//           INNER JOIN classes_taught_by_teacher AS CTT
//             on CTT.userId = U.userId
//           INNER JOIN subjects AS Sub
//             on Sub.subjectId = CTT.subjectId
//           LEFT JOIN classes as C
//             on C.classId= CTT.classId
//           LEFT JOIN sections as Sec
//             on Sec.sectionId= CTT.sectionId
//       GROUP BY U.userId
//             ORDER BY U.userId ASC");
// 			table ($mysqli, $teacherQuery,$stuQuery);
//
// }
// //***********************************************
// function table( $mysqli, $result,$stuQuery ) {
//
//     $result->fetch_array( MYSQLI_ASSOC );
//     if ($result) {
//         $rowcount=mysqli_num_rows($result);
//         if ($rowcount > 0) {
//           $cls = "'color: Green;'";
//         }
//         else { $cls = "'color: Red;'";}
//       }
//       echo "<h4 class='topbanner'>Currently $rowcount active Teachers in your setup</h4>" ;
//     echo "<table style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
//         tableHead(  $result );
//         tableBody(  $mysqli,$result,$stuQuery );
//     echo '</table>';
// }
//
// function tableHead(  $result ) {
//         echo '<thead>';
//         foreach ( $result as $teacher ) {
//             echo '<tr>';
//             foreach ( $teacher as $j => $k ) {
//                 if ($j !='CSections' AND $j != 'CSSubjects'){
//                   echo '<th>' . $j . '</th>';
//                 }
//             }
//             break;
//         }
//         echo '</thead>';
// }
//
// function tableBody(  $mysqli,$result,$stuQuery ) {
//
//       echo '<tbody>';
//         foreach ( $result as $teacher ) {
//           $tId = $teacher['T Id'];
//           $togId = "t".$tId;
//
//           $teacherCSSubs = json_decode($teacher['CSSubjects'], true);
//           $teacherCSSecs = json_decode($teacher['CSections'], true);
//           echo "<tr>";
//             displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);
//           echo "</tr>";
//         }
//       echo '</tbody>';
// }
// function displayTeacherData($mysqli,$teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) {
//
//     foreach ( $teacher as $x => $y ) {
//         if ($x !='CSections' AND $x != 'CSSubjects'){
//           echo "<td>";
//           echo "<a data-toggle='collapse' style='color:white;' href='#".$togId."'> " . $y . "</a>";
//           echo "</td>";
//         }
//       if ($x=='CSSubjects') {
//         echo "<tr>";
//         echo "<td colspan='8'>";
//               echo "<div id='".$togId."' class='panel panel-default panel-collapse collapse'>";
//                 createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery);
//
//               echo "</div>";
//           echo "</td>";
//         echo "</tr>";
//       }
//     }
// }
//
// function createCollapsibleCSS($teacher,$tId,$togId,$teacherCSSecs,$teacherCSSubs,$stuQuery) {
//
//   foreach ($teacherCSSubs as $key => $css ){
//
//     $classId = $css['Class Id'];
//     $sectionId = $css['Sec Id'];
//     $subjectId = $css['Sub Id'];
//
//     $className = $css['Class Num'];
//     $sectionName = $css['Sec Name'];
//     $subjectName = $css['Sub Name'];
//     $cssTogId = "css".$classId.$sectionId.$subjectId.$togId;
//       echo "<div class='panel panel-heading centered'>
//       				<a data-toggle='collapse'' href='#".$cssTogId."'>
// 								<span style='float: left;'>Class " . $className . "</span>
// 								<span style='float: center;'> Section ". $sectionName . "</span>
// 								<span style='float: right;'> Subject " . $subjectName . "</span>
// 							</a>
//       		</div>";
// 			echo "<div id='".$cssTogId."' class='panel panel-default panel-collapse collapse'>";
// 				displayStudentsDataForClassSec($classId,$className,$sectionId,$stuQuery);
//     echo "</div>";
//   }
// }
//
// //****************************************
//
// function displayStudentsDataForClassSec($classId,$className,$sectionId,$stuQuery) {
// 	$cnt = 0;
// 	echo "<ul>";
// 	foreach ($stuQuery as $key => $st) {
// 		if ($st['classId']==$classId && $st['sectionId']==$sectionId) {
// 				echo "<li>".$st['F Name']." ".$st['M Name']." ".$st['L Name']."</li>";
// 		}
// 	}
// 	echo "</ul>";
// }
// ABOVE IS WORKING TEACHERS PAGE FULL CODE
//4444444444444444444444444444444444444
function aqtActivityQuery($type, $status, $mysqli ,$pageHeading,$successFlag) {
	// echo $type. $status.$pageHeading."<br>";
	//  print_r($mysqli) ;
	//retrieve assessments and deployments for /Activity/assignments.php, /Activity/tests.php, /Activity/quizzes.php
	//status is completed/ongoing/undeoployed/all type is a/q/t
				// $str = '';
				$queryString =
				("SELECT
				dl.depId AS 'Id',
				dl.depType AS 'Type',
				c.classNumber AS 'Class',
				c.classId AS 'Class Id',
				s.sectionId AS 'SectionId',
				s.sectionName AS 'Section',
				dl.schStartDate AS 'Open From',
				dl.schEndDate AS 'Open Till',
				dl.deploySuccess AS 'Deployed?',
				a.assessment_Id AS 'Assessment ID',
				a.assessment_Title AS 'Title',
					json_arrayagg(
					json_object(
						'questionID',qb.qId,
						'question',qb.question,
						'option1',qb.Option_1,
						'option2',qb.Option_2,
						'option3',qb.Option_3,
						'option4',qb.Option_4,
						'option5',qb.Option_5,
						'option6',qb.Option_6
				)
				)
				as 'Questions'
				FROM
						deploymentlog as dl
				INNER JOIN assessments as a
					ON a.assessment_Id = dl.assessmentId
				INNER JOIN assessment_questions as aq
						ON aq.assessment_Id = a.assessment_Id
				INNER JOIN questionbank as qb
					ON qb.qId = aq.question_id
				INNER JOIN questiontype as qt
					on dl.depType = qt.qtId
				INNER JOIN classes as c
					on c.classId = dl.classId
				INNER JOIN sections as s
					on s.sectionId = dl.sectionId
				WHERE dl.depType = '$type' AND dl.deploySuccess = '$successFlag'
				GROUP BY dl.depId
			");

		// if ($status == "ongoing") {
		// 	$str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate > CURDATE() AND dl.deploySuccess = 1 AND dl.depType = '$type'";
		// 	$successFlag = 1;//need this separately for display
		// 	$queryString = $queryString.$str ;
		// }
		// if ($status == "completed") {
		// 	$str = "WHERE dl.schStartDate < CURDATE() AND dl.schEndDate < CURDATE() AND dl.deploySuccess = 1 AND dl.depType = '$type'";
		// 	$successFlag = 1;//need this separately for display
		// 	$queryString = $queryString.$str ;
		// }
		// if ($status == "undeployed") {
		// 	$str = "WHERE dl.deploySuccess = 0 AND dl.depType = '$type'";
		// 	$successFlag = 0;//need this separately for display
		// 	$queryString = $queryString.$str ;
		// }
		// $queryString = $queryString."  GROUP BY dl.depId";

		$query = $mysqli->query($queryString);
		// $query should be returned
		deploymentsdiv($query, $type, $status, $pageHeading);
}

function deploymentsdiv( $result, $type, $status, $pageHeading ) {
	if ($status =='completed' || $status == 'ongoing') {
		$successFlag = 1;
	}
	else {
		$successFlag = 0;
	}

  $count  = mysqli_num_rows($result);
  //$result is (type A/Q/T AND status C/O/U)
  if ($type=='A') {$ass = "Assignment";}
  if ($type=='T') {$ass = "Test";}
  if ($type=='Q') {$ass = "Quiz";}

  if ($successFlag==1) {$success = "Deployed";}
  else {$success = "Undeployed"; }
  if ($count>1){$suffix = 's';}
  else {$suffix = '';}

  // if ($status=='completed' || $status=='ongoing' || $status=='undeployed') {
    echo "<h4 class='topbanner centered'>".$count. " ".$status." ".$ass.$suffix."</h4>";
  // }
  // else {
  //   $ass = "Assessment";
  //   echo "<h4 class='topbanner centered'>".$count. " ".$ass.$suffix."</h4>";
  // }

  if ($count != 0) {
      while ($row = $result->fetch_array( MYSQLI_ASSOC )){
				$date = date("Y-m-d");

				if ($row['Type']==$type && $row['Deployed?']==$successFlag  ) {
					//here, we have already filtered out those records that do not match the type ie A/Q/T
					//now
					echo date("Y-m-d")." ***** ".$row['Open From']." - ".$row['Open Till']." - ".$row['Deployed?'];
            savedAssessmentsdivBody( $row, $status, $ass, $type,$successFlag,$pageHeading );
					}
        }
  }
}

  function savedAssessmentsdiv( $result, $type, $successFlag, $status ) {
    $count  = mysqli_num_rows($result);
    //$result is (type A/Q/T AND status C/O/U) OR (type ALL WITHOUT status OR $successFlag OR type)
    if ($type=='A') {$ass = "Assignment";}
    if ($type=='T') {$ass = "Test";}
    if ($type=='Q') {$ass = "Quiz";}
    if ($type=='all') {$ass = "Assessment";}

    if ($successFlag==1) {$success = "Deployed";}
    else {$success = "Undeployed"; }
    if ($count>1){$suffix = 's';}
    else {$suffix = '';}

    if ($status=='completed' || $status=='ongoing' || $status=='undeployed') {
      echo "<h4 class='topbanner centered'>".$count. " ".$status." ".$ass.$suffix."</h4>";
    }
    else {
      $ass = "Assessment";
      echo "<h4 class='topbanner centered'>".$count. " ".$ass.$suffix."</h4>";
    }

    if ($count != 0) {
        while ($row = $result->fetch_array( MYSQLI_ASSOC )){
              savedAssessmentsdivBody( $row, $status, $ass, $type );
          }
    }
  }

  function savedAssessmentsdivBody( $row, $status, $ass, $type,$successFlag,$pageHeading ) {
    $dId = '';
    $secId = '';
    $deploymentId = '';
    $assId = $row['Assessment ID'];
    //we need sectiotionId and deployment Id for finetuning the collapsibles
    //but since these are not present in the all assessments query, an if is needed
    if (isset($row['SectionId']) && isset($row['Id'])) {
      $secId = $row['SectionId'];
      $deploymentId = $row['Id'];
    }
    //create parts of the section heading
      if (isset($row['Class']) && isset($row['Section'])) {
        $leftSpan = "<span style='float: left;'>Class: ".$row['Class']." Section: ".$row['Section']."</span>";
      }
      else {
        $leftSpan = "";
      }

      if (isset($row['Open From']) && isset($row['Open Till'])) {
        $rightSpan = "<span style='float: right;'>From : " . $row['Open From']." To : ". $row['Open Till']."</span>";
      }
      else {
        $rightSpan = "";
      }

      $varr = json_decode($row['Questions'], true);
      $title = $row['Title'];
      //create the section heading
       if ( $type=== 'A' || $type=== 'Q' || $type=== 'T'	) {
          $dId = "collapse".$status.$deploymentId.$assId;//unique id for collapse elements
          $schdTxt = "Schedule a Deployment";
          $panelTitle = "<a data-toggle='collapse' data-parent='#accordion' href='#".$dId."' > ".$title."</a>";
          $secHeading = $leftSpan.$panelTitle.$rightSpan;
       }
       else { //ie. When $type= "all"
  	        $dId = "collapse".$assId;//unique id for collapse elements
            $schdTxt = "Scheduled Deployments";
            $secHeading = $panelTitle;
       }

      echo "<div class='panel panel-default'>
              <div class='panel-heading'>
                <h4 class='panel-title centered'>".$secHeading."</h4></div>";
    	  echo "
            <div id='".$dId."' class='panel-collapse collapse'>
              <div class='panel-body'>";
		              displayAssesmentQuestions($row['Questions']);
              echo "<div class='body col-sm-4' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
                   echo "<h5>".$schdTxt . "</h5>";
                  if(isset($row['Deployments'])) {
                    displayAllDeployments($row['Deployments']);
                    $classId = $row['Class Id'];
                    $class = $row['Class'];
                    $assId = $row['Assessment ID'];
                  }
                  scheduleDeployment($row['Class'], $row['Class Id'], $row['Assessment ID']);
              echo "</div>";
            echo '</div>
          </div>';
      }

//for completed, ongoing, undeployed A/Q/T
function scheduleDeployment($class, $classId, $assId) {
  $composite = $classId.$assId;
  $dates = "date".$composite;
  $names = "name".$composite;
  echo 	"<div class='container roundedsquare' style='text-align: left; padding: 10px;'>
  <h5 class='centered'>Deploy to Class ".$class."</h5>
    <br>
    <label for='section".$composite."'>Section: </label>
    <select id='section".$composite."' name=$names>
        <option value='1'>A</option>
        <option value='2'>B</option>
        <option value='3'>C</option>
        <option value='4'>D</option>
        <option value='5'>E</option>
        <option value='6'>F</option>
    </select><br>
    <label for='".$dates."'>Select Date:</label>
    <input type='date' id='".$dates."' name=".$names."><br>
    <label for='as".$composite."'>Type:</label>
      <select id='as".$composite."' name=".$names.">
        <option name='A' value='A'>Assignment</option>
        <option name='Q' value='Q'>Quiz</option>
        <option name='T' value='T'>Test</option>
      </select><br>
      <button id=".$assId." onclick='deploy(".$assId.",".$classId.")' style='float: right;'>Deploy</button>
    </div>";

}

//for ALL assessments
function displayAllDeployments($allDeployments) {//$vard is json encode of $row['Deployments'] $assId is assessment Id

  $deployments = json_decode($allDeployments, true);
  echo "<ol style='list-style-type: number' >";
  foreach ($deployments as $deployment) {
    displayDeploymentScheduleForm($deployment);
  }
  echo "</ol>";
}

function displayDeploymentScheduleForm($deploymentDetails) {
  if ($deploymentDetails['deploySuccess'] == 0) {
    $col = "class='red'";
    $txt = "<strong>No</strong>";
  } else {
    $col = "class='green'";
    $txt = "<strong>Yes</strong>";
  }

  echo "<li>Class ".$deploymentDetails['classNumber']." Section ".$deploymentDetails['sectionId'];
  echo "<ol ".$col." style='list-style-type: lower-alpha' > ";
  echo "<li>From : ".$deploymentDetails['startDate']."</li>";
  echo "<li>To : ".$deploymentDetails['endDate']."</li>";
  echo "<li>Deployed : ".$txt."</li>";
  echo "</ol>";
  echo "</li>";
}

function displayQuestion($questionDetails) {
  //This should display only 1 question

    echo "<li>";
    echo $questionDetails['question'];
    echo "<ol style='list-style-type: lower-alpha' > ";
      if ($questionDetails['option1']) {
        echo "<li>".$questionDetails['option1']."</li>";
      }
      if ($questionDetails['option2']) {
        echo "<li>".$questionDetails['option2']."</li>";
      }
      if ($questionDetails['option3']) {
        echo "<li>".$questionDetails['option3']."</li>";
      }
      if ($questionDetails['option4']) {
        echo "<li>".$questionDetails['option4']."</li>";
      }
      if ($questionDetails['option5']) {
        echo "<li>".$questionDetails['option5']."</li>";
      }
      if ($questionDetails['option6']) {
        echo "<li>".$questionDetails['option6']."</li>";
      }
    echo "</ol>";
    echo "</li>";

}
function displayAllAssessments($allAssessments) {
  //This function will take ALL assessments and then will loop through all of them and display it as needed.
  foreach ($allAssessments as $assessment) {
    // print_r($assessment);
    echo "ASAASASAS";
    displayAssesmentQuestions($assessment);
  }
}

function displayAssessment ($assessmentTitle ) {

}

function displayAssesmentQuestions($jsonQuestions) {
  //This will take 1 assessment and loop through all the questions in it and display it as needed
  echo "<div class='body col-sm-8 left' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
  $assessmentQuestions = json_decode($jsonQuestions, true);
  // print_r($assessmentQuestions);
  foreach ($assessmentQuestions as $assessmentQuestion) {
    displayQuestion($assessmentQuestion);
  }
  echo "</ol>";
  echo "<ol style='list-style-type: number' >";
  echo "</div>";
}


//Remove UTF8 Bom
// function removeBOM($data) {
//     if (0 === strpos(bin2hex($data), 'efbbbf')) {
//        return substr($data, 3);
//     }
//     return $data;
// }




?>
