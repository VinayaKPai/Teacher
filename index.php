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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link type="text" href="./Modals/modaltest.html"/link>
<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />

</head>
<body class="body">
	<hr>
	<h3 class="centered"><?php include "Components/top.php"; ?></h3>
	<hr>

	<div class="container">

		<hr />
	<div class="row grid-container centered" style="flex-wrap: wrap; padding: 5px;">
		<div class="btn roundsqbtn centered dropdown">
			<div>Reports</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newReports.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newReports.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Classes Sections</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newclasssections.php">Add New</a>
				<br>
				<a href="../../AddNew/existingclasssections.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Subjects</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newSubjects.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newSubjects.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Units</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newUnits.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newUnits.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Topics</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newTopics.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newTopics.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Tests</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newTests.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newTests.php">Manage </a>
			</div>
		</div>
		<div class="btn roundsqbtn centered dropdown">
			<div>Students</div>
			<div class="dropdown-content centered" style="float: center;">
				<a href="../../SetUpPages/newStudents.php">Add New</a>
				<br>
				<a href="../../SetUpPages/newStudents.php">Manage </a>
			</div>
		</div>
	</div>


		<div style="text-align: right">
			<?php echo $datetime1; ?>
		</div>
	</div>
	<?php include "Components/bottom.php"; ?>
  </body>
</html>
