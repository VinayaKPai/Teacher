<?php
function table( $a, $result, $pageHeading ) {
    $row = $result->fetch_assoc();
    $rowcount = mysqli_num_rows($result);
    $href = "#collapse".$a;
    $hId = "collapse".$a;
    if ($rowcount!=0) {
        echo "
          <div class='panel panel-default' style='padding: 3px;'>
            <div class='panel-heading' style='background: var(--BodGradbanner); padding: 3px;'>
              <h4 class='panel-title green'>
                <a data-toggle='collapse' href='$href'>". $pageHeading." for Class " .$row['Class']."</a>
              </h4>
            </div>
            <div id='$hId' class='panel-collapse collapse'>
                <div class='panel-body'>"  ;
                  echo "<table style='width: 100%;'>";
                    tableHead($result );
                    tableBody($result);
                  echo "</table>
                </div>
              </div>
            </div>";
    }
    else {
      echo "<div class='panel panel-default'>
          <div class='panel-heading' style='background: var(--BodGradbanner); padding: 3px;'>
            <h4 class='panel-title red'>
              <a data-toggle='collapse' href='$href'>". $pageHeading." for Class ".$a."</a>
            </h4></div>
            <div id='$hId' class='panel-collapse collapse'>
              <div class='panel-body'>" ;
          echo '<table>';
            tableHead($result );
            tableBody($result);
          echo '</table></div></div>
        </div>';
        }
}

function tableHead( $result ) {
        echo '<thead>';
        foreach ( $result as $x ) {
            echo '<tr>';
            foreach ( $x as $k => $y ) {
                echo '<th>' . $k . '</th>';
            }
            echo '</tr>';
            break;
        }
        echo '</thead>';


}

function tableBody( $result) {

        echo '<tbody>';
        foreach ( $result as $x ) {//$x is entire row of outer query
        echo '<tr>';
        foreach ( $x as $k => $y) {
            echo '<td>' . $y . '</td>';
        }
        echo '</tr>';
        }
        echo '</tbody>';


}
function nameDisplay ($z) {

  foreach ( $z as $a ) { //the entire question row, including options

    echo "<ol>";
      foreach ($a as $c => $d){
        //if $c is the question, outer ol, else inner ul
        if ($c='question') {
          echo "<li>".$d;
        }
        else {
          echo "<ul>";
          if ($d != '' || $d = NULL) {
            echo "<li>".$d."</li>";
          }
          echo "</ul>";
        }
        echo "</li>";
      }
echo "</ol>";

  }

}
 ?>
