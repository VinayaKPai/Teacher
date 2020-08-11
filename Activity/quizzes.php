<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/header.php" ;
				include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
				include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
				$a = "Q";
				$pageHeading = "Quizzes";
				$pageHeadSingular = "Quiz";
				$userName = "Guest (T)";
				$userType = "";
				$loggedInUserName  = "";
	?>
</head>
<body class="body">
	<div class="container">
	<h3 class="centered" style="background: var(--BodyGradient);"><?php include $_SERVER['DOCUMENT_ROOT']."/Components/top.php"; ?></h3>
		<?php
			if ($_GET){echo $_GET;}
			include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
			include $_SERVER['DOCUMENT_ROOT']."/Components/createNewAssessmentBtn.php";
		?>


	 <div style="background: var(--BodGradbanner);">
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
		 			$b = "withdrawn";
		 			aqtActivityQuery($a,$b,$mysqli,$pageHeading);
		 		?>
		 	</div>
	 	 	<div class="panel-group" id="accordion">
	 	 		<?php
	 	 			savedAssessmentsQuery( $mysqli);
	 	 		?>
	 	 	</div>
		</div>

 </div> <!-- container div immediately inside body -->
 <div class="container" id="bottom"><?php include "../Components/bottom.php"; ?></div>
</body>
</html>
