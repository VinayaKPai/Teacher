<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";
//include "../RemoveRecords/RemoveClass.php";
	$pageHeading = "Set Up your Classes and Sections";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teachers Tools Demo</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link type="text" href="./Modals/modaltest.html"/link>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
		<script src="../../Scripts/js/ajaxCalls.js"></script>

		<script type="text/javascript">
			var addMultiple = [];


		</script>
	</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered"><?php include "../Components/top.php"; ?></h3>
			<hr>
			<div class="row grid-container centered" style="flex-wrap: wrap; padding: 5px;">
				<div>
					<div class="col-sm-2">Instructions</div>
					<div class="col-sm-5"></div>
					<div class="col-sm-5"></div>
				</div>
			</div>

			<div class="col-sm-9" style="border: 1px solid Grey;">

				<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
					Class/Std <select name="classNumber" id="classNumber">
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
					Section <select name="sectionAlpha" id="sectionAlpha">
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
			</div>

			<div class="col-sm-3 centered" style="border: 1px solid Grey;">
				<?php include "../AddNew/existingclasssections.php"; ?>
			</div>
			<div  class="row grid-container" style="flex-wrap: wrap; padding: 5px;">
				<div id="ajaxRes" class="col-sm-5">

				</div>
				<div id="addBtn" class="col-sm-2">

				</div>
				<div id="readyToAdd" class="col-sm-5">
					<span id="recsInQ" style="color: blue; font-weight: bold;"></span>
					<button id="addAll" onclick="" style="display: none;"></button>
				</div>
			</div>

		</div>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
	</body>
</html>
