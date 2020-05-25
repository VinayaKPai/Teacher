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
// $query = $mysqli->query(
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

"SELECT
		users.userId AS 'Id',
		firstName AS 'First Name',
		middleName AS 'Middle Name',
		lastName AS 'Last Name',
		Email AS 'External Email',
		systemEmail AS 'Internal Email',
		joinYear AS 'Joined',
		phoneMobile AS 'Mobile',
		CONCAT('[',json_arrayagg(
			json_object(
				'Class Id', classes.classId,
				'Class', classes.classNumber,
				'Section Id', sections.sectionId,
				'Section', sections.Sections,
				'Subject', subjects.Subject
			)
		),']') as 'Cl Sec Sub'
		CONCAT('[',json_arrayagg(
			json_object(
				'S First Name', users.firstName,
				'S First Name', users.middleName,
				'S First Name', users.lastName,
				'S Class Number', classes.classNumber,
				'S Section', sections.Sections
			)
		),']') as 'Stu Dets'
FROM
	users,
	classes_taught_by_teacher,
	classes,
	sections,
	subjects
	studentdetails,
WHERE
		users.visibility = 'Y'
AND users.role = 'T'
-- AND classes_taught_by_teacher.userId = $teacherId
-- AND users.userId = classes_taught_by_teacher.userId
-- AND classes.classId = classes_taught_by_teacher.classId
-- AND sections.sectionId = classes_taught_by_teacher.sectionId
-- AND subjects.subjectId = classes_taught_by_teacher.subjectId
-- AND users.userId = studentdetails.userId
-- AND studentdetails.sectionId = $sectionId
-- AND studentdetails.classId = $classId
-- AND studentdetails.classId = classes.classId
-- AND studentdetails.sectionId = sections.sectionId

AND classes_taught_by_teacher.userId = $teacherId

-- AND users.userId = classes_taught_by_teacher.userId
INNER JOIN  ON users.userId = classes_taught_by_teacher.userId
-- AND classes.classId = classes_taught_by_teacher.classId
INNER JOIN  ON classes.classId = classes_taught_by_teacher.classId
-- AND sections.sectionId = classes_taught_by_teacher.sectionId
INNER JOIN  ON  sections.sectionId = classes_taught_by_teacher.sectionId
-- AND subjects.subjectId = classes_taught_by_teacher.subjectId
INNER JOIN  ON  subjects.subjectId = classes_taught_by_teacher.subjectId
-- AND users.userId = studentdetails.userId
INNER JOIN  ON  users.userId = studentdetails.userId
AND studentdetails.sectionId = $sectionId
AND studentdetails.classId = $classId
-- AND studentdetails.classId = classes.classId
INNER JOIN  ON  studentdetails.classId = classes.classId
-- AND studentdetails.sectionId = sections.sectionId
INNER JOIN  ON studentdetails.sectionId = sections.sectionId
ORDER BY classes.classId ASC, sections.sectionId ASC
"

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
				'Subject', Sub.Subject
			)
		)
		as 'Cl Sec Sub',
		json_arrayagg(
			json_object(
				'S First Name', U.firstName,
				'S First Name', U.middleName,
				'S First Name', U.lastName,
				'S Class Number', C.classNumber,
				'S Section', Sec.Sections
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
	ON  StDet.userId = U.userId
LEFT JOIN studentdetails as StDet2
	ON  StDet.classId = C.classId
LEFT JOIN studentdetails as StDet3
	ON StDet.sectionId = Sec.sectionId
WHERE
	U.visibility = 'Y'
AND U.role = 'T'
AND StDet.sectionId = CTT.sectionId
AND StDet.classId = CTT.classId

AND U.userId = $teacherId
ORDER BY C.classId ASC, Sec.sectionId ASC"



T Id
T First Name
T Middle Name
T Last Name
T External Email
T Internal Email
Joined
T Mobile
Cl Sec Sub
Stu Dets
4
Vinaya
Keshav
Pai
vinayakeshavpai@gmail.com
VinayaKeshavPai@mydomain.com
2001
+919663304792
[
	{"Class Id": 1, "Class": "I", "Section Id": 2, "Section": "B", "Subject": "English"},
	{"Class Id": 9, "Class": "IX", "Section Id": 4, "Section": "D", "Subject": "Social Studies"},
	{"Class Id": 9, "Class": "IX", "Section Id": 6, "Section": "F", "Subject": "Social Studies"},
	{"Class Id": 2, "Class": "II", "Section Id": 5, "Section": "E", "Subject": "Science"}
]
[
	{"S First Name": "Vinaya", "S First Name": "Keshav", "S First Name": "Pai", "S Class Number": "I", "S Section": "B"},
	{"S First Name": "Vinaya", "S First Name": "Keshav", "S First Name": "Pai", "S Class Number": "IX", "S Section": "D"},
	{"S First Name": "Vinaya", "S First Name": "Keshav", "S First Name": "Pai", "S Class Number": "IX", "S Section": "F"},
	{"S First Name": "Vinaya", "S First Name": "Keshav", "S First Name": "Pai", "S Class Number": "II", "S Section": "E"}]
?>
