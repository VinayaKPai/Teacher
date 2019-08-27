<?php
  	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    // echo $datetime1;
    // $displayType = $_GET['displayType'];
    // $displayType = "dropdown";
if (!isset($displayType)) {
  $displayType = "checkbox";
}


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



     if ($displayType=="checkbox"){

 while ($row = $query->fetch_assoc())  {
        {
          $sn = strip_tags($row['Subject']);
          echo "<label for='$sn'><input id='$sn' type='checkbox' name='subjectName[$sn]' aria-label='$sn' style='margin: 10px;' onclick='updateFilters(\"subjectSelectBoxes\",\"filteredSubjects\");' value='$sn'>$sn</label>";        }
      }
        }

      if ($displayType=="dropdown"){
        echo "<label for='subjectName'>Subject <select name='subjectName' id='subjectName'><option></option>";
        while ($row = $query->fetch_assoc())  {
          $sn = strip_tags($row['Subject']);
          $snid = $row['Id'];
            echo "<option id='$snid' value='$snid'>".$sn."</option>";
        }
        echo "</select></label>";
      }

mysqli_close($mysqli);
?>
