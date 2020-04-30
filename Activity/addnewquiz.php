<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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


				<div style="text-align: right">
					<?php include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
						echo $datetime1; ?>
				</div>
	<hr>
		<?php
			$pageHeading = "quizzes";

			include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
			include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
			if ($_GET){echo $_GET;}
		?>
	 <a href="../../SetUpPages/newQuestions.php">
		 <h4 class="btn btn-block topbanner">Add New Quiz
			 <small style="padding: 10px; color: White;">This will take you to the question bank</small>
		 </h4>
	 </a>

	 <a data-toggle="collapse" href="#administered">
		 <h4 class="btn btn-block topbanner">Administered quizzes</h4>
	 </a>
	 <a  data-toggle="collapse" href="#open">
		 <h4 class="btn btn-block topbanner">Open quizzes</h4>
	 </a>
	 <a  data-toggle="collapse" href="#future">
		 <h4 class="btn btn-block topbanner">Future Quiz</h4>
	 </a>
	 <a  data-toggle="collapse" href="#all">
		 <h4 class="btn btn-block topbanner">All Quiz</h4>
	 </a>

	 <div id="administered" class="panel-collapse collapse centered" style="width: 100%;">
		 <?php
	 	 		include $_SERVER['DOCUMENT_ROOT']."/Activity/administeredQuizzes.php";
	 	 ?>
	 </div>

	 <div id="open" class="panel-collapse collapse centered" style="width: 100%;">
 	 <?php
	 	echo "<h4>Open</h4>";
 	 		include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/quizzes.php";
 	 ?>
 	</div>

	<div id="future" class="panel-collapse collapse centered" style="width: 100%;">
	 <?php
	 		echo "<h4>future</h4>";
			include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/quizzes.php";
	 ?>
	</div>

	<div id="all" class="panel-collapse collapse centered" style="width: 100%;">
	 <?php
	 		echo "<h4>All</h4>";
			include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/quizzes.php";
	 ?>
	</div>
</div>
</body>
</html>
