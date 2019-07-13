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
	$query = $mysqli->query("SELECT * FROM classsections");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
				echo "<h4 style='color: Green; background-color: LightGrey;'>Currently $rowcount classes</h4>" ;

				if ($rowcount > 0) {

					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['classNumber']);
						  $slno++;
              $cn = $row['classNumber'];
              $sa = $row['sectionAlpha'];


						  $remIdDB = $row['classNumber']."-".$row['sectionAlpha'];

            //  $paras = $cn.",".$sa;
              $url = "../../RemoveRecords/RemoveClass.php?cn=".$cn."&sa=".$sa;
						  echo "<tr>
                      <td>".$slno."</td>
                      <td>".($row['classNumber'])."</td>
                      <td>".($row['sectionAlpha'])."</td>
                      <td>
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