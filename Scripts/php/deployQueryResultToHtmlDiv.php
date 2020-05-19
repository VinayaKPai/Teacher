<?php
// If you are passing $result to the function, then $count can be removed as a parameter to the function, because you can get it using mysqli_num_rows($query)
function div( $result,$count, $type, $successFlag, $status ) {
echo $status;
//print_r($result->fetch_object());
$dId = '';
// print_r($result);
$result = $result->fetch_array( MYSQLI_ASSOC );


  if ($type=='A') {$ass = "Assignment";}
  if ($type=='T') {$ass = "Test";}
  if ($type=='Q') {$ass = "QUIZ";}
  if ($count != 0) {
      if ($successFlag==1) {$success = "Deployed";}
      else {$success = "Undeployed"; }

      echo "<h4 class='topbanner centered'>".$count. " ".$status." ".$ass."</h4>";
      //Set of same status deployments
      //Should hold expandable panels inside also
      foreach ($result as $resultRow) {
        $dId = $status."collapse".$resultRow['Id'];
        echo '<div class="panel-group" id="accordion">';
        echo '<div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title centered">
              <span style="float: left">Class Section</span>
              <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId.'">
              '.$resultRow['Title'].'</a>
              <span style="float: right">From To</span>
            </h4>
          </div>
          <div id="'.$dId.'" class="panel-collapse collapse">
            <div class="panel-body">';
            divBody( $resultRow,  $status, $dId );
        echo '</div>
          </div>
        </div>';

        }
      }
      echo "</div>";
  }

function divBody( $result,  $status, $dId ) {
  echo $status." ".$dId;
  $questionsArray = json_decode($resultRow['Questions'], true);

  foreach ($resultNew as $y) {//each row of data - ie each deployment
    foreach ($y as $a => $b) {//$a = Id,Type,Class,Section,Open From,Open Till,Deployed? 1,Assessment ID,Title,Questions
      echo "<li>".$a." ".$b."</li>";
      if ($a == "Questions") {
        echo "<br><br>".$b;
        $c = json_decode($b);
        echo gettype($c);
      }
    }
  }
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

function displayQuestion(/*pass 1 question object here*/) {
  //This should display only 1 question
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
