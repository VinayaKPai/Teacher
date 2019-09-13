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
			<script src="../../Scripts/js/ajaxCallStudents.js"></script>

			<script type="text/javascript">
				var addMultiple = [];
				var cntr = 0;
				var satr = 0;
			</script>
		</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
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
			<div class="row">

				<div class="col-sm-5" style="padding: 10px;">
					<hr>
					<form name="newStudentForm" action="../AddNew/addnewstudent.php" method="post">
						<div class="form-group">
							<label for="firstName">First Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="firstName" name="firstName" class="form-control" required />
							<label for="lastName">Last Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="lastName" name="lastName" class="form-control" required />
							<label for="phoneMobile">Mobile<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="phoneMobile" name="phoneMobile" class="form-control" onkeyup="setTempPW(this)"/>
							<script>
								function setTempPW(e) {
									var ei = e.value;
									document.getElementById("tpw").value = ei;
								}
							</script>
							<input type="button" id="chkRec" value="CHECK" onclick="ajaxChkStudentFunction()"/>
						</div>
						<div class="form-group">
							<label for="classNumber">Class/Std</label> <select name="classNumber" id="classNumber" required>
									<option id="blankcn"></option>
									<option id="I">I</option>
									<option id="II">II</option>
									<option id="III">III</option>
									<option id="IV">IV</option>
									<option id="V">V</option>
									<option id="VI">VI</option>
									<option id="VII">VII</option>
									<option id="VIII">VIII</option>
									<option id="IX">IX</option>
									<option id="X">X</option>
									<option id="XI">XI</option>
									<option id="XII">XII</option>
							</select>
							<label for="sectionAlpha">Section</label> <select name="sectionAlpha" id="sectionAlpha" required>
									<option id="blanksa"></option>
									<option id="A">A</option>
									<option id="B">B</option>
									<option id="C">C</option>
									<option id="D">D</option>
									<option id="E">E</option>
									<option id="F">F</option>
							</select>
							<label for="rollNumber">Roll Number</label><input id="rollNumber" name="rollNumber" />
						</div>
						<div class="form-group">
							<label for="email">Email</label><input id="email" name="email" class="form-control" />
						</div>
						<div class="form-group">
							<label for="joinYear">Join Year</label> <select id="joinYear" name="joinYear" >
								<option id="blanksa"></option>
								<option id="2017">2017</option>
								<option id="2018">2018</option>
								<option id="2019">2019</option>
								<option id="2020">2020</option>
								<option id="2021">2021</option>
								<option id="2022">2022</option>
							</select>
							<label for="endYear">End Year</label><select id="endYear" name="endYear" >
								<option id="blanksa"></option>
								<option id="2017">2017</option>
								<option id="2018">2018</option>
								<option id="2019">2019</option>
								<option id="2020">2020</option>
								<option id="2021">2021</option>
								<option id="2022">2022</option>
							</select><br>
							<label for="tpw">Assigned Temp PW </label><input id="tpw" name="tpw" disabled/>
						</div>

						<button name="Submit" id="submit" type="submit">SUBMIT</button>
					</form>
					<hr>

				</div>

				<div class="col-sm-7 centered" style="border-left: 1px solid Grey;">
					<?php include "../AddNew/Existing/students.php"; ?>


					<div id="status"></div>
				</div>
				<hr>
		</div>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
