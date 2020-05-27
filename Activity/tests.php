<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/header.php" ;
				include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
				include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
				$a = "T";
	?>
</head>
<body class="body">
	<div class="container">
		<div class="right-align">
					<?php
						echo $datetime1; ?>
		</div>
	<hr>
		<?php
			$pageHeading = "Tests";
			$pageHeadSingular = "Test";
			include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
			if ($_GET){echo $_GET;}
			include $_SERVER['DOCUMENT_ROOT']."/Components/activitiesLinks.php";
		?>
	 <a href="../../SetUpPages/newQuestions.php">
		 <h4 class="btn btn-block topbanner">Create A New Assessment
			 <small style="padding: 10px; color: White;">This will take you to the question bank</small>
		 </h4>
		 Note: This will only create an assessment. To schedule a deployment, you'll need to come back here and deploy it.
	 </a>


	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 		$b = "completed";
	 	 		activity($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 		$b = "ongoing";
	 	 		activity($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 			$b = "undeployed";
	 	 			activity($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 		$b = "all";
	 	 		activity($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>


 </div> <!-- container div immediately inside body -->
</body>
</html>
<?php
// get Teacher-class-section-Subject
"SELECT
	DISTINCT
		users.firstName,
		users.middleName,
		users.lastName,
		classes.classId,
		classes.classNumber,
		sections.sectionId,
		sections.Sections,
		subjects.Subject
 FROM
 users,
 classes_taught_by_teacher,
 classes,
 sections,
 subjects
 WHERE
 classes_taught_by_teacher.userId = $teacherId AND
 users.userId = classes_taught_by_teacher.userId AND
 classes.classId = classes_taught_by_teacher.classId AND
 sections.sectionId = classes_taught_by_teacher.sectionId AND
 subjects.subjectId = classes_taught_by_teacher.subjectId
 ORDER BY classes.classId ASC, sections.sectionId ASC");

//to get appropriate student details
"SELECT
	users.firstName,
	users.middleName,
	users.lastName,
	classes.classNumber,
	sections.Sections
	FROM
		users,
		studentdetails,
		classes,
		sections
	WHERE
		users.userId = studentdetails.userId AND
		studentdetails.sectionId = $sectionId AND
		studentdetails.classId = $classId AND
		studentdetails.classId = classes.classId AND
		studentdetails.sectionId = sections.sectionId "


"SELECT
		userId AS 'Id',
		firstName AS 'First Name',
		middleName AS 'Middle Name',
		lastName AS 'Last Name',
		Email AS 'External Email',
		systemEmail AS 'Internal Email',
		joinYear AS 'Joined',
		phoneMobile AS 'Mobile'
	FROM users
	WHERE `visibility` = 'Y'
	AND `role` = 'T'"

users, studentdetails, classes, sections
users, classes_taught_by_teacher, teachers, classes, sections, subjects

//ABOVE ARE THE THREE WORKING QUERIES
//BELOW are the merged queries which seem to give the correct data but display is screwed
SELECT DISTINCT
				U.userId AS 'T Id',
				U.firstName AS 'T First Name',
				U.middleName AS 'T Middle Name',
				U.lastName AS 'T Last Name',
				U.Email AS 'T External Email',
				U.systemEmail AS 'T Internal Email',
				U.phoneMobile AS 'T Mobile',
				U.visibility AS 'Current',
			json_arrayagg(DISTINCT json_object(
				'Sub Id', Sub.subjectId,
				'Class Id',CTT.classId,
				'Sec Id', Sec.sectionId
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
            ORDER BY U.userId, CTT.classId, CTT.sectionId, SD.userId

?>
