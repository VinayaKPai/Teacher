<?php

function deploymentsdiv( $result,$type,$pageHeading,$status,$mysqli) {
// echo "deploymentsdiv starts";
//Here the data will be one of A/Q/T and ongoing/completed/future/withdrawn activities
//$result is query from deploymentlog
//$queryAssQ is query with question data
//$type is A/Q/T
//$successFlag is 0/1/2
//$status is open/completed/undeployed/withdrawn
  $count  = mysqli_num_rows($result);
  // $countAssQ  = mysqli_num_rows($queryAssQ);

  //$result is (type A/Q/T AND status C/O/U)
  //$queryAssQ is question data related to the deployments

  // Set some required texts for display headings
  if ($type=='A') {$ass = "Assignment";}
  elseif ($type=='T') {$ass = "Test";}
  elseif ($type=='Q') {$ass = "Quiz";}
  else {$ass = "Section ".$type;}//this is for studentView displays, where the $type is actually the sectionId and not A/Q/T

  $userType = '';//this actually has to be set as a session variable when login is enabled
  // if ($successFlag==1) {$success = "Deployed";}
  // else {$success = "Undeployed"; }
  if ($count>1){$suffix = 's';}
  else {$suffix = '';}


  $userType = 'Student';
  if ($userType=="Student") {
    $txtForCount = " open activities for ";
  }
  else {
    $txtForCount = "";
  }

  for ($i=1;$i<$count;$i++) {
    echo "<h6>".$count."==".$i."</h6>";
    include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/ActivityDeploymentPanel.php";
  }
}


  function displayDepDetails($rowAssQ) {

      echo "<p>".$rowAssQ['question']."</p>";
      echo "<ol style='list-style-type: lower-alpha; margin-left: 2px;' > ";
        if ($rowAssQ['option1']) {
          echo "<li>".$rowAssQ['option1']."</li>";
        }
        if ($rowAssQ['option2']) {
          echo "<li>".$rowAssQ['option2']."</li>";
        }
        if ($rowAssQ['option3']) {
          echo "<li>".$rowAssQ['option3']."</li>";
        }
        if ($rowAssQ['option4']) {
          echo "<li>".$rowAssQ['option4']."</li>";
        }
        if ($rowAssQ['option5']) {
          echo "<li>".$rowAssQ['option5']."</li>";
        }
        if ($rowAssQ['option6']) {
          echo "<li>".$rowAssQ['option6']."</li>";
        }
      echo "</ol>";

  }



?>
