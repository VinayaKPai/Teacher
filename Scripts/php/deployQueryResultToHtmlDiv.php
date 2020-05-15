<?php
function div( $result,$nested,$count, $type, $successFlag ) {

  if ($type=='A') {$ass = "Assignment";}
  if ($type=='T') {$ass = "Test";}
  if ($type=='Q') {$ass = "QUIZ";}
  if ($successFlag==1) {$success = "deployed";}
  else {$success = "undeployed"; }
  echo "<h5>".$count. " ".$success." ".$ass."</h5>";
    $result->fetch_array( MYSQLI_ASSOC );
    echo '<div class="panel-group" id="accordion">';

    divBody($result,$nested );
    echo '</div>';  //panel-group
}

// function divHead( $result ) {
//
//         echo '<thead>';
//         foreach ( $result as $x ) {
//             echo '<div>';
//             foreach ( $x as $k => $y ) {
//                 echo '<th>' . ucfirst( $k ) . '</th>';
//             }
//             echo '</div>';
//             break;
//         }
//         echo '</thead>';


// }

function divBody( $result, $nested ) {

        foreach ( $result as $x ) {//$x is entire row of outer query ie each deployment details
          echo '<div class="panel panel-default">';
          $dId = "collapse".$x['Id'];
          echo '<div class="panel-heading">
              <h4 class="panel-title centered"><span style="float: left";>Class '.$x["Class"].' Section '.$x["Section"].'</span>
                <a data-toggle="collapse" data-parent="#accordion" href="#'.$dId.'" >'.$x["Title"].'</a>
                <span style="float: right";>From '.$x["From"].' To '.$x["To"].'</span>
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
?>
