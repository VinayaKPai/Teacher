<?php
function table( $result,$nested ) {
    $result->fetch_array( MYSQLI_ASSOC );
    echo '<table>';
    tableHead($result );
    tableBody($result,$nested );
    echo '</table>';
}

function tableHead( $result ) {

        echo '<thead>';
        foreach ( $result as $x ) {
            echo '<tr>';
            foreach ( $x as $k => $y ) {
                echo '<th>' . ucfirst( $k ) . '</th>';
            }
            echo '</tr>';
            break;
        }
        echo '</thead>';


}

function tableBody( $result, $nested ) {

        echo '<tbody>';
        foreach ( $result as $x ) {//$x is entire row of outer query
        echo '<tr>';
        foreach ( $x as $k => $y) {//each item of the row is a key-value pair
          if ($k != 'Questions') {
            echo '<td>' . $y . '</td>';// the value in columns other than question column
          }
          else {//process the question column data which is an array of numbers
            echo '<td>';
            questionDisplay ($nested);

            echo '</td>';
          }
        }
        echo '</tr>';
        }
        echo '</tbody>';


}
function questionDisplay ($z) {

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
