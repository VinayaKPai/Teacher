<?php include "basecode-create_connection.php"; ?>


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
	<script language="javascript">
		function addmore() {
			alert ("Clicked");
			var div = document.getElementById('addmore');

			div.innerHTML += 'Extra stuff';
		}
		function topicchange(e) {
			alert (e[selectedIndex].id);
		}
	</script>
</head>
<body class="body">
	<div class="container">
		<h4>Quickly Add Several Questions in one go</h4>
		<p>Fill in ALL fields to make best use of the App Features</p>
		<div class="row">
			<div class="col-sm-6" style="border: 1px solid Grey;">

				<form name="newClassForm" action="../AddNew/addnewclass.php" method="post">
					Class/Std <select name="classNumber" id="classNumber">
						<option id="std1">I</option>
						<option id="std2">II</option>
						<option id="std3">III</option>
						<option id="std4">IV</option>
						<option id="std5">V</option>
						<option id="std6">VI</option>
						<option id="std7">VII</option>
						<option id="std8">VIII</option>
						<option id="std9">IX</option>
						<option id="std10">X</option>
						<option id="std11">XI</option>
						<option id="std12">XII</option>
					</select>
					Subject:  <select id="subjectName"><option id="A">A</option><option id="B">B</option><option id="C">C</option></select>
					<br>
					Topic:  <input type="text" /> <?php include "../Components/topics.php"; ?>
					<br>
					Type: <select><option id="Z">Z</option><option id="Y">Y</option><option id="X">X</option></select>
					Question: <input type="text" />

					<div onclick="addmore()">Add another Question</div>
					<div id="addmore"></div>
					<button name="Submit" id="submit" type="submit">SUBMIT</button> 

				</form>
			</div>
		</div>
			<div class="col-sm-6 centered" style="border: 1px solid Grey;">
				<?php include "../../AddNew/existingquestions.php"; ?>
			</div>
		</div> 
	</body>
</html>