<?php

  function savedAssessmentsdiv( $result, $successFlag ) {
    $count  = mysqli_num_rows($result);
    $ass = "Assessment";

    if ($successFlag==1) {$success = "Deployed";}
    else {$success = "Undeployed"; }
    if ($count>1){$suffix = 's';}
    else {$suffix = '';}

      $ass = "Assessment";
      echo "<a data-toggle='collapse' href='#".$ass."'><h4 class='topbanner centered'>".$count. " ".$ass.$suffix."</h4></a>";

    if ($count != 0) {
      echo "<div class='collapse' style='padding: 5px;' id='".$ass."'>";
        while ($row = $result->fetch_array( MYSQLI_ASSOC )){
              savedAssessmentsDivBody( $row, $ass );
          }
      echo "</div>";
    }
  }

  function savedAssessmentsDivBody( $row, $ass ) {
    $dId = '';
    $assId = $row['Assessment ID'];
      $varr = json_decode($row['Questions'], true);
      $title = $row['Title'];
      $dId = "collapseAss".$assId;//unique id for collapse elements
      //create the section heading
      $schdTxt = "Scheduled Deployments";

      echo "<div>
                <a data-toggle='collapse' data-parent='#accordion' href='#".$dId."' > <h6 class='panel-heading centered'>".$title."</h6></a></div>";
    	  echo "<div id='".$dId."' class='panel-collapse collapse'>
              <div class='panel-body'>";
		              displayAssessmentQuestions($row['Questions']);
              echo "<div class='body col-sm-4' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
                   echo "<h5>".$schdTxt . "</h5>";
                  if(isset($row['Deployments'])) {
                    displayAllAssessments($row['Deployments']);
                    $classId = $row['Class Id'];
                    $class = $row['Class'];
                    $assId = $row['Assessment ID'];
                  }
                  scheduleToDeploy($row['Class'], $row['Class Id'], $row['Assessment ID']);
              echo "</div>";
            echo '</div>
          </div>';
      }

//for all assessments
function scheduleToDeploy($class, $classId, $assId) {
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
function displayAllAssessments($allDeployments) {//$vard is json encode of $row['Deployments'] $assId is assessment Id

  $deployments = json_decode($allDeployments, true);
  echo "<ol style='list-style-type: number' >";
  foreach ($deployments as $deployment) {
    displayDeploymentSchForm($deployment);
  }
  echo "</ol>";
}

function displayDeploymentSchForm($deploymentDetails) {
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

function displayAssessmentQuestions($jsonQuestions) {
  $assessmentQuestions = json_decode($jsonQuestions, true);
  //This will take 1 assessment and loop through all the questions in it and display it as needed
  echo "<div class='body col-sm-8 left' style='background:  var(--BodyGradient); border-radius: 25px; border-bottom: 2px solid #4B0082;'>";
  foreach ($assessmentQuestions as $assessmentQuestion) {
    displayAssessmentQuestion($assessmentQuestion);
  }
  echo "</ol>";
  echo "</div>";
  echo "<ol style='list-style-type: number' >";
}

function displayAssessmentQuestion($questionDetails) {
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
