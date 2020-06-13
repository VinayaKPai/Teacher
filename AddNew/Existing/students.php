<?php
	//TRANSFERRED THE CODE TO ALLQUERIES.PHP
	//THIS FILE IS NOT IN USE ANY MORE
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
	$query = $mysqli->query("SELECT DISTINCT
			C.classId AS 'C Id',
			C.classNumber AS 'Class / Std',
				json_arrayagg(DISTINCT json_object(
					'SD C Id', SD.classId,
					'Stu Sec name', Sec.Sections,
					'SD sectionId', SD.sectionId
				) ) as 'Sections',
				json_arrayagg(DISTINCT json_object(
					'Stu C Id', SD.classId,
					'Stu sectionId', SD.sectionId,
					'Stu Id', SD.userId,
					'Stu RN', SD.rollNumber,
					'S First Name', U.firstName,
					'S Middle Name', U.middleName,
					'S Last Name', U.lastName
				) ) as 'Students',
				COUNT(SD.userId) AS 'Count'
			FROM
				classes as C
			INNER JOIN studentDetails AS SD
				ON SD.classId = C.classId
			LEFT JOIN sections AS Sec
				ON Sec.sectionId = SD.sectionId
			INNER JOIN users as U
				ON U.userId = SD.userId

			Group BY C.classId
		");

				stuDiv($query);
	// //mysqli_close($mysqli);
?>
