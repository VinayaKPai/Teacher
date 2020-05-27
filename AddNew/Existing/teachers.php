
<hr>
<!-- <table id="existTable"> -->
	<?php
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;

	// 			if ($query) {
	// 				$rowcount=mysqli_num_rows($query);
  //         if ($rowcount > 0) {
	// 					$cls = "'color: Green;'";
	// 				}
	// 				else { $cls = "'color: Red;'";}
	// 			}
	$query = $mysqli->query("SELECT DISTINCT
				U.userId AS 'T Id',
				U.firstName AS 'T First Name',
				U.middleName AS 'T Middle Name',
				U.lastName AS 'T Last Name',
				U.Email AS 'T External Email',
				U.systemEmail AS 'T Internal Email',
				U.phoneMobile AS 'T Mobile',
				U.visibility AS 'Current',
			json_arrayagg(DISTINCT json_object(
				'Class Id',CTT.classId,
				'Sec Id', Sec.sectionId,
				'Sub Id', Sub.subjectId
			) ) as 'Subjects',
			json_arrayagg(DISTINCT json_object(
				'C Id', SD.classId,
				'sectionId', SD.sectionId,
				'Stu Id', SD.userId
			) ) as 'Students'
			FROM
				users AS U
					INNER JOIN classes_taught_by_teacher AS CTT
						on CTT.userId = U.userId
					INNER JOIN subjects AS Sub
						on Sub.subjectId = CTT.subjectId
					LEFT JOIN sections as Sec
						on Sec.sectionId= CTT.sectionId
					LEFT JOIN studentDetails as SD
						on SD.classId = CTT.classId
					-- LEFT JOIN classes as C1 on C1.classId = CTT.classId
			GROUP BY U.userId
            ORDER BY U.userId ASC, CTT.classId ASC, CTT.sectionId ASC, SD.userId ASC");
//OLD DISPLAY WITHOUT FUNCTIONS BEGINS. WILL BE REMOVED AFTER THE NEW ONE IS FULLY FUNCTIONAL
// $rowcount = mysqli_num_rows($query);
// 				if ($rowcount > 0) {
//           echo "<tr><th>SNo</th><th>Name</th><th>Email</th><th>System Email</th><th>Phone</th><th>Action</th></tr>";
// 					while ($row = $query->fetch_assoc())  {
// 						{
//               $rescn = strip_tags($row['T First Name']);
// 						  $slno++;
//               $tid = $row['T Id'];
//               $fn = $row['T First Name'];
//               $mn = $row['T Middle Name'];
//               $ln = $row['T Last Name'];
//
//               $pm = $row['T Mobile'];
// 						  $remIdDB = $row['T First Name']."-".$row['T Middle Name']."-".$row['T Last Name'].$row['T Mobile'];
//
//               $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;
// 						  echo "<tr>
//                       <th>".$slno."</th>
// 											<td><a data-toggle='modal' data-target='#teacherModal' style='color:white; cursor: pointer;' id='$tid' onclick='modalclick(this)'>".$fn." ".$mn." ".$ln."</a></td>
//                       <td>".$row['T External Email']."</td>
//                       <td>".$row['T Internal Email']."</td>
//                       <td>".$row['T Mobile']."</td>
//                       <td>
//                         <a id=$remIdDB name=$remIdDB  href='$url'><span class='glyphicon glyphicon-trash' style='background-color: Red; color: White; padding: 4px;'></span></a>
//                       </td>
//                     </tr>";
//
// 						}
// 					}
//
// 				}
// 			// if(!$query) {
// 			//
// 					else {echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";}
				// }
			//OLD DISPLAY WITHOUT FUNCTIONS ENDS. WILL BE REMOVED AFTER THE NEW ONE IS FULLY FUNCTIONAL
			// NEW DISPLAY USING FUNCTIONS BELOW
			table ($query);
	mysqli_close($mysqli);
?>
<!-- </table> -->
