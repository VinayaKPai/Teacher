<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		session_start();
		include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php" ;
				include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
				include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
				$type = "T";
				$pageHeading = "Tests";
				$pageHeadSingular = "Test";

				$loggedInUserName  = "";
				$pageCode = 'T';
	?>
</head>
<body class="body" style="background: var(--BodyGradient); height: 100%;">
	<div class="container">
		<div class="container-flex">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php"; ?>
			</h3>
		</div>

		<div class="container-flex">
			<?php
				if ($_GET){echo $_GET;}
				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/teacherNavBar.php";
				include $_SERVER['DOCUMENT_ROOT']."/Components/createNewAssessmentBtn.php";
			?>
		</div>
	 <div style="background: var(--BodGradbanner);">
		 	<div class="panel-group" id="accordion">
				<h5 class='centered topbanner'>Completed Tests</h5>
		 		<?php
					$status = "completed";
					$successFlag = 1;
	 			 include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/activityBody.php";
				?>
		 	</div>

		 	<div class="panel-group" id="accordion">
				<h5 class='centered topbanner'>Ongoing Tests</h5>
		 		<?php
					$status = "ongoing";
					$successFlag = 1;
	 			 include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/activityBody.php";
		 		?>
		 	</div>
			<div class="panel-group" id="accordion">
				<h5 class='centered topbanner'>Undeployed Tests</h5>
		 		<?php
					$status = "undeployed";
					$successFlag = 0;
	 			 include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/activityBody.php";
		 		?>
		 	</div>
		 	<div class="panel-group" id="accordion">
				<h5 class='centered topbanner'>Withdrawn Tests</h5>
		 		<?php
					$status = "withdrawn";
					$successFlag = 2;
		 		 include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/activityBody.php";
		 		?>
		 	</div>


			<div class="panel-group" id="accordion">
				<h5 class='centered topbanner'>All Saved Assessments</h5>
		 		<?php
		 		savedAssessmentsQuery( $mysqli);
		 		?>
		 	</div>
		</div>

 </div> <!-- container div immediately inside body -->

</body>
</html>
