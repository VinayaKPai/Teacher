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
("SELECT
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
		studentdetails.sectionId = sections.sectionId ");


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
	AND `role` = 'T'");

users, studentdetails, classes, sections
users, classes_taught_by_teacher, teachers, classes, sections, subjects

//ABOVE ARE THE THREE WORKING QUERIES

"SELECT
	U.userId AS 'T Id',
	U.firstName AS 'T First Name',
	U.middleName AS 'T Middle Name',
	U.lastName AS 'T Last Name',
	U.Email AS 'T External Email',
	U.systemEmail AS 'T Internal Email',
	U.joinYear AS 'Joined',
	U.phoneMobile AS 'T Mobile',
	json_arrayagg(
		json_object(
			'Class Id', C.classId,
			'Class', C.classNumber,
			'Section Id', Sec.sectionId,
			'Section', Sec.Sections,
			'Subject', Sub.Subject,
			'StuId', StDet.userId
		)
	)	as 'Cl Sec Sub',
	json_arrayagg(
		json_object(
			'StuId', StDet.userId,
			'S Class', StDet.classId,
			'S Sec', StDet.sectionId
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
	ON  StDet.classId = CTT.classId
WHERE
	U.role = 'T'
And U.visibility = 'Y'
AND CTT.classId = StDet.classId
ORDER BY C.classId ASC, Sec.sectionId ASC"



[
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 64},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 64},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 67},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 1, "Section": "A", "Subject": "Social Studies", "StuId": 68},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 1, "Section": "A", "Subject": "Science", "StuId": 67},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 1, "Section": "A", "Subject": "English", "StuId": 64},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 64},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 67},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 68},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 2, "Section": "B", "Subject": "Science", "StuId": 67},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English", "StuId": 64},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 52},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 49},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 47},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 46},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 10},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 12},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 17},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 18},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 22},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 21},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 23},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 25},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 29},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 35},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 36},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 38},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 40},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 42},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 43},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 61},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 62},
	{"Class Id": 9, "Class": "IX", "Section Id": 2, "Section": "B", "Subject": "Social Studies", "StuId": 69},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "English", "StuId": 68},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 64},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 52},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 49},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 47},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 46},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 10},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 12},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 17},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 18},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 22},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 21},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 23},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 25},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 29},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 35},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 36},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 38},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 40},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 42},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 43},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 61},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 62},
	{"Class Id": 9, "Class": "IX", "Section Id": 3, "Section": "C", "Subject": "Science", "StuId": 69},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 3, "Section": "C", "Subject": "Social Studies", "StuId": 68},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 4, "Section": "D", "Subject": "English", "StuId": 68},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 52},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 49},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 47},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 46},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 10},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 12},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 17},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 18},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 22},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 21},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 23},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 25},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 29},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 35},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 36},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 38},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 40},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 42},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 43},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 61},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 62},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies", "StuId": 69},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 4, "Section": "D", "Subject": "Science", "StuId": 67},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 53},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 11},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 13},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 27},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 28},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 41},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 63},
	{"Class Id": 1, "Class": "I", "Section Id": 5, "Section": "E", "Subject": "English", "StuId": 64},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 67},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 5, "Section": "E", "Subject": "Science", "StuId": 68},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 52},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 49},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 47},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 46},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 10},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 12},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 17},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 18},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 22},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 21},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 23},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 25},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 29},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 35},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 36},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 38},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 40},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 42},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 43},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 61},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 62},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 69},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 50},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 54},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 32},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 33},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 48},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 31},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 9},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 19},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 20},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 30},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 39},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 44},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 45},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 56},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 57},
	{"Class Id": 8, "Class": "VIII", "Section Id": 6, "Section": "F", "Subject": "Social Studies", "StuId": 68},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 55},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 34},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 14},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 15},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 16},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 24},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 26},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 37},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 58},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 59},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 60},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 70},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 65},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 66},
	{"Class Id": 2, "Class": "II", "Section Id": 6, "Section": "F", "Subject": "English", "StuId": 67}
]

?>
