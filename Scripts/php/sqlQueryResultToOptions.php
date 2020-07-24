<?php

function selectOption( $result ) {
echo '<option></option>';

  $result->fetch_array( MYSQLI_ASSOC );
    foreach ( $result as $x ) {

        echo '<option>' . $x['Topic'] . '</option>';

    }
  }

 ?>
