
<hr>
<!-- <table id="existTable"> -->
	<?php
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
	$query = $mysqli->query("SELECT userId AS 'Id',
				firstName AS 'First Name',
				middleName AS 'Middle Name',
				lastName AS 'Last Name',
				Email AS 'External Email',
				systemEmail AS 'Internal Email',
				joinYear AS 'Joined',
				phoneMobile AS 'Mobile' 
				FROM users
				WHERE `visibility` = 'Y'
				AND `role` = 'T'");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}

				if ($rowcount > 0) {
          echo "<tr><th>SNo</th><th>Name</th><th>Email</th><th>System Email</th><th>Phone</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['First Name']);
						  $slno++;
              $tid = $row['Id'];
              $fn = $row['First Name'];
              $mn = $row['Middle Name'];
              $ln = $row['Last Name'];

              $pm = $row['Mobile'];
						  $remIdDB = $row['First Name']."-".$row['Middle Name']."-".$row['Last Name'].$row['Mobile'];

              $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;
						  echo "<tr>
                      <th>".$slno."</th>
											<td><a data-toggle='modal' data-target='#teacherModal' style='color:white; cursor: pointer;' id='$tid' onclick='modalclick(this)'>".$fn." ".$mn." ".$ln."</a></td>
                      <td>".$row['External Email']."</td>
                      <td>".$row['Internal Email']."</td>
                      <td>".$row['Mobile']."</td>
                      <td>
                        <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                      </td>
                    </tr>";

						}
					}

				}
			// if(!$query) {
			//
					else {echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";}
			// 	}
echo "<hr>";
table ($query);
	mysqli_close($mysqli);
?>
<!-- </table> -->
