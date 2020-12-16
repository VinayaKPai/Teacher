<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	$loggedInUserName = $_SESSION['user'];
	$pageCode = "A";
	$loggedInUserName  = $_SESSION['user'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
		include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
	?>

	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/logintimebtn.php" ;
			?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php";
			?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/adminNavBar.php";
			?>
		</div>
		<div class="container" style="background: var(--BodyGradient);">
				<div class="row" style="flex-wrap: wrap; padding: 5%; justify-content: space-between;">
					<h4 class="btn btn-block topbanner">Setup</h4>
					<div class="card admincard col-md-5 col-xs-12">
						<h5>People</h5>
						<ul class="left-align" style="list-style-type: none;">
							<li><a href="../../SetUpPages/newTeachers.php">Teachers</a></li>
							<li><a href="../../SetUpPages/newStudents.php">Students</a></li>
							<li><a href="../../SetUpPages/newclasses_taught_by_teachers.php">Teachers Classes Sections</a></li>
						</ul>
							<hr style="border-top: 1px solid maroon;">
					</div>
					<div class="card admincard col-md-5 col-xs-12" style="float:right;">
							<h5>Database</h5>
							<ul class="left-align" style="list-style-type: none;">
									<li><a href="../../SetUpPages/newSubjects.php">Subjects</a></li>
									<li><a href="../../SetUpPages/newUnits.php">Units</a></li>
									<li><a href="../../SetUpPages/newTopics.php">Topics</a></li>
									<li><a href="../../SetUpPages/newQuestions.php">Add Questions</a></li>
									<!-- <li><a href="../../SetUpPages/questionBank.php">Question Bank</a></li> -->
								</ul>
						</div>
					<h4 class="btn btn-block topbanner">Reports</h4>
					<?php
							$label = "Assignments";
							echo "";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
					?>
					<?php
							$label = "Quizzes";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
					?>
					<?php
							$label = "Tests";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
					?>
					<?php
							$label = "Students";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
					?>

				</div>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/todolist.php"; ?>
			</div>

  </body>
</html>
