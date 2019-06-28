<style>
 table tr:nth-child(even){background-color: ##9B797B;}
 table tr:nth-child(odd){background-color: #C5B2B3;}
 table td {text-align: center;}
</style>

<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing classes and sections in the class section table
	include "../basecode-create_connection.php";

	echo "<div>";

	$slno = 0;
	$query = $mysqli->query("SELECT * FROM studentdetails");
//`Id``firstName``lastName``rollNumber``classNumber``sectionAlpha``email``pw``joinYear``endYear``phoneMobile`
				if ($query) {
					$rowcount=mysqli_num_rows($query);
				}
				echo "<h4 class='topbanner'>Currently $rowcount Students in your setup</h4>" ;

				if ($rowcount > 0) {

					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['firstName']);
						  $slno++;
              $fn = $row['firstName'];
              $ln = $row['lastName'];
							$cn = $row['classNumber'];
							$sa = $row['sectionAlpha'];

						  $remIdDB = $row['firstName']."-".$row['lastName'];

            //  $paras = $fn.",".$ln;
              $url = "../../RemoveRecords/RemoveClass.php?cn=".$fn."&sa=".$ln;
						  echo "<tr>
                      <td>".$slno."</td>
                      <td>".($row['firstName'])."</td>
                      <td>".($row['lastName'])."</td>
											<td>".$cn."</td>
                      <td>".$sa."</td>
                      <td>
                        <a id=$remIdDB name=$remIdDB  href='$url'>REMOVE</a>
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
