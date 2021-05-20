<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT * FROM topics");

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
        // {
        // $tn = strip_tags($row['topicName']);
        // $tnid = $row['topicId'];
        //   echo "<option id='$tnid' name='$tn'>$tn</option>";
        // }
        echo "<label for='topicName'>Topic     <select name='topicName' id='topicName'><option></option>";
        while ($row = $query->fetch_assoc())  {
          $tn = strip_tags($row['topicName']);
          $tnid = $row['topicId'];
            echo "<option id='$tnid' value='$tnid'>".$tn."</option>";
        }
        echo "</select></label>";

      }

//mysqli_close($mysqli);
?>
