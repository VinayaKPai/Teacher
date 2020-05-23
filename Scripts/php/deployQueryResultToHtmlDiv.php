<?php

  function div( $result, $type, $successFlag, $status ) {
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
          // print_r($row);
          //if A/Q/T, C/O/U, then each $row has Id, Type, Class, Class Id, SectionId, Section, Open From, Open Till, Deployed?, Assessment ID, Title, Questions for each record like this:
          //Array ( a=>b c=>d .... [Questions] => [{a:b, c:d,....},{a:h, c:i,....}{a:p, c:q,...}] ) >>where each {} is a single deployment  data<<
          //if ALL, then each $row has Title, Assessment ID, Questions, Deployments for each record like this:
          //Array ( a=>b c=>d [Questions] => [{a:b, c:d,....},{a:h, c:i,....}{a:p, c:q,...}] ) >>where each {} is a single assessment  data<< [Deployments] => [{a:b, c:d,....},{a:h, c:i,....}{a:p, c:q,...}] >>where each {} is a single deployment  data for THIS particular assessment << )
          //PROBLEM: WHEN "ALL" ARE DISPLAYED, THEN, EACH QUESTION IN THE ASSESSMENT IS REPEATED 4 TIMES IF THAT PARTICULAR ASSESSMENT HAS BEEN SCHEDULED FOR DEPLOYMENT 4 TIMES. ALSO, THE scheduleDeployment() IS ALSO REPEATED 4 TIMES, AND THE DEPLOYMENT FEATURE IS DISPLAYED 4 TIMES!
              divBody( $row, $status, $ass, $type );
          }
    }
  }


  function divBody( $row, $status, $ass, $type ) {
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
              <div class='panel-body'>
                <div class='body col-sm-8 left' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
		              displayQuestion($row['Questions']);
                echo "</div>
                <div class='body col-sm-4' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
                   echo "<h5>".$schdTxt . "</h5>";
                   if (isset($row['Class']) && isset($row['Section']) && isset($row['Open From']) && isset($row['Open Till'])) {
                      scheduleDeployment($row['Class'], $row['Class Id'], $row['Section'], $row['SectionId'], $row['Assessment ID']);
                   }
                 else {
    	      $vard = json_decode($row['Deployments'], true);
            for ($j=0;$j<count($vard);$j++) {
              $deps = $vard[$j];  //is also an array

              $classId = $deps['classId'];
              $sectionId = $deps['section'];
              $schStartDate = $deps['startDate'];
              $schEndDate = $deps['endDate'];
              $deploySuccess = $deps['deploySuccess'];
              $composite = $classId.$assId;
              $dates = "date".$composite;
              $names = "name".$composite;

              if ($deps['deploySuccess']==0) {$col = "class='red'"; $txt="<strong>No</strong>";}
              else {$col = "class='green'"; $txt="<strong>Yes</strong>";}

              deployAllAssessments($classId, $sectionId,  $schStartDate, $schEndDate, $deploySuccess,  $composite, $dates, $names, $txt, $col, $assId);
            }
         }
              echo "</div>";
            echo '</div>
          </div>';
      }

