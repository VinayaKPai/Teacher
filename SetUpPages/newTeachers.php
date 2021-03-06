<?php
	//include "basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/teachersQueryResultToHtmlTable.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentsQueryResultToHtmlDiv.php";
	//include "../RemoveRecords/RemoveClass.php";
	//include "../Scripts/php/addNewClasses.php";
//	include "../RemoveRecords/RemoveClass.php";
	// include "../_Modals/teacherModal.php";
	$pageHeading = "Teachers";
	$pageCode = "setup";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teachers Tools LH - Manage Teachers</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link type="text" href="./Modals/modaltest.html"/link>
		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
		</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered">
				<?php include "../Components/top.php"; ?>
			</h3>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/peopleLinks.php"; ?>
			<hr>
			<div class="row">
				<div class="col-sm-3" style="padding: 10px;">
					<hr>
					<?php include $_SERVER['DOCUMENT_ROOT']."/Forms/userTeacherForm.php"; ?>
					<hr>
				</div>
				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
					<h5>Click on the teacher's name explore details</h5>
					<?php
						teachers($mysqli,$pageHeading);
					?>
				</div>
				<hr>
			</div>
			<div id="bottom">
			<?php include "../Components/bottom.php"; ?>
		</div>
		</div>

	</body>
</html>
