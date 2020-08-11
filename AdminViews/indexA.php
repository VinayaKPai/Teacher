<?php
	session_start();
	include "basecode-create_connection.php";
	// $pageHeading = "<span class='loggedin'>Guest</span>" ;
	$pageCode = "index";
	$userName = "Admin";
	$userType = "Admin";
	$loggedInUserName  = $_SESSION['user'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Teachers Tools LH</title>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<!-- Bootstrap CSS -->
				    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
				<link type="text" href="./Modals/modaltest.html"/link>
				<script src="./Scripts/js/codilytest.js"></script>
				<script>
					function commingSoon(t) {
						alert (t.innerText + " coming soon!!")
						t.style.color="white";
					}
				</script>
	</head>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include "Components/top.php"; ?>
			</h3>
			<?php echo $datetime1; ?>

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
								<li><a href="../../SetUpPages/questionBank.php">Question Bank</a></li>
							</ul>
					</div>

					<h4 class="btn btn-block topbanner">Reports</h4>
						<div class="card admincard col-md-3 col-xs-12">
							<h5>Assignments</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
						</div>
						<div class="card admincard col-md-3 col-xs-12">
							<h5>Quizzes</h5>
							<div class="left-align" id="quizzes">
								<ul class="left-align" style="list-style-type: none;">
									<?php
										include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
									?>
								</ul>
							</div>
						</div>
						<div class="card admincard col-md-3 col-xs-12">
							<h5>Tests</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
						</div>
						<div class="card admincard col-md-3 col-xs-12">
							<h5>Students</h5>
							<ul  class="left-align" style="list-style-type: none;">
								<?php
									include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
								?>
							</ul>
					</div>
				</div>
				<!-- <div> -->
					<?php include $_SERVER['DOCUMENT_ROOT']."/Components/todolist.php"; ?>
				<!-- </div> -->
			</div>
			<div class="container">
			<?php include "Components/bottom.php"; ?>
			</div>
		</div>

  </body>
</html>
