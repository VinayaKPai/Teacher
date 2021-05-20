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

    while ($row = $query->fetch_assoc())  {
      {
        echo "<label for='typeName'>Question Type    <select name='typeName' id='typeName' onchange='optionsDisplay(selectedIndex)'><option></option>";
        while ($row = $query->fetch_assoc())  {
          $ty = strip_tags($row['typeName']);
          $tyid = $row['classId'];
            echo "<option id='$tyid' value='$tyid'>".$ty."</option>";
        }
        echo "</select></label>";

      }
    }

//mysqli_close($mysqli);

?>
<script>
    var chkdarr = [];
    var slno = 0;
    function optionsDisplay(dropDownId) {
      //dropdown Id 1 is MCQ
      //options input should be displayed only if the choice is MCQ ie id "1"
      var tgt = document.getElementById("options");

      // var selector = document.getElementById("typeName");
      if (dropDownId == 1) {
        tgt.style.display = "block";
      }
      else {
        tgt.style.display = "none";
      }

  }

</script>
