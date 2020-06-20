<?php
	//Script to display existing classes and sections in the class section table
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$slno = 0;
	$query = $mysqli->query("SELECT
		users.userId AS 'Id',
		users.firstName AS 'First Name',
		users.middleName AS 'Middle Name',
		users.lastName AS 'Last Name',
		classes.classId AS 'Class Id',
		classes.classNumber AS 'Class',
		sections.sectionId AS 'Sec Id',
		sections.sectionName AS 'Section',
		studentdetails.rollNumber AS 'Roll Number',
		users.Email AS 'Ext Email',
		users.systemEmail AS 'Int Email',
		users.joinYear AS 'Joined',
		users.endYear AS 'Left',
		users.phoneMobile AS 'Mobile'
		FROM
			users,
			studentdetails,
			classes,
			sections
		WHERE
			users.userId = studentdetails.userId AND
			users.role = 'S' AND
			classes.classId = studentdetails.classId AND
			sections.sectionId = studentdetails.sectionId
		ORDER BY classes.classId ASC, sections.sectionId ASC");

				table($query);
	//mysqli_close($mysqli);
?>
