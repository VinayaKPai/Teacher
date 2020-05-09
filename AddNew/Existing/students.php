<?php
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM users, studentdetails, classes, sections WHERE users.userId = studentdetails.userId AND users.role = 'S'
    AND classes.classId = studentdetails.classId AND sections.sectionId = studentdetails.sectionId ORDER BY classes.classId, sections.sectionId");
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
              $rescn = strip_tags($row['firstName']);
						  $slno++;
              $sid = $row['userId'];
              $fn = $row['firstName'];
              $ln = $row['lastName'];
              $cn = $row['classNumber'];
              $sa = $row['Sections'];
              $classNum = $row['classId'];
              $pm = $row['phoneMobile'];
						  $remIdDB = $row['firstName']."-".$row['lastName'].$row['phoneMobile'];

              $url = "../../RemoveRecords/RemoveStudent.php?fn=".$fn."&ln=".$ln."&pm=".$pm;

						  echo "<tr>
                      <td>".$slno."</td>
                      <td><a data-toggle='modal' data-target='#studentModal' style='color:white; cursor: pointer;' id='$sid' onclick='modalclick(this)'>".$fn." ".$ln."</a></td>
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
	mysqli_close($mysqli);
?>
