<?php
function table( $includeTickBox, $result ) {
  if($includeTickBox == false && $result == false) {

    // tableHead( $includeTickBox, $result );
    // tableBody( $includeTickBox, $result );
    echo '</table>';
  } else {
    $result->fetch_array( MYSQLI_ASSOC );
    // print_r($result);
    echo '<table>';
    tableHead( $includeTickBox, $result );
    tableBody( $includeTickBox, $result );
    echo '</table>';
  }
}

function tableHead( $includeTickBox, $result ) {
  if($includeTickBox) {
    echo '<thead>';
    foreach ( $result as $x ) {
        echo '<tr>';
        $i = 0;
        foreach ( $x as $k => $y ) {
          if ($i == 0) {
            echo '<th> </th>';
          } else {
            echo '<th>' . ucfirst( $k ) . '</th>';
          }
          $i++;
        }
        echo '</tr>';
        break;
      }
      echo '</thead>';
    }

    else {
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

}

function tableBody( $includeTickBox, $result ) {
  if($includeTickBox) {
        echo '<tbody>';
        foreach ( $result as $x ) {
        echo '<tr>';
        $i = 0;
        foreach ( $x as $y ) {
          if ($i == 0) {
            echo '<td><input type="checkbox" name=' . $y . ' value=' . $y . '></td>';
          } else {
            echo '<td>' . $y . '</td>';
          }
          $i++;
        }
        echo '</tr>';
        }
        echo '</tbody>';
      } else {
        echo '<tbody>';
        foreach ( $result as $x ) {
        echo '<tr>';
        foreach ( $x as $y ) {
            echo '<td>' . $y . '</td>';
        }
        echo '</tr>';
        }
        echo '</tbody>';
      }

}

 ?>
