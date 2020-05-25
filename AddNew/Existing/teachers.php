
<hr>
<!-- <table id="existTable"> -->
	<?php
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
	// Need to integrate the following queries into $query
	//1.	Scripts/php/singleTeacherClasses.php
		//This query retrieves classes-sections-subjects for a given teacher
			 // $query = $mysqli->query("SELECT DISTINCT users.firstName, users.middleName, users.lastName, classes.classId, classes.classNumber, sections.sectionId, sections.Sections, subjects.Subject
				// FROM
				// users,
				// classes_taught_by_teacher,
				// teachers,
				// classes,
				// sections,
				// subjects
				// WHERE
				// classes_taught_by_teacher.userId = $teacherId AND
				// users.userId = classes_taught_by_teacher.userId AND
				// classes.classId = classes_taught_by_teacher.classId AND
				// sections.sectionId = classes_taught_by_teacher.sectionId AND
				// subjects.subjectId = classes_taught_by_teacher.subjectId
				// ORDER BY classes.classId ASC, sections.sectionId ASC");
	//2.	Scripts/php/exploreTeacher.php
		//This query retrieves student data for a particular class-section
			//$query = $mysqli->query("SELECT users.firstName, users.middleName, users.lastName, classes.classNumber, sections.Sections FROM users, studentdetails, classes, sections WHERE users.userId = studentdetails.userId AND studentdetails.sectionId = $sectionId AND studentdetails.classId = $classId AND studentdetails.classId = classes.classId AND studentdetails.sectionId = sections.sectionId ");
	$query = $mysqli->query("SELECT
		U.userId AS 'T Id',
		U.firstName AS 'T First Name',
		U.middleName AS 'T Middle Name',
		U.lastName AS 'T Last Name',
		U.Email AS 'T External Email',
		U.systemEmail AS 'T Internal Email',
		U.joinYear AS 'Joined',
		U.phoneMobile AS 'T Mobile',
		json_arrayagg(DISTINCT
			json_object(
				'Class Id', C.classId,
				'Class', C.classNumber,
				'Section Id', Sec.sectionId,
				'Section', Sec.Sections,
				'Subject', Sub.Subject
			)
		)	as 'Cl Sec Sub',
		json_arrayagg(DISTINCT
			json_object(
				'StuId', StDet.userId,
				'classNumber', StDet.classId,
				'sectionId', StDet.sectionId
			)
		) as 'Stu Dets'
	FROM
		users as U
	INNER JOIN classes_taught_by_teacher as CTT
		ON U.userId = CTT.userId
	INNER JOIN classes as C
		ON C.classId = CTT.classId
	INNER JOIN sections as Sec
		ON  Sec.sectionId = CTT.sectionId
	INNER JOIN subjects as Sub
		ON  Sub.subjectId = CTT.subjectId
	LEFT JOIN studentdetails as StDet
		ON  StDet.classId = C.classId
	-- LEFT JOIN studentdetails as StDet1
	-- 	ON  StDet1.classId = C.classId
	-- LEFT JOIN studentdetails as StDet2
	-- 	ON StDet2.sectionId = Sec.sectionId
	WHERE
		U.visibility = 'Y'
	AND U.role = 'T'
	AND U.userId = 4
	ORDER BY C.classId ASC, Sec.sectionId ASC");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
//OLD DISPLAY WITHOUT FUNCTIONS BEGINS. WILL BE REMOVED AFTER THE NEW ONE IS FULLY FUNCTIONAL
				if ($rowcount > 0) {
          echo "<tr><th>SNo</th><th>Name</th><th>Email</th><th>System Email</th><th>Phone</th><th>Action</th></tr>";
					while ($row = $query->fetch_assoc())  {
						{
              $rescn = strip_tags($row['T First Name']);
						  $slno++;
              $tid = $row['T Id'];
              $fn = $row['T First Name'];
              $mn = $row['T Middle Name'];
              $ln = $row['T Last Name'];

              $pm = $row['T Mobile'];
						  $remIdDB = $row['T First Name']."-".$row['T Middle Name']."-".$row['T Last Name'].$row['T Mobile'];

              $url = "../../RemoveRecords/RemoveTeacher.php?fn=".$fn."&mn=".$mn."&ln=".$ln."&pm=".$pm;
						  echo "<tr>
                      <th>".$slno."</th>
											<td><a data-toggle='modal' data-target='#teacherModal' style='color:white; cursor: pointer;' id='$tid' onclick='modalclick(this)'>".$fn." ".$mn." ".$ln."</a></td>
                      <td>".$row['T External Email']."</td>
                      <td>".$row['T Internal Email']."</td>
                      <td>".$row['T Mobile']."</td>
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
			//OLD DISPLAY WITHOUT FUNCTIONS ENDS. WILL BE REMOVED AFTER THE NEW ONE IS FULLY FUNCTIONAL
			// NEW DISPLAY USING FUNCTIONS BELOW
			table ($query);
	mysqli_close($mysqli);
?>
<!-- </table> -->
