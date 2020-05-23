<?php
//BACKUP AT 10:35 AM 23-5-2020
// If you are passing $result to the function, then $count can be removed as a parameter to the function, because you can get it using mysqli_num_rows($query)
// function div( $result,$count, $type, $successFlag, $status ) {
function div( $result, $type, $successFlag, $status ) {

  $count  = mysqli_num_rows($result);
  $dId = '';

  //#1 Below are some texts required for headings of sections
  if ($type=='A') {$ass = "Assignment";}
  if ($type=='T') {$ass = "Test";}
  if ($type=='Q') {$ass = "QUIZ";}
  //#1 ends
  //#2 beginning of display
  if ($count != 0) {
    //#3 Below are some more texts required for headings of sections
      if ($successFlag==1) {$success = "Deployed";}
      else {$success = "Undeployed"; }
      if ($count>1){$suffix = 's';}
      else {$suffix = '';}
      //#3 ends
      //#4 heading for each type of deployment
      if ($status=='completed' || $status=='ongoing' || $status=='undeployed') {
      echo "<h4 class='topbanner centered'>".$count. " ".$status." ".$ass.$suffix."</h4>";
      //#4 ends

      //#5 Set of same status deployments
      //Should hold expandable panels inside also
      while ($row = $result->fetch_array( MYSQLI_ASSOC )){
            divBody( $row, $status );
        }
        //#5 ends
      }
      else {//#4 else begins
        $ass = "Assessment";
        echo "<h4 class='topbanner centered'>".$count. " ".$ass.$suffix."</h4>";
          while ($row = $result->fetch_array( MYSQLI_ASSOC )){
            divBodyAll($row);
          }
      }//#4 else ends
    }//if ($count != 0)
    //#2  ends
}
//function div for completed, ongoing, Undeployed
function divBody( $row, $status ) {//for completed, ongoing and undeployed ONLY
  //#6 link to collapsible panel and the panel itself
        $dId = "collapse".$status.$row['Id'];//unique id for collapse elements
        echo '<div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title centered"><span style="float: left;">Class: '.$row['Class'].' Section: '.$row['Section'].'</span>
                    <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId.'">               '.$row['Title'].'</a>
                  <span style="float: right;">From : '
                    . $row['Open From'].' To : '
                    . $row['Open Till'].'</span></h4>
                </div>
                <div id="'.$dId.'" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="body col-sm-8 left" style="background:  var(--BodyGradient); border-radius: 25px;
                  	border-bottom: 2px solid #4B0082;">';
                    displayQuestion($row['Questions']);

                    echo "</div>
                    <div class='body col-sm-4'>";
                      deployThisAssessment($row['Class'], $row['Class Id'], $row['Section'], $row['SectionId'], $row['Assessment ID']);
                    echo "</div>";
              echo '</div>
              </div>';
  }

//for completed, ongoing, undeployed A/Q/T
function deployThisAssessment($class, $classId, $section, $sectionId, $assId) {
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

echo '</div>';
}
//function div for all assessments
function divBodyAll($row) {
  $assId = $row['assessment_Id'];
  $dId = "collapse".$assId;//unique id for collapse elements
  $varr = json_decode($row['Questions'], true);
  $title = $row['assessment_Title'];
  echo '<div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title centered">
              <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId.'">'.$title.'</a>
            </h4>
          </div>
          <div id="'.$dId.'" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="body col-sm-8 left" style="background:  var(--BodyGradient); border-radius: 25px;
              border-bottom: 2px solid #4B0082;">';
              //lhs div with questions display
              displayQuestion($row['Questions']);
              echo "</div>
              <div class='body col-sm-4' style='background:  var(--BodyGradient); border-radius: 25px;
              border-bottom: 2px solid #4B0082;'>";
              echo "<h5>Scheduled Deployments</h5>";
              $vard = json_decode($row['Deployments'], true);
                deployAllAssessments($vard, $assId);

              echo "</div>";
        echo '</div>
        </div>';
}

//for ALL assessments
function deployAllAssessments($vard, $assId) {//$vard is json encode of $row['Deployments'] $assId is assessment Id

  echo "<ol style='list-style-type: number' >";
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
        echo "<li>Class ".$deps['classId']." Section ".$deps['section'];

        echo "<ol ".$col." style='list-style-type: lower-alpha' > ";
            echo "<li>From : ".$deps['startDate']."</li>";
            echo "<li>To : ".$deps['endDate']."</li>";
            echo "<li>Deployed : ".$txt."</li>";
        echo "</ol>";
        echo "</li>";


  }
  echo "</ol>";
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
