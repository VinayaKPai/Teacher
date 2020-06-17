<?php

	include "basecode-create_connection.php";
	include "../Scripts/php/sqlQueryResultToOptions.php";
echo "<div>";
$rwcnt = 0;


$query = $mysqli->query("SELECT * FROM topics ORDER BY `classId`");

			if ($query) {
				$rowcount=mysqli_num_rows($query);
			}
			if ($rowcount > 0) {
				echo "<h4 style='color: Green; background-color: LightGrey;'>Click on a topic to see questions</h4>" ;
				// echo "<table style='width: 60%;border: 1px solid Grey'>
						echo "<tr>
							<th style='width: 10%; margin: 5%;'>S. No</th>
							<th style='width: 10%; margin: 5%;'>Class</th>
							<th style='width: 10%; margin: 5%;'>Subject</th>
							<th style='width: 25%; margin: 5%;'>Topic</th>
							<th style='width: 15%; margin: 5%;'>Action</th>
						</tr>";
				while ($row = $query->fetch_assoc())  {
					$rwcnt = $rwcnt+1;

					$classNum = $row['classId'];
					$clnum = $mysqli->query("SELECT `classNumber` FROM classes WHERE `classId` = $classNum LIMIT 1");
					$clrow = $clnum->fetch_assoc();
					$cn = $clrow['classNumber'];

					$subjectName = $row['subjectId'];
					$subn = $mysqli->query("SELECT `Subject` FROM subjects WHERE `subjectId` = $subjectName LIMIT 1");
					$srow = $subn->fetch_assoc();
					$sb = $srow['Subject'];
					echo "<tr id=$rwcnt title=$rwcnt>
							<td style='width: 10%; margin: 5%;'>".$rwcnt."</td>
							<td style='width: 10%; margin: 5%;'>".$cn."</td>
							<td style='width: 10%; margin: 5%;'>".$sb."</td>
							<td style='width: 25%; margin: 5%;'>".$row['topicName']."</td>
							<td title='Delete this topic from Database'>
							<span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></td>
						</tr>";

				}
				// echo "</table>";
			}

			if(!$query) {
				echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
			}
echo "</div>";


//mysqli_close($mysqli);
?>
