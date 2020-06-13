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
	 	 		aqtActivityQuery($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 		$b = "ongoing";
	 	 		aqtActivityQuery($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 			$b = "undeployed";
	 	 			aqtActivityQuery($a,$b,$mysqli,$pageHeading);
	 	 		?>
	 	 	</div>

	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 			savedAssessmentsQuery( $mysqli);
	 	 		?>
	 	 	</div>


 </div> <!-- container div immediately inside body -->
</body>
</html>
