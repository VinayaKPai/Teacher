<?php
function div( $result,$nested,$count, $type, $successFlag, $status ) {

  if ($type=='A') {$ass = "Assignment";}
  if ($type=='T') {$ass = "Test";}
  if ($type=='Q') {$ass = "QUIZ";}
  if ($result != false) {
      if ($successFlag==1) {$success = "Deployed";}
      else {$success = "Undeployed"; }
      echo "<h4 class='btn btn-block topbanner'>".$count. " ".$status." ".$ass."</h4>";
        $result->fetch_array( MYSQLI_ASSOC );
        echo '<div class="panel-group" id="accordion">';

        divBody($result,$nested );
        echo '</div>';  //panel-group
  }
  else {
    echo "<div class='panel panel-default'>
            <div class='panel-heading'>
              <div class='panel-heading'>
                <h4>0 ".$status." ".$ass."s </h4>
              </div>
            </div>
      </div> ";
  }
}
function divBody( $result, $nested ) {

        foreach ( $result as $x ) {//$x is entire row of outer query ie each deployment details
          echo '<div class="panel panel-default">';
          $dId = "collapse".$x['Id'];
          echo '<div class="panel-heading">
              <h4 class="panel-title centered"><span style="float: left";>Class '.$x["Class"].' Section '.$x["Section"].'</span>
                <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId.'" >'.$x["Title"].'</a>
                <span style="float: right";>From '.$x["Open From"].' To '.$x["Open Till"].'</span>
              </h4>
            </div>';  //panel-heading
          // foreach ( $x as $k => $y) {//each item of the row is a key-value pair
          echo '<div id="'.$dId.'" class="pannel-collapse collapse">';
            //We want
            //W2. A DIV with the dates of deployment
            echo '<div class="panel-body" style="background:  var(--BodyGradient);">';
            if ($x['Questions']) {//process the question column data which is an array of numbers

              questionDisplay ($nested);

            }
            echo '</div>';  //panel-body
            echo '</div>';  //pannel-collapse collapse
          // }
          echo '</div>';  //panel panel-default
        }
}

function questionDisplay ($z) {

  foreach ( $z as $a ) { //the entire question row, including options
    echo $a['question'];
      foreach ($a as $c => $d){
        //if $c is the question, outer ol, else inner ul
        if ($c!='question') {
            echo "<ul type='a'>";
          if ($d) {
            echo "<li>".$d."</li>";
          }
          echo "</ul>";
        }
      }

  }

}

function diva( $result1,$nested1,$count1 ) {
  if ($result1 != false) {
    echo "<h4 class='btn btn-block topbanner'>".$count1. " ASSESSMENTS in DB</h4>";
    $result1->fetch_array( MYSQLI_ASSOC );
    echo '<div class="panel-group" id="accordion">';

    divaBody($result1,$nested1 );
    echo '</div>';  //panel-group
  }
}

function divaBody( $result1, $nested1 ) {

        foreach ( $result1 as $x1 ) {//$x is entire row of outer query ie each deployment details
          echo '<div class="panel panel-default">';
          $dId1 = "assessment".$x1['assessment_Id'];
          echo '<div class="panel-heading">
              <h4 class="panel-title centered">
                <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId1.'" >'.$x1["assessment_Title"].'</a>
              </h4>
            </div>';  //panel-heading
          // foreach ( $x as $k => $y) {//each item of the row is a key-value pair
          echo '<div id="'.$dId1.'" class="pannel-collapse collapse">';
            //We want
            //W2. A DIV with the dates of deployment
            echo '<div class="panel-body" style="background:  var(--BodyGradient);">';
            if ($x1['assessment_questions']) {//process the question column data which is an array of numbers

              questionDisplay ($nested1);

            }
            echo '</div>';  //panel-body
            echo '</div>';  //pannel-collapse collapse
          // }
          echo '</div>';  //panel panel-default
        }
}
?>
