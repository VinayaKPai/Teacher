<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";


	$pageHeading = "Set Up your Classes and Sections";
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

				<script type="text/javascript">
					var addMultiple = [];
					function addNewClasses() {	//for ADD ALL button
					 //document.getElementById("status").innerHTML = "Add New Classes triggered";


					 $('#status').html(addMultiple);
					}

				</script>
	</head>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
			<hr>
			<div>
		    <div>
					<h5  class="panel-title" style="background-color: #C5B2B3;">
        		<a data-toggle="collapse" href="#collapse1">Instructions<span class="glyphicon glyphicon-plus-sign" style="float: right; color: Red"></span></a>
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
				<div class="col-sm-3 centered" style="padding: 10px;">
					<h4 style="color: Green; background-color: LightGrey;">To Add: Select Class and Section from the dropdowns below and click submit.</h4>
					<hr>
					<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
						<div>
							<label for='teacherName'>Teacher   <select name='teacherName' id='teacherName'><option></option>
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/teacherDropDown.php";
							?>
						</select></label>
						</div>
						<div>
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
							?>
						</div>
						<div>
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/sectionAlphaDropDown.php";
							?>
						</div>
						<div>
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
							?>
						</div>
						<!-- <input type="button" id="chkRec" value="CHECK" onclick="ajaxChkClassFunction()"/>-->
						<button name="Submit" id="submit" type="submit">SUBMIT</button>

					</form>
					<hr>
					<div  class="row">
						<div id="ajaxRes" class="col-sm-2">

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
				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
						<h6>Filter By: </h6>
						<div style="display: flex; justify-content: center;">
							<label for='teacherNameFilter'>Teacher   <select name='teacherNameFilter' id='teacherNameFilter' onchange="filterByTeacher(this)"><option></option>
									<?php include $_SERVER['DOCUMENT_ROOT']."/Components/teacherDropDown.php" ; ?>
								</select>
							</label>
			<script>
				function filterByTeacher(e) {
					alert (e.selectedIndex);
					var chktr = "trname"+e.selectedIndex;
					var trarray = document.getElementsByTagName("tr");
					for (i=0;i<trarray.length;i++) {
						// document.getElementsByTagName("tr").style.display="table-row";
						if (trarray[i].id!=chktr) {
							trarray[i].style.display = "none";
						}
						else {
							trarray[i].style.display = "table-row";
						}
					}
				}
				function clearFilters() {
					var trs = document.getElementsByTagName("tr");
					for (d=0;d<trs.length;d++) {
						trs[d].style.display="table-row";
					}
				}
			</script>
							Or: <?php include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php" ; ?>
							OR: <?php include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php" ; ?>
							<button class="btn btn-default btn-small" onclick=clearFilters()>Clear Filters</button>
						</div>
						<?php include $_SERVER['DOCUMENT_ROOT']."/AddNew/Existing/classes_taught_by_teachers.php"; ?>


						<div id="status"></div>
					</div>
				<hr>

			</div>
		</div>
		<div class="container" id="bottom"><?php include "../Components/bottom.php"; ?></div>
	</body>
</html>
