<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>

<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	echo "<div>";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM classes_taught_by_teacher, classes, sections WHERE classes.classId = classes_taught_by_teacher.classId AND sections.sectionId = classes_taught_by_teacher.sectionId ORDER BY classes.classId");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 style='color: Green; background-color: LightGrey;'>Currently $rowcount classes</h4>" ;

				if ($rowcount > 0) {
          echo "<tr><th>S. No.</th><th>Class</th><th>Section</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['classId']);
              $ressa = $row['sectionId'];
						  $slno++;
              $cn = $rescn;
              $sa = $ressa;


						  $remIdDB = $rescn."-".$ressa;

            //  $paras = $cn.",".$sa;
              $url = "../../RemoveRecords/RemoveClass.php?cn=".$rescn."&sa=".$ressa;
						  echo "<tr>
                      <td>".$slno."</td>
                      <td><a href='#' style='color: #fff;'>".($row['classNumber'])."</a></td>
                      <td><a href='#' style='color: #fff;'>".($row['Sections'])."</a></td>
                      <td title='Delete $cn $sa from Database'>
                        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                      </td>
                    </tr>";

						}
					}
				}
			if(!$query) {
					echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
				}

	echo "</div>";
	mysqli_close($mysqli);
?>
</table>
