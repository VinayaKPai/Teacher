<?php
  	include "../basecode-create_connection.php";

  	$query = $mysqli->query("SELECT DISTINCT topicName FROM topics");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};



      echo "Topic : <select name='topicName' id='topicName' name='topicName' required><option id='blanktopicName></option>'";
      while ($row = $query->fetch_assoc())  {
        {
          $tn = strip_tags($row['topicName']);

          echo "<option>$tn</option>";

        }
      }
      echo "</select>";

?>
