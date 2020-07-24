<?php

function sqlQueryToList( $result ) {
  // echo "";
  echo "<ol>";
    $result->fetch_array( MYSQLI_ASSOC );
      foreach ( $result as $x ) {
        if ($x['visibility']=='Y') {
          $visib = "Active - Will be available for adding classes";
          $colour = "green";
        }
        else {
          $visib = "Inactive - Will not be available for adding classes";
          $colour = "red";
        }
          echo '<li>
                  <span class="th_odd">' . $x['firstName'] . ' ' . $x['middleName'] . ' ' . $x['lastName'] . '</span>
                  <span style="float: right" class='.$colour.'>'.$visib.'</span>
                </li>';
      }
    echo "</ol>";
  }

 ?>
