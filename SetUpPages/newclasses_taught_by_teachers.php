<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/CSTquerries.php";

	$pageHeading = "Classes and Sections";
	$pageCode = "setup";
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
				<link type="text" href="./Modals/modaltest.html"/link>
			<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
				<script src="../../Scripts/js/ajaxCalls.js"></script>

	</head>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<hr>
			<h3 class="centered">
				<?php include "../Components/top.php"; ?>
			</h3>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/C_S_T_internalNav.php";
				include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
			?>
			<hr>

			<div>
				<div class="col-sm-3 centered" style="padding: 10px;">
					<h4 style="color: Green; background-color: LightGrey;">Add: Class and Section for a Teacher.</h4>
					<hr>
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/Forms/newClassForm.php"; ?>
					<hr>
					<!-- <div  class="row">
						<div id="ajaxRes" class="col-sm-2">

						</div>

						<div class="col-sm-5">
							<div id="recsInQ" style="color: blue; font-weight: bold;">
							</div>
							<div class="centered">
								<button id="addAll" class="btn-primary"  onclick="ajaxAddAll(addMultiple)" style="display: none;"></button>
							</div>
						</div>
					</div> -->

				</div>
				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
					<!-- <div class="container"> -->
			      <?php
			      for ($a=1;$a<13;$a++) {
			        classes_sections_teachers($a,$mysqli,$pageHeading);
			      }
			      ?>
			    <!-- </div> -->
						<!-- <?php

							include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/classes_taught_by_teachers.php";
						?> -->


						<div id="status"></div>
					</div>
				<hr>

			</div>
		</div>
		<div class="container" id="bottom"><?php include "../Components/bottom.php"; ?></div>
	</body>
</html>
