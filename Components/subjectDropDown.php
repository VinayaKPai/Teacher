<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT * FROM subjects");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};


echo $rowcount;

      while ($row = $query->fetch_assoc())  {
        {
          $sn = $row['subjectName'];
          $snid = $row['subjectName'];
          echo "<option id=$snid>$sn</option>";

        }
      }


?>
