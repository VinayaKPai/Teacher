<?php
	//THIS FILE IS NO LONGER BEING USED IN THE APP
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
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
			GROUP BY U.userId
            ORDER BY U.userId ASC, CTT.classId ASC, CTT.sectionId ASC, SD.userId ASC");

			table ($query);
	mysqli_close($mysqli);
?>
<!-- </table> -->
