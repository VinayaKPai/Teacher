<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";
  $clsn = $_GET['cn'];
  echo "<p style='background-color: #C5B2B3;'>Questions for class ".$clsn."</p><hr>";

  $query = $mysqli->query("SELECT * FROM questionbank WHERE classnumber = '$clsn'");
  $rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present)
  while ($row=mysqli_fetch_assoc($query)) {
  	//fetch all columns of the query results

    $rowId = $row['Id'];	//Id of the returned row
    echo "<tr id=$rowId>";
    $rowClassNumber = $row['classNumber']	;
    echo "<td class='col-sm-1'>".$rowClassNumber."</td>";
    $rowSubject = $row['subjectName'];	//Id of the returned row
    echo "<td class='col-sm-3'>".$rowSubject."</td>";
    $rowTopic = $row['topicName'];	//Id of the returned row
    echo "<td class='col-sm-2'>".$rowTopic."</td>";
    $rowType = $row['typeName'];	//Id of the returned row
    echo "<td class='col-sm-2'>".$rowType."</td>";
    $rowQuestion = $row['question'];	//Id of the returned row
    echo "<td class='col-sm-4'>".$rowQuestion."</td>";
    echo "</tr>";

  }

  // {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
</table>
