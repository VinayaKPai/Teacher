<?php
	//include "basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

	$pageHeading = "Topics";
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
				<script src="../../Scripts/js/ajaxCallTopicQuestions.js"></script>
	</head>
	<body class="body">
		<div class="container">
			<?php echo $datetime; ?>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
			<?php include "../Components/internalNav.php"; ?>
			<div class="row">
				<div class="col-sm-4" style="padding: 10px;">
					<hr>
					<p class="panel-title" style="background-color: #C5B2B3;">Add a Topic to the Database</p>
					<form name="newClassForm" action="../AddNew/addnewtopic.php" method="post">
						<div style="padding: 10px;">
							<div style="margin-bottom: 10px;">
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
							?>
							</div>
							<div style="margin-bottom: 10px;">
								<?php
										$displayType = "dropdown";
										include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
								?>
							</div>

							<div style="margin-bottom: 10px;">
								<label for="topicName">New Topic </label>
								<input id="topicName" name="topicName"/>
							</div>

							<div>
									<button name="Submit" id="submit" type="submit">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-8 centered" style="border-left: 1px solid Grey;">

						<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
							<?php
								if ($_GET){ $cln = $_GET['classNumber']; echo $cln;}
								else { $cln = "all";}
								include "../AddNew/Existing/topics.php";
							?>

						</table>
					</div>
					<hr>
			</div>
			<div class="container">
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/bottom.php"; ?>
			</div>
			<div id="topicQuestionsModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
			  <div class="modal-dialog">
			    <!-- Modal content-->
					    <div class="modal-content" style="background: var(--BodGradtop)">
										<div id="ajaxRes">
											<?php
												include "../Scripts/php/singleTopicDetails.php";
											?>
											<input id="topicId" name="topicId" hidden> </input>
									  </div>
					      </div>

					    </div>
						</div>
			  </div>
	</body>
</html>
