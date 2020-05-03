<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/header.php" ;?>

</head>
<body class="body">
	<div class="container">
		<div class="right-align">
					<?php include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
						echo $datetime1; ?>
				</div>
	<hr>
		<?php
			$pageHeading = "Assignments";
			$pageHeadSingular = "Assignment";
			include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
			if ($_GET){echo $_GET;}
		?>
	 <a href="../../SetUpPages/newQuestions.php">
		 <h4 class="btn btn-block topbanner">Add A New Assignment
			 <small style="padding: 10px; color: White;">This will take you to the question bank</small>
		 </h4>
	 </a>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Components/AQTpanels.php"; ?>
</div>
</body>
</html>
