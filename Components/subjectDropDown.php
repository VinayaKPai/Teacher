<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT DISTINCT subjectName FROM subjects");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};



      echo "Subject: <select name='subjectName' id='subjectName' name='subjectName' required><option id='blanksubjectName'></option>";
      while ($row = $query->fetch_assoc())  {
        {
          $sn = strip_tags($row['subjectName']);

          echo "<option>$sn</option>";

        }
      }
      echo "</select>";

?>
