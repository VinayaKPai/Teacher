<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	echo "<div>";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM classes_taught_by_teacher ORDER BY `classId`");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
					if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 style='color: Green; background-color: LightGrey;'>Currently <span style=$cls>$rowcount</span> Subjects </h4>" ;

				if ($rowcount > 0) {
          echo "<tr><th>S. No</th><th>Class</th><th>Section</th><th>Subject</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['classId']);
						  $slno++;

              $classNum = $row['classId'];
              $clnum = $mysqli->query("SELECT `classNumber` FROM classes WHERE `classId` = $classNum LIMIT 1");
              $clrow = $clnum->fetch_assoc();
              $cn = $clrow['classNumber'];

              $sectionAplha = $row['sectionId'];
              $secAlph = $mysqli->query("SELECT `sectionName` FROM sections WHERE `sectionId` = $sectionAplha LIMIT 1");
              $sarow = $secAlph->fetch_assoc();
              $sa = $sarow['sectionName'];

              $subjectName = $row['subjectId'];
              $subn = $mysqli->query("SELECT `subjectName` FROM subjects WHERE `subjectId` = $subjectName LIMIT 1");
              $srow = $subn->fetch_assoc();
							$sb = $srow['subjectName'];

						  $remIdDB = $sb.$cn.$sa;

              $url = "../../RemoveRecords/RemoveSubject.php?cn=".$cn."&sa=".$sa."&sb=".$sb;
						  echo "<tr>
                      <td>".$slno."</td>
                      <td>".$cn."</td>
                      <td>".$sa."</td>
											<td><a href='#' style='color: #fff;'>$sb</a></td>
                      <td title='Delete $cn $sa $sb from Database'>
                        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                      </td>
                    </tr>";

						}
					}

				}
			else {
					echo "<p style='color: Maroon;'>Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App</p>";
				}

	echo "</div>";
	// //mysqli_close($mysqli);
?>
</table>
