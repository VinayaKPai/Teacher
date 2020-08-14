<?php
function table( $includeTickBox, $query ) {
  if($includeTickBox == false && $query == false) {

    // tableHead( $includeTickBox, $query );
    // tableBody( $includeTickBox, $query );
    echo '</table>';
  } else {
    $query->fetch_array( MYSQLI_ASSOC );
    // print_r($query);
    echo '<table>';
    tableHead( $includeTickBox, $query );
    tableBody( $includeTickBox, $query );
    echo '</table>';
  }
}

function tableHead( $includeTickBox, $query ) {
  if($includeTickBox) {
    echo '<thead>';
    foreach ( $query as $x ) {
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
        foreach ( $query as $x ) {
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

function tableBody( $includeTickBox, $query ) {
  if($includeTickBox) {
        echo '<tbody>';
        foreach ( $query as $x ) {
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
        foreach ( $query as $x ) {
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
