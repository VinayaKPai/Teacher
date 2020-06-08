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
              <div class='panel-body'>";
		              displayAssesmentQuestions($row['Questions']);
              echo "<div class='body col-sm-4' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
                   echo "<h5>".$schdTxt . "</h5>";
                  if(isset($row['Deployments'])) {
                    displayAllDeployments($row['Deployments']);
                    $classId = $row['classId'];
                    $class = $row['classNumber'];
                    $assId = $row['Assessment ID'];
                  }
                  scheduleDeployment($row['classNumber'], $row['classId'], $row['Assessment ID']);
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
    displayDeployment($deployment);
  }
  echo "</ol>";
}

function displayDeployment($deploymentDetails) {
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

    //$questionDetails = $varr[$questionDetails];
    // print_r($questionDetails);
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

function displayAssessment ($assessmentTitle ) {

}

function displayAssesmentQuestions($jsonQuestions) {
  //This will take 1 assessment and loop through all the questions in it and display it as needed
  echo "<div class='body col-sm-8 left' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
  $assessmentQuestions = json_decode($jsonQuestions, true);
  echo "<ol style='list-style-type: number' >";
  foreach ($assessmentQuestions as $assessmentQuestion) {
    displayQuestion($assessmentQuestion);
  }
  echo "</ol>";
  echo "</div>";
}


//Remove UTF8 Bom
function removeBOM($data) {
    if (0 === strpos(bin2hex($data), 'efbbbf')) {
       return substr($data, 3);
    }
    return $data;
}


?>
