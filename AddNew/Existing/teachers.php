
<hr>
<table id="existTable">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM teachers WHERE `tc_visibility` = 'Y'");
				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 class='topbanner'>Currently $rowcount Teachers in your setup</h4>" ;

				if ($rowcount > 0) {
          echo "<tr><th>SNo</th><th>Name</th><th>Email</th><th>System Email</th><th>Phone</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['tc_firstName']);
						  $slno++;
              $tid = $row['teacherId'];
              $fn = $row['tc_firstName'];
              $mn = $row['tc_middleName'];
              $ln = $row['tc_lastName'];

              $pm = $row['tc_phoneNumber'];
						  $remIdDB = $row['tc_firstName']."-".$row['tc_middleName']."-".$row['tc_lastName'].$row['tc_phoneNumber'];

              $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;
						  echo "<tr>
                      <th>".$slno."</th>
											<td><a data-toggle='modal' data-target='#teacherModal' style='color:white; cursor: pointer;' id='$tid' onclick='modalclick(this)'>".$fn." ".$mn." ".$ln."</a></td>
                      <td>".$row['tc_Email']."</td>
                      <td>".$row['tc_systemEmail']."</td>
                      <td>".$row['tc_phoneNumber']."</td>
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

	
	mysqli_close($mysqli);
?>
</table>
