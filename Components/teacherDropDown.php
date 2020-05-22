<?php
  	include "../basecode-create_connection.php";

    //catch errors
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

  	$query = $mysqli->query("SELECT * FROM users WHERE `role` = 'T' AND `visibility` = 1 " );

        echo "<label for='teacherName'>Teacher   <select name='teacherName' id='teacherName'><option></option>";
        while ($row = $query->fetch_assoc())  {
          $tfn = strip_tags($row['firstName']);
          $tmn = strip_tags($row['middleName']);
          $tln = strip_tags($row['lastName']);
          $tnid = $row['userId'];
            echo "<option id='$tnid' value='$tnid'>".$tfn." ".$tmn." ".$tln."</option>";
        }
        echo "</select></label>";


mysqli_close($mysqli);
?>
