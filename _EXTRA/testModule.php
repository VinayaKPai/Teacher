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
	  <script src="../../Scripts/js/ajaxCallActivities.js"></script>
		<script src="../../Scripts/js/activities.js"></script>
	<?php
	$pageHeading = "Create a New Test";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	?>
	</head>
	<body class="body">
		<div class="container">
			<div style="text-align: right">
				<?php echo $datetime1; ?>
			</div>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
				?>
<div>
<hr>
				<ul class="nav nav-tabs">
				  <li class="active">
						<a data-toggle="tab" href="#createNewTests">Create New Test</a>
					</li>
				  <li>
						<a data-toggle="tab" href="#savedTests">All Saved Tests</a>
					</li>
				  <li>
						<a data-toggle="tab" href="#previousTests">Previously Completed Tests</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="createNewTests" class="tab-pane fade in active">
						<hr>
						<div class="panel-title" style="text-align: center;">
							<h4>Create A New Test</h4>
						</div>
						<div class='col-sm-7'>
							<p>Select the class and subject to view. Available questions will appear once you click on Fetch Questions</p>
							<div class="panel panel-header">
										<?php
												$displayType = "dropdown";
												include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
										?>
										<?php
												$displayType = "dropdown";
												include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
										?>
										<button type='button' onclick="ajaxCallGetQuestionsForTest()">Fetch Questions</button>
								</div>
								<div id="existingQuestions"></div>
								 <?php include $_SERVER['DOCUMENT_ROOT']."../Activity/createtestpreview.php";  ?>
						</div>
						<div class='col-sm-5 centered'>
							<div class="panel panel-header">
									<h4>New Test Preview</h4>
									<!-- <div><p>Selected questions will appear here</p></div> -->
									<div id="for" class="col-sm-4">

									</div>
									<div id="classId" class="col-sm-4">

									</div>
									<div id="subjectId" class="col-sm-4">

									</div>
									<div id="testPreview">

									</div>
									<div id="testPreviewSubmit"></div>
									<div id="ajaxResult"></div>
								</div>
						</div>
					</div>
					<div id="savedTests" class="tab-pane fade">
						<hr>
						<div class="panel-title">
							<h4>Saved Test</h4>
							<p>These are tests you have created and saved previously</p><hr>
							<div class="panel panel-header">

								<?php include
								$_SERVER['DOCUMENT_ROOT']."../Components/classNumberDropDown.php";
								include $_SERVER['DOCUMENT_ROOT']."../Components/sectionAlphaDropDown.php";
								include $_SERVER['DOCUMENT_ROOT']."../Components/subjectDropDown.php"; ?>

								<button type="button" class="btn btn-small" onclick="filterTests()">Filter Tests</button>
						</div>
							<?php include $_SERVER['DOCUMENT_ROOT']."../Activity/savedTests.php";  ?>
						</div>
					</div>
					<div id="previousTests" class="tab-pane fade">
						<hr>
						<div class="panel-title">
							<h4>Previous Test</h4>
							<p>These are tests previously given at least once</p>
							<?php include $_SERVER['DOCUMENT_ROOT']."./Activity/completedTests.php";  ?>
						</div>
					</div>

				</div>
	</div>
</body>
	<!-- <script src="../../Scripts/js/ajaxCallQuestions.js"></script> -->




</html>
