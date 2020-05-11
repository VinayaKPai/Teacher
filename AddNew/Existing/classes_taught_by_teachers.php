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
  // $num = 0;
	$query = $mysqli->query("SELECT users.userId, users.firstName, users.middleName, users.lastName, classes.classNumber, sections.Sections, subjects.Subject
            FROM users, classes_taught_by_teacher, classes, sections, subjects
            WHERE users.userId = classes_taught_by_teacher.userId AND classes.classId = classes_taught_by_teacher.classId AND sections.sectionId = classes_taught_by_teacher.sectionId AND classes_taught_by_teacher.subjectId = subjects.subjectId ORDER BY classes.classId ASC, sections.Sections ASC,  subjects.Subject ASC ");
				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green; background-color: LightGrey;'";
					}
					else { $cls = "'color: Red; background-color: LightGrey;'";}
				}
				echo "<h4 style=$cls>Currently $rowcount classes</h4>" ;

				if ($rowcount > 0) {
					while ($row = $query->fetch_assoc())  {

            // echo "<tr title=".($row['firstName'])." ".$row['middleName']." ".$row['lastName']."><td colspan=5 style='background-color: #fffff9;'>Teacher: <a href='#' style='color: #009;'>".($row['firstName'])." ".$row['middleName']." ".$row['lastName']."</a></td></tr>";


                      $rescn = strip_tags($row['classNumber']);
                      $ressa = $row['Sections'];
        						  $slno++;
                      $cn = $rescn;
                      $sa = $ressa;

        						  $remIdDB = $rescn."-".$ressa;

                    //  $paras = $cn.",".$sa;
                      $url = "../../RemoveRecords/RemoveClass.php?cn=".$rescn."&sa=".$ressa;
        						  echo "<tr id=trname".$row['userId']." title=".$row['firstName'].$row['middleName'].$row['lastName'].">
                              <td>".$slno."</td>
                              <td>".$row['firstName']." ".$row['middleName']." ".$row['lastName']."</td>

                              <td><a href='#' style='color: #fff;'>".$row['classNumber']."</a>-<a href='#' style='color: #fff;'>".$row['Sections']."</a></td>
                              <td><a href='#' style='color: #fff;'>".($row['Subject'])."</a></td>
                              <td title='Delete $cn $sa from Database'>
                                <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
                              </td>
                            </tr>";

						}
					}

			if(!$query) {
					echo "Looks like your set up has not been started. Please add the classes and sections you are teaching to the database, so that you can get the benefit of all the features of the App";
				}

	echo "</div>";
	mysqli_close($mysqli);
?>
</table>
