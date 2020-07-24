<?php
function cttQueryResultToHtmlTable( $result ) {
  $result->fetch_array( MYSQLI_ASSOC );
  if ($result) {
      $rowcount=mysqli_num_rows($result);
      if ($rowcount > 0) {
        $cls = "'color: Green;'";
      }
      else { $cls = "'color: Red;'";}
    }
    echo "<h4 class='topbanner'>Currently $rowcount active Subjects in your setup</h4>" ;
  echo "<table style='width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';'>";
      ctttableBody(  $result );
  echo '</table>';
}
function ctttableBody( $result ) {
      echo '<tbody>';
        foreach ( $result as $subject ) {
          $sId = $subject['Sub Id'];
          $togId = "s".$sId;
          //create a link for the collapsible
          echo "<tr><td class='centered' style='padding: 1px;'><a data-toggle='collapse' href='#".$togId."'><h5  class='maroon'>";
            echo "Subject: ".$subject['Sub Name'];
          echo "</h5></a></td></tr>";
          //a tr for the collapsible
          echo "<tr><td style='background: White;'>";
            subjectNameCollapsible($subject,$togId,$sId);
          echo "</td></tr>";
        }
      echo '</tbody>';
}

function subjectNameCollapsible($subject,$togId,$sId) {
        echo "<div id='".$togId."' class='collapse' style=' background: LightGrey; padding-left: 5px;'>" ;
            $cls = json_decode($subject['Cls'], true);
            $tchsecs = json_decode($subject['Teachers'], true);
            // for ($i=0;$i<count($cls);$i++) {
            foreach ($cls as $clsData) {
              cttSubsDivCollapsible($clsData,$togId,$tchsecs,$sId);
            }
        echo "</div>";
}

function cttSubsDivCollapsible($clsData,$togId,$tchsecs,$sId) {
  foreach ($clsData as $cls => $data ) {
    if ($cls == 'Cl Id') {
      $clsId = $data;
      $clsDivId = $togId."c".$clsId;
      // echo "<div class='panel panel-heading centered'>";
      echo "<a style='color: maroon;' data-toggle='collapse' href='#".$clsDivId."'><h5>";
    }
    if ($cls=='Cl Num') {
      echo "Class/Std : ".$data;
      //display section and teacher in one row
      echo "</h5></a>";
      // echo "</div>";
      displaySecAndTeacher($tchsecs,$clsId,$clsDivId,$sId);
    }
  }
}

function displaySecAndTeacher($tchsecs,$clsId,$clsDivId,$sId) {
  echo "<div id='" .$clsDivId. "'  class='collapse'>";
  // echo "<table>";
  // echo "<tr>";
    foreach ($tchsecs as $tchSec ) {
      if ($tchSec['T Class Id']==$clsId AND  $tchSec['T Sub Id']==$sId) {
        echo "<div class='panel panel-info'>
          <span style='padding-left: 5%;'>Section: </span>
          <span style='width: 20%; padding-left: 5%;'>".$tchSec['T Sec Name']."</span>
          <span style='padding-left:40%;'>";
        echo $tchSec['T First Name']." ". $tchSec['T Middle Name']." ". $tchSec['T Last Name']."</span></div>";
      }
    }
    // echo "</tr>";
    // echo "</table>";
  echo "</div>";
}
?>