//for completed, ongoing, undeployed A/Q/T
function scheduleDeployment($class, $classId, $section, $sectionId, $assId) {
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
function deployAllAssessments($classId, $sectionId,  $schStartDate, $schEndDate, $deploySuccess, $composite, $dates, $names, $txt, $col,  $assId) {//$vard is json encode of $row['Deployments'] $assId is assessment Id

  echo "<ol style='list-style-type: number' >";



        echo "<li>Class ".$classId." Section ".$sectionId;

        echo "<ol ".$col." style='list-style-type: lower-alpha' > ";
            echo "<li>From : ".$schStartDate."</li>";
            echo "<li>To : ".$schEndDate."</li>";
            echo "<li>Deployed : ".$txt."</li>";
        echo "</ol>";
        echo "</li>";

//this ends the existing schedules in the deploymentlog
  // }
  echo "</ol>";
  //display the feature to deploy the assessment again using scheduleDeployment()??
  //Array ( [0] => Array ( [classId] => 9 [section] => 2 [startDate] => 2020-05-06 [endDate] => 2020-05-23 [deploySuccess] => 0 ) )
  // $class, $classId, $section, $sectionId, $assId
  echo 	"<div class='container roundedsquare' style='text-align: left; padding: 10px;'>
  <h5 class='centered'>Deploy to Class ".$classId."</h5>
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

function displayQuestion($questionData) {
  //This should display only 1 question
  $varr = json_decode($questionData, true);
  echo "<ol style='list-style-type: number' >";
  for ($j=0;$j<count($varr);$j++) {
    $l = $varr[$j];
    // print_r($l);
    echo "<li>";
    echo $l['question'];
    echo "<ol style='list-style-type: lower-alpha' > ";
      if ($l['option1']) {
        echo "<li>".$l['option1']."</li>";
      }
      if ($l['option2']) {
        echo "<li>".$l['option2']."</li>";
      }
      if ($l['option3']) {
        echo "<li>".$l['option3']."</li>";
      }
      if ($l['option4']) {
        echo "<li>".$l['option4']."</li>";
      }
      if ($l['option5']) {
        echo "<li>".$l['option5']."</li>";
      }
      if ($l['option6']) {
        echo "<li>".$l['option6']."</li>";
      }
    echo "</ol>";
    echo "</li>";
  }
  echo "</ol>";
}



/*
Step 1
$result->fetch_array( MYSQLI_ASSOC ) will give you all the rows returned in the query (So all assessments). You should pass this to displayAllAssessments() and then inside that function, you should loop through all of them, as shown below
foreach ($result as $resultRow) will select each row (So each assessment)

Step 2
$questionsArray = json_decode($resultRow['Questions'], true); will give you an array with all the questions. pass this to displayAssesmentQuestions()
Inside loop through and pass each question to displayQuestion()

Step 3
displayQuestion() will only display 1 question.
So echo the output for 1 question
 */


function displayAllAssessments($allAssessments) {
  //This function will take ALL assessments and then will loop through all of them and display it as needed.
  foreach ($allAssessments as $assessment) {
    displayAssesmentQuestions($assessment);
  }
}

function displayAssesmentQuestions($assessment) {
  //This will take 1 assessment and loop through all the questions in it and display it as needed
  foreach ($assessmentQuestions as $assessmentQuestion) {
    displayQuestion($assessmentQuestion);
  }
}


//Remove UTF8 Bom
function removeBOM($data) {
    if (0 === strpos(bin2hex($data), 'efbbbf')) {
       return substr($data, 3);
    }
    return $data;
}
//
// function questionDisplay ($z) {
//
//   foreach ( $z as $a ) { //the entire question row, including options
//     echo $a['Questions'];
//       foreach ($a as $c => $d){ //$c will be Id, Class, Question, Option_1, Option_2, Option_3, Option_4, Option_5, Option_6
//         if ($c!='Id' && $c!='Class' && $c!='Question' && $c != 'qId' && $c !='question') {
//             echo "<ul type='a'>";
//           if ($d) {
//             echo "<li>".$d."</li>";
//           }
//           echo "</ul>";
//         }
//       }
//
//   }
//
// }
// function deploymentDisplay ($z) {
//
//   foreach ( $z as $a ) { //the entire question row, including options
//     // echo $a['Questions'];
//       foreach ($a as $c => $d){ //$c will be Id, Class, Question, Option_1, Option_2, Option_3, Option_4, Option_5, Option_6
//         echo "<ul>";
//         if ($c=='Open From' && $c=='Open Till') {
//           echo $c." is c AND ".$d." is d";
//         //     echo "<ul type='a'>";
//         //   if ($d) {
//         //     echo "<li>".$d."</li>";
//         //   }
//         //   echo "</ul>";
//         }
//         else { echo "<li>not c or d</li>";}
//         echo "</ul>";
//       }
//
//   }
//
// }

?>
