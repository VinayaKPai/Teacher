<?php

function deploymentsdiv( $result, $type, $successFlag, $status ) {
  $count  = mysqli_num_rows($result);
  //$result is (type A/Q/T AND status C/O/U)
  $userType = '';//this actually has to be set as a session variable when login is enabled
  if ($type=='A') {$ass = "Assignment";}
  elseif ($type=='T') {$ass = "Test";}
  elseif ($type=='Q') {$ass = "Quiz";}
  else {$ass = "Section ".$type;}//this is for studentView displays, where the $type is actually the sectionId and not A/Q/T

  if ($successFlag==1) {$success = "Deployed";}
  else {$success = "Undeployed"; }
  if ($count>1){$suffix = 's';}
  else {$suffix = '';}

  //the collapsible section will differ sor students and Teachers
  //for teachers, it will be "x completed/ongoing/undeployed/withdrawn ASSIGNMENTS?Quizzes/Test" format
  //for students it will be in the format "x open activities for Class y Section z"
  $userType = 'Student';
  if ($userType=="Student") {
    $txtForCount = " open activities for ";
  }
  else {
    $txtForCount = "";
  }
  echo "<a data-toggle='collapse' href='#".$status."'>
          <h4 class='centered topbanner'>".$count. " " .$txtForCount. " " .$status." ".$ass.$suffix."</h4>
        </a>";
  echo "<div id='".$status."' class='collapse' style='padding: 4px;'>";
    if ($count != 0) {
        while ($row = $result->fetch_array( MYSQLI_ASSOC )){
              deploymentsDivBody( $row, $status, $ass, $type );
          }
    }
    else {
      echo "<div class='panel pane-default'><p>No records</p></div>";
    }
  echo "</div>";
}
  function deploymentsDivBody( $row, $status, $ass, $type ) {
    $dId = '';
    $secId = '';
    $deploymentId = '';
    $assId = $row['Assessment ID'];
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

      // the following line is useful only if json arrayagg is in use
      // $varr = json_decode($row['Questions'], true);
      $title = $row['Title'];
      //create the section heading
          $dId = "collapse".$status.$deploymentId.$assId;//unique id for collapse elements
          $schdTxt = "Schedule a Deployment";
          $secHeading = $leftSpan.$title.$rightSpan;

      echo "<div>";
              // echo "<div class='panel-heading paneldefault'>";
                echo "<a data-toggle='collapse' data-parent='#accordion' href='#".$dId."' > <h6 class='panel-heading centered'>".$secHeading."</h6></a>";
              // echo "</div>";
        echo "</div>";
    	  echo "
            <div id='".$dId."' class='panel-collapse collapse'>
              <div class='panel-body'>";
		              displayDeploymentQuestions($row['Questions']);

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
    <label for='start".$dates."'>Start Date:</label>
    <input type='date' id='start".$dates."' name=".$names."><br>
    <label for='end".$dates."'>End Date:</label>
    <input type='date' id='end".$dates."' name=".$names."><br>
    <label for='as".$composite."'>Type:</label>
      <select id='as".$composite."' name=".$names.">
        <option name='A' value='A'>Assignment</option>
        <option name='Q' value='Q'>Quiz</option>
        <option name='T' value='T'>Test</option>
      </select><br>
      <button id=".$assId." onclick='deploy(".$assId.",".$classId.")' style='float: right;'>Deploy</button>
    </div>";

}

//for ALL Deployments
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

function displayDeploymentQuestions($jsonQuestions) {
  $assessmentQuestions = json_decode("[".$jsonQuestions."]", true);

  //This will take 1 deployment and loop through all the questions in it and display it as needed
  echo "<div class='body col-sm-8 left' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
  foreach ($assessmentQuestions as $assessmentQuestion) {
    displayDeploymentQuestion($assessmentQuestion);
  }
  echo "</ol>";
  echo "<ol style='list-style-type: number' >";
  echo "</div>";
}




function displayDeploymentQuestion($questionDetails) {
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


function displayAssessment ($assessmentTitle ) {

}




?>
