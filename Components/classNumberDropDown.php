<?php
  	include "../basecode-create_connection.php";
    // echo $datetime1;
    // $displayType = $_GET['displayType'];
    // $displayType = "dropdown";
if (!isset($displayType)) {
  $displayType = "checkbox";
}


  	$query = $mysqli->query("SELECT * FROM classes ORDER BY `Id` ASC");

    //catch errors
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }

    if ($query) {
      $rowcount=mysqli_num_rows($query);
    }
    else {echo "KUCHHH TO GADBAD HAI!";};



      if ($displayType=="checkbox"){
        while ($row = $query->fetch_assoc())  {
          {
            $cn = strip_tags($row['classNumber']);
            $cn = strip_tags($row['Id']);
            echo "<label for='$cn'><input id='$cn' type='checkbox' name='classNumber[$cn]' aria-label='$cn' style='margin: 10px;' onclick='updateFilters(\"classSelectBoxes\",\"filteredClasses\");' value='$cn'>$cn</label>";
          }
        }
      }
      if ($displayType=="dropdown"){
        echo "<label for='Class_Number'>Class/STD   <select name='Class_Number' id='Class_Number'><option></option>";
        while ($row = $query->fetch_assoc())  {
          $cn = strip_tags($row['classNumber']);
          $cnid = $row['Id'];
            echo "<option id='$cnid' value='$cnid'>".$cn."</option>";
        }
        echo "</select></label>";
      }

mysqli_close($mysqli);
?>
