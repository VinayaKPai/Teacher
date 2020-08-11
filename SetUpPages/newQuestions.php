<?php
	include "../basecode-create_connection.php";
	$pageHeading = "New Questions";
	$pageCode = "setup";
	$userName = "Guest";
	$userType = "";
	$loggedInUserName  = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<title>Teachers Tools LH - Manage Students</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link type="text" href="./Modals/modaltest.html"/>
			<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
				<script src="../../Scripts/js/ajaxCalls.js"></script>
				<script src="../../Scripts/js/ajaxCallActivities.js"></script>
				<script src="../../Scripts/js/ajaxCallQuestions.js"></script>
				<script src="../../Scripts/js/ajaxGetAllForClass.js"></script>
				<script src="../../Scripts/js/filterRecords.js"></script>
		<script>
				// var chkdarr = [];
				// var slno = 0;

				// function optionsDisplay(dropDownId) {
				// 	//dropdown Id 1 is MCQ
				// 	//options input should be displayed only if the choice is MCQ ie id "1"
				// 	alert (dropDownId);
				// 	var tgt = document.getElementById("options");
				//
				// 	// var selector = document.getElementById("typeName");
				// 	if (dropDownId == 1) {
				// 		tgt.style.display = "block";
				// 	}
				// 	else {
				// 		tgt.style.display = "none";
				// 	}
				// 	if (dropDownId == 5) {
				// 		document.getElementById("cbseNote").style.display = "block";
				// 	}
				// 	else {
				// 		document.getElementById("cbseNote").style.display = "none";
				// 	}
				// 		// var value = selector[selector.selectedIndex].value;
				// 		//
				// 		// console.log(value);
				// 	}

		</script>
	</head>
		<body class="body">
			<div class="container">
				<h3 class="centered">
					<div id="top" class="row" style="padding: 1px;">
						<?php
							include "../Components/top.php";
						?>
					</div>
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
					?>

				</h3>
				<div class="centered">
					<a href="../../SetUpPages/questionBank.php">
						<h4 class="btn btn-block topbanner">Question Bank</h4>
					</a>
				</div>
				<hr>
			<div style="align-content: center;">
			  <h6 class="panel-title col-sm-12" style="color: #413949;">Add a Question to the Database</h6>
			  <form name="newQuestionForm" action="../AddNew/addnewquestion.php" method="post">
			    <div class="form-group">

						<?php $displayType = "dropdown"; ?>
						<div style='margin-top: 2px;'>
							<span class='col-sm-4'>
								<span class='red'>*</span>
									<?php include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php"; ?>
							</span>
							<span>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php"; ?>
							</span>
						</div>
						<div style='margin-top: 2px;'>
							<span class='col-sm-4'>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/topicDropDown.php"; ?>
							</span>
							<span  class='col-sm-8'>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/typeDropDown.php"; ?>
								<span id="cbseNote">Currently no categorization of CBSE questions supported</span>
							</span>
						</div>
						</div>
						<div style="margin-left: auto; margin-right: auto;">
				      <span  class='col-sm-12'><span class='red'>*</span>
							<label for="qn">Question</label>
				      <input id="qn" name="qn" class="form-control" />
						</div>
						<div>
							<?php include  $_SERVER['DOCUMENT_ROOT']."/Components/MCQoptionsInput.php"; ?>
						</div>

			    <button name="Submit" id="submit" type="submit" style="float: center;">SUBMIT</button>
			  </form>

			</div>

		</div>
		<div class="container">
		<?php include $_SERVER['DOCUMENT_ROOT']."/Components/bottom.php"; ?>
		</div>
	</body>
</html>
