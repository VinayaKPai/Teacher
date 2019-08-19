<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";

	$pageHeading = "Set Up your Subjects";

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
	</head>
	<body class="body">
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
			<div class="row">
				<div class="col-sm-6" style="padding: 10px;">
					<hr>
					<p class="panel-title" style="background-color: #C5B2B3;">Add a Topic to the Database</p>
					<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
						<div style="padding: 10px;">
							<div class="col-sm-6">
							<?php
									$displayType = "dropdown";
									include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
							?>
							</div>
							<div class="col-sm-6">
								<?php
										$displayType = "dropdown";
										include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
								?>
							</div>

							<div class="col-sm-12">
								<label for="topics">New Topic </label>
								<input id="topics" />
							</div>

							<div class="col-sm-12">
									<button name="Submit" id="submit" type="submit">SUBMIT</button>
							</div>

						<!-- <input type="button" id="chkRec" value="CHECK" onclick="ajaxChkClassFunction()"/>-->
						</div>
					</form>
				</div>
				<div class="col-sm-6 centered" style="border-left: 1px solid Grey;">
						<style>
						table tr:nth-child(even){background-color: #b69092; color: #fff}
						table tr:nth-child(odd){background-color: #684654; color: #fff}
						table td {text-align: center;}
						</style>
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
			<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
