<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";
	//include "../RemoveRecords/RemoveClass.php";
	//include "../Scripts/php/addNewClasses.php";
//	include "../RemoveRecords/RemoveClass.php";

	$pageHeading = "Set Up your Question Bank";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teachers Tools LH - Manage Students</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link type="text" href="./Modals/modaltest.html"/link>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
		<script src="../../Scripts/js/ajaxCallQuestions.js"></script>

	</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?>(Master)</h3>
			<hr>
		  <div>
		    <div>
					<h5  class="panel-title" style="background-color: #C5B2B3;">
        		<a data-toggle="collapse" href="#collapse1">Instructions
							<span class="glyphicon glyphicon-plus-sign" style="float: right; color: Red"></span>
						</a>
					</h5>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<div class="col-sm-6" style="font-size: x-small;">
						<h7 style="font-weight: bold;">Add a Single record</h7>
						<div style="margin-top: 5px;">
							<li>Select from drop down Class/Std</li>
							<li>Select from drop down Section</li>
							<li>Click on CHECK</li>
							<li>If there is no popup message, click Submit</li>
						</div>
					</div>
					<div class="col-sm-6" style="font-size: x-small;">
						<h7 style="font-weight: bold;">Add Multiple records at once</h7>
						<div style="margin-top: 5px;">
							<li>Select from drop down Class/Std</li>
							<li>Select from drop down Section</li>
							<li>Click on CHECK</li>
							<li>Repeat above steps until you have several you records in the queue</li>
							<li>If any record has been added by mistake, click on Remove from Q to remove it from the queued records</li>
							<li>Click on ADD ALL to complete the process of inserting these records</li>
						</div>
					</div>
				</div>
			</div>
			<div>

				<div class="col-sm-6" style="padding: 10px;">
					<hr>
					<form name="newQuestionForm" action="../AddNew/addnewstudent.php" method="post">
						<div class="form-group">
							<label for="classNumber">Class / Std
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <input id="classNumber" name="classNumber" class="form-control" required />
							<label for="subjectName">Subject
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <input id="subjectName" name="subjectName" class="form-control" required />
							<label for="topic">Topic
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <select name="topic" id="topic" class="form-control" required>
								<option id="blanktp"></option>
								<option id="I">I</option>
								<option id="II">II</option>
								<option id="III">III</option>
						  </select>
							<label for="type">Question Type
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <select name="type" id="type" class="form-control" required>
									<option id="blanksa"></option>
									<option id="lat">LAT</option>
									<option id="sat">SAT</option>
									<option id="vsat">VSAT</option>
									<option id="mcq">MCQ</option>
							</select>
							<label for="qn">Question
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <input id="qn" name="qn" class="form-control" />
						</div>

						<button name="Submit" id="submit" type="submit">SUBMIT</button>
					</form>
					<hr>

				</div>

				<div class="col-sm-6 centered" style="border-left: 1px solid Grey; height: 50%; padding: 1%;">

          <div style="margin-top: 3px;">
						<p class="panel-title" style="background-color: #C5B2B3;">Select the below options to display questions</p>
					</div>

						<?php include "../Components/classNumberDropDown.php"; ?>

						<?php	include "../Components/subjectDropDown.php"; ?>
						<br>
						<?php		include "../Components/topicDropDown.php"; ?>

						<?php include "../Components/typeDropDown.php"; ?>

						<div>
							<button type="button" class="btn btn-default" onclick="ajaxChkQuestionsFunction()">FETCH  </button>
						</div>
						<hr>
				</div>
					<div id="status"></div>

		<hr>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
