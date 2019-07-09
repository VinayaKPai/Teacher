<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>


	<?php

  $classNumberDG = $_POST['clNameDG'];
    $subjectNameDG = $_POST['subNameDG'];
      $topicNameDG = $_POST['toNameDG'];
        $typeNameDG = $_POST['tyNameDG'];

  // $classNumber = $_POST['clName'];
  //   $subjectName = $_POST['subName'];
  //     $topicName = $_POST['toName'];
  //       $typeName = $_POST['tyName'];
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";
//
$query = $mysqli->query("SELECT * FROM questionbank");
//$rowcount=mysqli_num_rows($query); //number of results returned by the query - either 0 (if not present)
echo "<table> <h4>Class ".$classNumberDG." ".$subjectNameDG." ".$topicNameDG." available ".$typeNameDG." questions</h4>";
while ($row=mysqli_fetch_assoc($query)) {
	//fetch all columns of the query results
	if ($row['classNumber'] == $classNumberDG && $row['subjectName'] == $subjectNameDG && $row['topicName'] == $topicNameDG && $row['typeName'] == $typeNameDG)
    {
      $rowId = $row['Id'];	//Id of the returned row
      echo "<tr>";
      echo "<td class='col-sm-4'>".$row['typeName']."</td>";
      echo "<td class='col-sm-8'>".$row['question']."</td>";
      echo "</tr>";
    }
}
echo "</table>";
  {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
</table>
