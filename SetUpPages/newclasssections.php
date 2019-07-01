<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";


	$pageHeading = "Set Up your Classes and Sections";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teachers Tools LH</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link type="text" href="./Modals/modaltest.html"/link>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
		<script src="../../Scripts/js/ajaxCalls.js"></script>
		
		<script type="text/javascript">
			var addMultiple = [];
			function addNewClasses() {	//for ADD ALL button
			 //document.getElementById("status").innerHTML = "Add New Classes triggered";


			 $('#status').html(addMultiple);
			}

		</script>
	</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
			<hr>
			<div>
				<div>
					<h5 class="centered" style="background-color: #C5B2B3;">Instructions</h5>
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

				<div class="col-sm-9" style="padding: 10px;">
<hr>
					<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
						Class/Std <select name="classNumber" id="classNumber" required>
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
						Section <select name="sectionAlpha" id="sectionAlpha" required>
						<option id="blanksa"></option>
						<option id="A">A</option>
						<option id="B">B</option>
						<option id="C">C</option>
						<option id="D">D</option>
						<option id="E">E</option>
						<option id="F">F</option>
						</select>
						<input type="button" id="chkRec" value="CHECK" onclick="ajaxChkClassFunction()"/>
						<button name="Submit" id="submit" type="submit">SUBMIT</button>
					</form>
					<hr>
					<div  class="row">
						<div id="ajaxRes" class="col-sm-2">

						</div>
						<div id="remBtn" class="col-sm-5">

						</div>
						<div class="col-sm-5">
							<div id="recsInQ" style="color: blue; font-weight: bold;">
							</div>
							<div class="centered">
								<button id="addAll" class="btn-primary"  onclick="ajaxAddAll(addMultiple)" style="display: none;"></button>
							</div>
						</div>
				</div>
				</div>

				<div class="col-sm-3 centered" style="border-left: 1px solid Grey;">
					<?php include "../AddNew/existingclasssections.php"; ?>


					<div id="status">Statuc</div>
				</div>
<hr>
		</div>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
