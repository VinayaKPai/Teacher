<?php
  	include "../basecode-create_connection.php";
    // echo $datetime1;
    $slno = 0;
  	$query = $mysqli->query("SELECT DISTINCT classNumber FROM classsections");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};

      echo "Class/Std: <select class='form-group' id='classNumber' name='classNumber' required><option id='blankclassNumber'></option>";
      while ($row = $query->fetch_assoc())  {
        {
          $cn = strip_tags($row['classNumber']);
          echo "<option>$cn</option>";

        }
      }
      echo "</select>";

?>
