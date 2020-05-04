<?php
function table($result ) {
  $result->fetch_array( MYSQLI_ASSOC ); //this is similar to $row = $query->fetch_assoc()
    // print_r($result);
    echo '<table>';
    tableHead($result );
    tableBody($result );
    echo '</table>';
}

function tableHead($result ) {
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

function tableBody($result ) {
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

 ?>
