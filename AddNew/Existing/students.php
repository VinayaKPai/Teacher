<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
 table a:hover {color: White; background-color: #cfabab;}
</style>
<hr>
<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	// echo "<div>";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM studentdetails, classes, sections WHERE classes.classId = studentdetails.st_classId AND sections.sectionId = studentdetails.st_sectionId ORDER BY classes.classId, sections.sectionId");
				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 class='topbanner'>Currently $rowcount Students in your setup.</h4>" ;

				if ($rowcount > 0) {
          echo "<tr><th>SNo</th><th>Name</th><th>Class/STD</th><th>Section</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['st_firstName']);
						  $slno++;
              $sid = $row['sId'];
              $fn = $row['st_firstName'];
              $ln = $row['st_lastName'];
              $cn = $row['classNumber'];
              $sa = $row['Sections'];
              $classNum = $row['st_classId'];
              $pm = $row['st_phoneMobile'];
						  $remIdDB = $row['st_firstName']."-".$row['st_lastName'].$row['st_phoneMobile'];

              $url = "../../RemoveRecords/RemoveStudent.php?fn=".$fn."&ln=".$ln."&pm=".$pm;
              // <td><a data-toggle='modal' data-target='#studentModal' style='color:white; cursor: pointer;' id='$sid' onclick='modalclick(this)'>".$fn." ".$ln."</a></td>
						  echo "<tr>
                      <td>".$slno."</td>
                      <td><a data-toggle='modal' data-target='#studentModal' style='color:white; cursor: pointer;' id='$sid' onclick='ajaxCallStudents(this.id)'>".$fn." ".$ln."</a></td>
                      <td>".$cn."</td>
                      <td>".$sa."</td>
                      <td>
                        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                      </td>
                    </tr>";
						}
					}

				}
			if(!$query) {
					echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";
				}

	// echo "</div>";
	mysqli_close($mysqli);
?>
</table>
