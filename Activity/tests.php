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
SELECT a.assessment_Title AS 'Title', a.assessment_Id AS 'Assessment ID', json_arrayagg( json_object( 'questionID',qb.qId, 'question',qb.question, 'option1',qb.Option_1, 'option2',qb.Option_2, 'option3',qb.Option_3, 'option4',qb.Option_4, 'option5',qb.Option_5, 'option6',qb.Option_6 ) ) as 'Questions', json_arrayagg(DISTINCT json_object( 'classId', dl.classId, 'section', dl.sectionId, 'startDate', dl.schStartDate, 'endDate', dl.schEndDate, 'deploySuccess', dl.deploySuccess ) ) as 'Deployments' FROM questionbank AS qb INNER JOIN assessment_questions AS aq on aq.question_id = qb.qId INNER JOIN assessments as a on a.assessment_Id = aq.assessment_Id LEFT JOIN deploymentlog as dl on dl.assessmentId = aq.assessment_Id GROUP BY a.assessment_Title;

Array ( [Title] => asdf [Assessment ID] => 2 [Questions] => [{"questionID": 3, "question": "Passive citizens of France were:", "option1": "Only men above 25 years", "option2": "Only propertied men", "option3": "Men and women who didn't vote", "option4": "Only propertied women", "option5": "", "option6": ""},{"questionID": 4, "question": "Marseilles' was a: ", "option1": "Representative of third e3te?", "option2": "National anthem of France", "option3": "Political club?", "option4": "Militia", "option5": "", "option6": ""}] [Deployments] => [{"classId": 9, "section": 2, "startDate": "2020-05-06", "endDate": "2020-05-23", "deploySuccess": 0}] )
8 Assessments



?>
