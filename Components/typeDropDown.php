<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT DISTINCT typeName FROM questiontype");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};



      echo "Q Type : <select class='form-group' id='typeName' name='typeName'><option id='blanktypeName'></option>";
      while ($row = $query->fetch_assoc())  {
        {
          $tn = strip_tags($row['typeName']);

          echo "<option>$tn</option>";

        }
      }
      echo "</select>";

?>
