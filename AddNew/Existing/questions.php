<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


<?php
//Script to display existing classes and sections in the class section table
    include "../basecode-create_connection.php";
     if ($cln == "all") {
       $query = $mysqli->query("SELECT * FROM questionbank");
       $txt = "ALL classes.";
       $msg = "any class";
     }

    else {
      $query = $mysqli->query("SELECT * FROM questionbank WHERE classnumber = '$cln'");
      $txt = "Class ".$cln;
      $msg = "Class ".$cln;
    }

    echo "<h5 class='centered'>Questions for ".$txt."</h5>";  //comes from the choice made on index.php Questions button drop down

    $rowcount=mysqli_num_rows($query); //number of results returned by the query - 0 (if not present)
      if ($rowcount == 0) {echo "<h6 style='color: Red;'>You do not have any questions for ".$msg."</h6><a href='/index.php'>Back</a>";}

    while ($row=mysqli_fetch_assoc($query)) {
    //fetch all columns of the query results

          $rowId = $row['Id'];	//Id of the returned row
          echo "<tr id=$rowId>";
          $rowClassNumber = $row['classNumber']	;
          echo "<td class='col-sm-1'>".$rowClassNumber."</td>";
          $rowSubject = $row['subjectName'];
          echo "<td class='col-sm-3'>".$rowSubject."</td>";
          $rowTopic = $row['topicName'];
          echo "<td class='col-sm-2'>".$rowTopic."</td>";
          $rowType = $row['typeName'];
          echo "<td class='col-sm-2'>".$rowType."</td>";
          $rowQuestion = $row['question'];
          echo "<td class='col-sm-4'>".$rowQuestion."</td>";
          echo "</tr>";
        }



  // {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
</table>
