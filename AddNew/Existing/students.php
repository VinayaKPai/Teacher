<style>
 table tr:nth-child(even){background-color: #b69092; color: #fff}
 table tr:nth-child(odd){background-color: #684654; color: #fff}
 table td {text-align: center;}
</style>
<hr>
<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	echo "<div>";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM studentdetails");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 class='topbanner'>Currently $rowcount Students in your setup</h4>" ;

				if ($rowcount > 0) {

					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['firstName']);
						  $slno++;
              $fn = $row['firstName'];
              $ln = $row['lastName'];
              $pm = $row['phoneMobile'];
						  $remIdDB = $row['firstName']."-".$row['lastName'].$row['phoneMobile'];

              $url = "../../RemoveRecords/RemoveStudent.php?fn=".$fn."&ln=".$ln."&pm=".$pm;
						  echo "<tr>
                      <td>".$slno."</td>
                      <td>".($row['firstName'])."</td>
                      <td>".($row['lastName'])."</td>
											<td>".$fn."</td>
                      <td>".$ln."</td>
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

	echo "</div>";
	mysqli_close($mysqli);
?>
</table>
