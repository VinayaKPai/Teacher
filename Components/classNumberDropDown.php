<?php
  	include "../basecode-create_connection.php";
    // echo $datetime1;
  
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

      while ($row = $query->fetch_assoc())  {
        {
          $cn = strip_tags($row['classNumber']);
          echo "<option id='$cn' name='$cn'>$cn</option>";

        }
      }


?>
