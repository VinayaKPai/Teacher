<?php
	include "../basecode-create_connection.php";

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
		<script src="../../Scripts/js/ajaxGetAllForClass.js"></script>
		<script src="../../Scripts/js/filterRecords.js"></script>
		<script>
			function testalert(dropDownId) {
				var selector = document.getElementById(dropDownId);
				var value = selector[selector.selectedIndex].value;
				// The line below can be used to update a certain section of your visualisation, so that the page doesnt reload
				//document.getElementById('display').innerHTML = value;
				console.log(value);
			}

		</script>
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

				<div class="col-sm-4" style="padding: 10px;">
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


				</div>

				<div class="col-sm-8 centered" style="border-left: 1px solid Grey; height: 400px; padding: 1%; overflow: scroll;">
					<hr>
          <div style="margin-top: 3px;">
						<p class="panel-title" style="background-color: #C5B2B3;">Select the below options to display questions</p>
					</div>
					<div id="ajaxReturnTest">TEST RETURN</div>
					<form action="../AddNew/Existing/questions.php" method="POST">
						<p>(Dynamically generated selects)</p>
							Class/STD: <select id="classNumberDG" name="classNumberDG" onchange="ajaxGetSubForClass()">
								<option id="" value=""></option>
								<?php include "../Components/classNumberDropDown.php" ; ?>
							</select>
							Subject: <select id="subjectNameDG" name="subjectNameDG" style="width:80px;" onchange="ajaxGetTopForSub()">
									<option id="" value=""></option>
								 <?php //include "../Components/subjectDropDown.php" ; ?>
							</select>
							Topic: <select id= "topicNameDG" name="topicNameDG" style="width:80px;" onchange="ajaxGetTopForTyp()">
										<option id=""></option>
										<?php //include "../Components/topicDropDown.php" ; ?>
							</select>
							Q Type: <select id="typeNameDG" name="typeNameDG" style="width:80px;">
										<option id=""></option>
										<?php //include "../Components/typeDropDown.php" ; ?>
							</select>
							<input type="button" class="btn btn-primary btn-xs" onclick="filterQuestions()" value="Filter" />
							<input type="button" class="btn btn-primary btn-xs" onclick="getAll()" value="All" />
							<!-- <button class="btn btn-default btn-xs" type="submit">Submit</button>-->
						</form>
<div>
							<!-- <p>(Adi's code)</p>
							<form action="../AddNew/filteredquestions.php" method="POST">
							Class/STD: <select id="clName" name="clName" onchange="testalert('clName')">
							<option id="" value=""></option>
							<option id="A" value="IX" name="IX">IX</option>
							<option id="B" value="B">B</option>
							<option id="C" value="C">C</option>
						</select>
						Subject: <select id="subName" name="subName"onchange="testalert('subName')">
									<option id="" value=""></option>
									<option id="SocialStudies" value="SocialStudies" name="SocialStudies">Social Studies</option>
									<option id="E" value="E">E</option>
									<option id="F" value="F">F</option>

						</select>
						Topic: <select id= "toName" name= "toName" onchange="testalert('toName')">
									<option id=""></option>
									<option id="FrRev" name="FrRev" value="FrRev">FrRev</option>
									<option id="H">H</option>

						</select>
						Q Type: <select id="tyName" name="tyName"onchange="testalert('tyName')">
									<option id=""></option>
									<option id="MCQ" name="MCQ" value="MCQ">MCQ</option>
									<option id="J">J</option>

						</select>
						<button class="btn btn-default" type="submit">Submit</button>
					</form> -->
</div>
						<hr>
						<style>
						table tr:nth-child(even){background-color: #b69092; color: #fff}
						table tr:nth-child(odd){background-color: #684654; color: #fff}
						table td {text-align: center;}
						</style>
						<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
							<?php
								if ($_GET){ $cln = $_GET['cn'];}
								else { $cln = "all";}
								include "../AddNew/Existing/questions.php";
								?>

						</table>
				</div>
				<div id="status" class="centered" ><?php echo $datetime1;?></div>

				<hr>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>
	</body>
</html>
