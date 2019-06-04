<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	echo "<div>";

	$rwcnt = 0;
	$query = $mysqli->query("SELECT * FROM classsections");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
				}
				echo "<h4 style='color: Green; background-color: LightGrey;'>Currently $rowcount classes</h4>" ;

				if ($rowcount > 0) {
					echo "<table style='width: 100%;'>";
					while ($row = $query->fetch_assoc())  {
						$rwcnt = $rwcnt+1;
						$rwclr = $rwcnt % 2;
						$remId = "rem".$row['classNumber'].$row['sectionAlpha'];
						$remIdDB = $row['Id'];
						if ($rwclr == 0) {
							$class = "background-color: #f2f2f2;";
							}
							else {
							$class = "background-color: #cccccc;";
							}
						echo "<tr id=$rwcnt title=$rwcnt>
							<td style='width: 10%; margin: 5%; $class;'>".$rwcnt."</td>
							<td style='width: 10%; margin: 5%; $class;'>".$row['classNumber']." - ".$row['sectionAlpha']."</td>
							<td style='width: 10%; margin: 5%; $class;'><form action='../RemoveRecords/RemoveClass.php' method='POST'><button type='submit' id=$remId name=$remId value=$remIdDB>REMOVE</button></td>
							</tr>";
					}
					echo "</table>";
				}
			if(!$query) {
					echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
				}

	echo "</div>";
	mysqli_close($mysqli);
?>
