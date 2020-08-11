<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>VKP Solutions</title>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<!-- Bootstrap CSS -->
				    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />

	</head>

<body class="body">

<!-- <div class="container"> -->

	<div class="topbanner container-fluid">
		<h1>Coming Soon......
			<span >Our offering to Teachers and schools!&emsp;&emsp;</span><span style="float:right;">
				<button class="btn white"  data-toggle="modal" data-target="#contact">
	        <span class="glyphicon glyphicon-envelope"></span> Contact Us
	      </button>

			</span>
		</h1>


	</div>
	<!-- <div>
		<h5><span style="float:right;">
			<button class="btn white"  data-toggle="modal" data-target="#contact">
        <span class="glyphicon glyphicon-envelope"></span> Contact Us
      </button>

		</span></h5>
	</div> -->
</div>
	<div class="roundedsquare maroon centered" style="background-color: lightgrey;">
		<h5 class="maroon centered">New offering! Product as well as Services</h5>

		<image src= "../../Images/prashnavalilogo.png" style="width:80%; margin: 0px auto 0px auto; z-index: +10;" class="responsive" />

	</div>
	<div>
		<div class="row">
			<h5 style="width: 100%;">
			<!-- <div class="col-sm-6"> -->
				<image src= "../../Images/No1.png"  class="img-fluid"/>
					Select Questions
				<image src= "../../Images/No2.png"  class="img-fluid"/>
					Give it a name
			<!-- </div> -->
			<!-- <div class="col-sm-6"> -->
				<image src= "../../Images/No3.png"  class="img-fluid"/>
					Select dates
				<image src= "../../Images/No4.png"  class="img-fluid"/>
					Save!!!
			<!-- </div> -->
		</h5>
	</div>
	<div>
			<h5 style="width: 100%;">Behind the scenes....</h5>
			<h6 class="left-align green" style="padding: 5%;">	<li> Notify you a day before the assessment goes live...  </li>
				<li>Open the assessment to your students on the selected dates.... </li>
				<li>Send reminders to you and your students before it closes....</li>
				<li>...ALL THIS without you having to track dates!</li>
				<li>You will be up-to-date about your current assessments as soon as you launch the app.... AND</li>
				<li>Your students will be aware of the tasks they need to perform, when they launch their!</li></h6>
				<h5>	...and much much more!!
				<!-- </div> -->
			</h5>

		</div>

			<div class="modal" role="dialogue" id="contact" style="width: 80%;margin: 0px auto 0px auto;">
				<div class="modal-dialog" style="height:80%; width: 80%;margin: 0px auto 0px auto;">
					<div class="modal-header" ><h2 class="white">WE'LL get in touch with you!</h2><h4>Drop us a line!<h4></div>
					<div class="modal-content"  style="height:80%; width: 80%;margin: auto auto auto auto;">
						<form action="../../Scripts/php/saveMessage.php" method="POST" style="height:80%; width: 80%; margin: 5% auto 5% auto; ">
							<div style="margin: 5% auto 5% auto; ">
								<label for="name"><span class="red">*</span> Name</label>
								<input id="name" name="name" type="text" required class="form-control input-sm" />
							</div>
							<div style="margin: 5% auto 5% auto; ">
								<label for="phone"><span class="red">*</span> Phone</label>
								<input id="phone" name="phone" type="text" required  class="form-control input-sm"/>
							</div>
							<div style="margin: 5% auto 5% auto; ">
								<label for="email"><span class="red">*</span> Email</label>
								<input id="email" name="email" type="email" required class="form-control input-sm"/>
							</div>
							<div style="margin: 5% auto 5% auto; ">
								<label for="youare"><span class="red">*</span> You are : </label>
								<select id="youare" name="youare" required class="form-control input-sm"/>
									<option></option>
									<option id="ind">Individual</option>
									<option id="smOrg">Small organization</option>
									<option id="lgOrg">Large organization</option>
								</select>
							</div>
							<div style="margin: 5% auto 5% auto; ">
								<label for="msg"><span class="red">*</span> Message</label>
								<textarea class="form-control" rows="5"  id="msg" name="msg" required></textarea>
							</div>
							<div class="modal-footer" ><button type="submit" class="submit">Submit</button></div>
						</form>
					</div>
					<div class="modal-footer" ><button type="button" class="btn btn-default white" data-dismiss="modal" style="border: solid 1px #fff">Close</button></div>
				</div>
			</div>
	</div>
</body>
</html>
<?php
$query = $mysqli->query("SELECT distinct deplog.assessmentId as DEPid,
deplog.classId as 'class',
deplog.sectionId as 'sec',
a.assessment_title as 'A-Title',
json_arrayagg(
	json_object (
        'A-Questions',aq.question_id
    )
) as 'assdets'
from deploymentlog as deplog
	inner join assessments as a
    	on a.assessment_Id = deplog.assessmentId
       inner join assessment_questions as aq
       	on aq.assessment_Id = a.assessment_Id
       GROUP BY deplog.classId
			"
		);

		DEPid			class 			sec			A-Title				assdets
		1					2							1			My First assessment
		[
			{"A-Questions": 7},
			{"A-Questions": 8},
			{"A-Questions": 9},
			{"A-Questions": 11},
			{"A-Questions": 13},
			{"A-Questions": 16},
			{"A-Questions": 11},
			{"A-Questions": 13},
			{"A-Questions": 16},{"A-Questions": 11},{"A-Questions": 13},{"A-Questions": 16},{"A-Questions": 11},{"A-Questions": 13},{"A-Questions": 16},{"A-Questions": 11},{"A-Questions": 13},{"A-Questions": 16},{"A-Questions": 7},{"A-Questions": 8},{"A-Questions": 9}]
		4					8							4			Dumb and Dumber
		[{"A-Questions": 481},{"A-Questions": 482},{"A-Questions": 483},{"A-Questions": 484},{"A-Questions": 490},{"A-Questions": 491},{"A-Questions": 494},{"A-Questions": 496},{"A-Questions": 497},{"A-Questions": 480},{"A-Questions": 487},{"A-Questions": 488},{"A-Questions": 481},{"A-Questions": 482},{"A-Questions": 483},{"A-Questions": 484},{"A-Questions": 481},{"A-Questions": 482},{"A-Questions": 483},{"A-Questions": 480},{"A-Questions": 487},{"A-Questions": 488}]
		2					9						2				Ass 2
		[{"A-Questions": 3},{"A-Questions": 4}]

?>
