<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teachers Tools LH</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- <script src="modal.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
</head>
<body class="body">
	<div class="container">
		<div class="right-align">
				<?php include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
						echo $datetime1; ?>
				</div>
	<hr>
	<?php
		$pageHeading = "Quizzes";
		$pageHeadSingular = "Quiz";
		include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
		include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
		if ($_GET){echo $_GET;}
	?>
	 <a href="../../SetUpPages/newQuestions.php">
		 <h4 class="btn btn-block topbanner">Add A New <?php echo $pageHeadSingular; ?>
			 <small style="padding: 10px; color: White;">This will take you to the question bank</small>
		 </h4>
	 </a>

	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/AQTpanels.php"; ?>
</div>
</body>
</html>
