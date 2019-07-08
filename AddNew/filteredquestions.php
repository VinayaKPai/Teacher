<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


	<?php
  $classNumber = $_POST['classNumberDG'];
    $subjectName = $_POST['$subjectNameDG'];
      $topicName = $_POST['$topicNameDG'];
        $typeName = $_POST['$typeNameDG'];
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

$query = $mysqli->query("SELECT * FROM questionbank WHERE classNumber = $classNumber AND subjectName = $subjectName AND topicName = $topicName AND typeName = $typeName");
//$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present)
echo "<table>";
while ($row=mysqli_fetch_assoc($query)) {
	//fetch all columns of the query results

  $rowId = $row['Id'];	//Id of the returned row
  echo "<tr>";
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
echo "</table>";
  // {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
</table>
