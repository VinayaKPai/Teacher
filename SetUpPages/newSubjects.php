<?php
	//include "basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
	$pageHeading = "Subjects";
	$pageCode = "setup";
	$userName = "Guest";
	$userType = "";
	$loggedInUserName  = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teachers Tools LH</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
			<script src="../../Scripts/js/ajaxCalls.js"></script>
		</head>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<h3 class="centered">
				<div id="top" class="row" style="padding: 1px;">
					<?php include "../Components/top.php"; ?>
				</div>
			</h3>
			<hr>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
			?>
				<div>
					<?php
						classesTaughtByTeachers($mysqli);
					?>


					<div id="status"></div>
				</div>
<hr>
		</div>
		<div class="container" id="bottom"><?php include "../Components/bottom.php"; ?></div>
	</body>
</html>
