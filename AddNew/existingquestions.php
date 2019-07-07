<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>

<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">

	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";
//select questions to display
//Select by first class, second subject, third topic and fourth - optional, sqlite_fetch_column_types
if ($_GET) {
print_r($_GET);
$classNumber = $_GET['classNumber'];
$subjectName = $_GET['subjectName'];
$topic = $_GET['topicName'];
$typeName = $_GET['typeName'];
echo $classNumber;


$query = $mysqli->query("SELECT * FROM questionbank WHERE classNumber = '$classNumber' AND subjectName = '$subjectName' AND topic = '$topic' AND type = '$typeName'");

echo "<div>";

	$slno = 0;

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
        $border = "style='background-color: #b69092; color: #fff'";
        $border1 = "style='background-color: #684654; color: #fff'";
				echo "<h4 class='topbanner'>Currently $rowcount Questions in your setup</h4>

              <div class='col-sm-6'><small>
                <div $border>LAT = Long Answer type</div>
                <div $border1>SAT = Short Answer Type</div>
              </div>
              <div class='col-sm-6'>
                <div $border1>MCQ = Multiple Choice Questions</div>
                <div $border>VSAT = Very Short Answer Type</div>
              </small></div>" ;

				if ($rowcount > 0) {

					while ($row = $query->fetch_assoc())  {
						{
              //$rescn = strip_tags($row['firstName']);
						  $slno++;
              $cn = $row['classNumber'];
              $sn = $row['subjectName'];
              $tp = $row['topic'];
              $ty = $row['type'];
              $qn = $row['question'];
						  $remIdDB = $row['Id'];

              $url = "../../RemoveRecords/RemoveStudent.php?remIdDb=".$remIdDB;
						  echo "<tr>
                      <td>$slno</td>
                      <td>$cn</td>
                      <td>$sn</td>
                      <td>$tp</td>
											<td>$ty</td>
                      <td style='float: left;'>$qn</td>
                      <td>
                        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                      </td>
                    </tr>";

						}
					}

				}
      }
			if(!$query) {
					echo "Looks like your set up has not been started. Please add existingquestions to the database, so that you can get the benefit of all the features of the App";
				}

	echo "</div>";
  {header('Location: ../SetUpPages/newQuestions.php');}
	// mysqli_close($mysqli);
?>
</table>
