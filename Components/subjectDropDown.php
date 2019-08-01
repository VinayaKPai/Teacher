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



      while ($row = $query->fetch_assoc())  {
        {
          $sn = strip_tags($row['subjectName']);
          echo "<label for='$sn'><input id='$sn' type='checkbox' name='subjectName[$sn]' aria-label='$sn' style='margin: 10px;' onclick='updateClassFilters(\"subjectSelectBoxes\",\"fileredSubjects\");' value='$sn'>$sn</label>";        }
      }

mysqli_close($mysqli);
?>
