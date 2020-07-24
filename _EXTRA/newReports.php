<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";

	$pageHeading = "Reports";
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
				<script src="../../Scripts/js/ajaxCalls.js">
				</script>
				<script src="../../Scripts/js/ajaxCallsReports.js">
				</script>

	</head>
	<body style="background: var(--BodyGradient);">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
			<hr>
			<?php
				// include $_SERVER['DOCUMENT_ROOT']."/Components/C_S_T_internalNav.php";
				include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
			?>
			<div>

				<div class="col-sm-6" style="padding: 10px;">
					<h4 style="color: Green; background-color: LightGrey;">Run existing reports </h4>
					<div>
						For teacher :
						<?php
							//when login is enabled, there will be no need for the dropdown
							//instead, the logged person's id will be automatically taken
							include "../Components/teacherDropDown.php"; ?>
					</div>
					<ul  class="left-align" style="list-style-type: none;"  id="myReports">
						<li onclick="addReportToPreview(this)" style="cursor: pointer; color: blue;" id="myClasses">My Classes</li>
						<li onclick="addReportToPreview(this)" style="cursor: pointer; color: blue;" id="myClassesBySubjects">My Classes and By Subject</li>
						<li onclick="addReportToPreview(this)" style="cursor: pointer; color: blue;" id="mySubjectsByTopic">My Subjects and By Topic</li>
					</ul>
					<hr>
					<h4 style="color: Green; background-color: LightGrey;">To Create new report: </h4>
					<div>Select Class Section and Subject from the dropdowns below and click submit.</div>
					<hr>
					<form name="newReportForm" action="../AddNew/addnewreport.php" method="post">
						<?php $displayType = "dropdown";
									include "../Components/classNumberDropDown.php";?>
						<?php include "../Components/sectionAlphaDropDown.php";?>
						<?php include "../Components/subjectDropDown.php";?>
						<button name="Submit" id="submit" type="submit">Create New Report</button>
					</form>
					<hr>
				</div>

				<div class="col-sm-6 centered" style="border-left: 1px solid Grey;" id="reportPreview">
					<h5>Report Preview</h5>
					<hr>
					<?php include "../AddNew/Existing/reports.php"; ?>
					<div  class="row">
						<div id="ajaxRes">

						</div>

					</div>


					<div id="status"></div>
				</div>
<hr>
		</div>
		<div id="bottom" class="col-sm-12"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
