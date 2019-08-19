<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT DISTINCT Subject FROM subjects");

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
          $sn = strip_tags($row['Subject']);
          echo "<label for='$sn'><input id='$sn' type='checkbox' name='subjectName[$sn]' aria-label='$sn' style='margin: 10px;' onclick='updateFilters(\"subjectSelectBoxes\",\"filteredSubjects\");' value='$sn'>$sn</label>";        }
      }

mysqli_close($mysqli);
?>
