<?php include "basecode-create_connection.php";
	$pageHeading = "Teachers Tool logged in as <span class='loggedin'>Guest</span>" ;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Teachers Tools LH</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link type="text" href="./Modals/modaltest.html"/link>
<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />

</head>
<body class="body">
	<div class="container">


				<div style="text-align: right">
					<?php echo $datetime1; ?>
				</div>
	<hr>
	<h3 class="centered"><?php include "Components/top.php"; ?></h3>
	<hr>

	<div class="container">

		<hr />
	<div class="row grid-container centered" style="flex-wrap: wrap; padding: 5px;">
		<div class="col-sm-2" style="border-right: 1px solid #64485C;">
			<h4>Reports</h4>
			<div class="btn roundsqbtn centered dropdown" style="width: 70%;">
				<div>Reports</div>
			</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newReports.php">Manage </a>
			</div>
			<hr style="border-top: 1px solid maroon;"/>
			<h4>Run Reports</h4>
			<h5>Quizzes</h5>
			<ul style="margin-left: 10%;">
				<li style="text-align: left;"><a href="#">By Class</a></li>
				<li style="text-align: left;"><a href="#">By Class and Section</a></li>
				<li style="text-align: left;"><a href="#">By Class and Subject</a></li>
				<li style="text-align: left;"><a href="#">By Subject and Topic</a></li>
			</ul>
			<h5>Assignments</h5>
			<ul style="margin-left: 10%;">
				<li style="text-align: left;"><a href="#">By Class</a></li>
				<li style="text-align: left;"><a href="#">By Class and Section</a></li>
				<li style="text-align: left;"><a href="#">By Class and Subject</a></li>
				<li style="text-align: left;"><a href="#">By Subject and Topic</a></li>
			</ul>
			<h5>Tests</h5>
			<ul style="margin-left: 10%;">
				<li style="text-align: left;"><a href="#">By Class</a></li>
				<li style="text-align: left;"><a href="#">By Class and Section</a></li>
				<li style="text-align: left;"><a href="#">By Class and Subject</a></li>
				<li style="text-align: left;"><a href="#">By Subject and Topic</a></li>
			</ul>
		</div>
		<div class="col-sm-2" style="border-right: 1px solid #64485C;">
			<h4>Activity</h4>
			<div class="btn roundsqbtn centered dropdown" style="width: 70%;">
				<div>Quizzes</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newQuizzes.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown" style="width: 70%;">
				<div>Assignments</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newAssignments.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown" style="width: 70%;">
				<div>Tests</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newTests.php">Manage </a>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<h4>Setup</h4>

			<div class="btn roundsqbtn centered dropdown"  style="width: 15%;">
				<div>Classes Sections</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newclasssections.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown"  style="width: 15%;">
				<div>Subjects</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newSubjects.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown"  style="width: 15%;">
				<div>Units</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newUnits.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown"  style="width: 15%;">
				<div>Topics</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newTopics.php">Manage </a>
				</div>
			</div>
			<div class="btn roundsqbtn centered dropdown"  style="width: 15%;">
				<div>Students</div>
				<div class="dropdown-content centered" style="float: center;">
					<a href="../../SetUpPages/newStudents.php">Manage </a>
				</div>
			</div>
		</div>
		</div>

	</div>
	<?php include "Components/bottom.php"; ?>
</div>
  </body>
</html>
