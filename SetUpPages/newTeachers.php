<?php
	//include "basecode-create_connection.php";
	include "../basecode-create_connection.php";
	//include "../RemoveRecords/RemoveClass.php";
	//include "../Scripts/php/addNewClasses.php";
//	include "../RemoveRecords/RemoveClass.php";
	// include "../_Modals/teacherModal.php";
	$pageHeading = "Set Up New Teachers";
	$pageCode = "setup";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teachers Tools LH - Manage Teachers</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link type="text" href="./Modals/modaltest.html"/link>
		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
			<script src="../../Scripts/js/ajaxCallStudents.js"></script>
			<script src="../../Scripts/js/ajaxCallTeachers.js"></script>

			<script type="text/javascript">
				var addMultiple = [];
				var cntr = 0;
				var satr = 0;
				function modalclick(e) {
					// alert ("Id is "+e.id);
					document.getElementById("teacherName").innerText = e.innerText;
					document.getElementById("modalSpan").innerText = e.innerText;

					document.getElementById("teacherId").value = e.id;
					document.getElementById("classNumber").value = "";
					document.getElementById("sectionAlpha").value = "";
					document.getElementById("subjectName").value = "";

					ajaxCallTeachers(e.id,e.innerText);
				}
				function clickalert(c) {
					alert (c.id);
				}
				function exploreclick(b) {
					$('#teacherModal').modal('hide');
					// alert (b.id);

					document.getElementById("exploreItem").innerText = document.getElementById("modalSpan").innerText;
					document.getElementById("expClass").innerText = b.parentNode.parentNode.children[0].innerText+" - ";
					document.getElementById("expSection").innerText = b.parentNode.parentNode.children[1].innerText+ " - "+ b.parentNode.parentNode.children[2].innerText;
					ajaxCallExploreItem(b.id);
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
				<div class="col-sm-3" style="padding: 10px;">
					<hr>
					<form name="newTeacherForm" action="../AddNew/addnewteacher.php" method="post">
						<div class="form-group">
							<label for="firstName">First Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="firstName" name="firstName" class="form-control" required />
							<label for="middleName">Middle Name</span></label> <input id="middleName" name="middleName" class="form-control" />
							<label for="lastName">Last Name<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="lastName" name="lastName" class="form-control" required />
							<label for="phoneMobile">Mobile<span class="glyphicon glyphicon-asterisk" style="color: Red"></span></label> <input id="phoneMobile" name="phoneMobile" class="form-control" onkeyup="setTempPW(this)"/>
							<script>
								function setTempPW(e) {
									var ei = e.value;
									document.getElementById("tpw").value = ei;
								}
							</script>
						</div>
						<div class="form-group">
							<label for="email">Email</label><input id="email" name="email" class="form-control" />
						</div>
						<div class="form-group">
							<label for="joinYear">Join Year</label> <select id="joinYear" name="joinYear" >
								<option id="blanksa"></option>
								<option id="j2017">2017</option>
								<option id="j2018">2018</option>
								<option id="j2019">2019</option>
								<option id="j2020">2020</option>
								<option id="j2021">2021</option>
								<option id="j2022">2022</option>
							</select>
							<label for="endYear">End Year</label><select id="endYear" name="endYear" >
								<option id="blanksa"></option>
								<option id="l2017">2017</option>
								<option id="l2018">2018</option>
								<option id="l2019">2019</option>
								<option id="l2020">2020</option>
								<option id="l2021">2021</option>
								<option id="l2022">2022</option>
							</select><br>
							<label for="tpw">Assigned Temp PW </label><input id="tpw" name="tpw" disabled/>
						</div>

						<button name="Submit" id="submit" type="submit">SUBMIT</button>
					</form>
					<hr>

				</div>

				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
					<h5>Click on the teacher's name to see details of classes taught or add new classes</h5>
					<?php include "../AddNew/Existing/teachers.php"; ?>


					<div id="status"></div>
				</div>
				<hr>
		</div>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>


		<div id="exploreModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><span  id="exploreItem"></span></span></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-6" style="border: 1px solid black; height: 100%;">
														<h4>Time Table</h4>
														<hr />
														<p> Explore Modal body</p>
													</div>
													<div class="col-sm-6" style="border: 1px solid black;">
														<h4 class="centered"><span  id="expClass"></span><span  id="expSection"> - <span  id="expSubject"></span><span id="exploreSpan"></span></h4>
														<hr />
														<div id="exploreajaxRes">
															Ajax Res
														</div>

													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>


		<div id="teacherModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
		  <div class="modal-dialog">

		    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title" style="text-align: center;"><span  id="teacherName"></h4>
				      </div>
				      <div class="modal-body">
						  <div class="row">
							  <div class="col-sm-6" style="border: 1px solid black; height: 100%;">
								  <h4 style="text-align: center;">Add Class, Section, Subject</span></h4>
								  <hr />
								  <form action="/AddNew/addnewclasses_taught_by_teachers.php" method="post" id="add_det_form">
											<?php $displayType = "dropdown";
												include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
												echo "<br>";
												include $_SERVER['DOCUMENT_ROOT']."/Components/sectionAlphaDropDown.php";
												echo "<br>";
												include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";
											?>
											<br>
											<input id="teacherId" name="teacherId" hidden> </input>
										  <button class="btn btn-default" name="Submit" id="submit" type="submit" style="margin: auto;">SUBMIT</button>
								  </form>
							  </div>
							  <div class="col-sm-6" style="border: 1px solid black;">
								  <h4 class="centered"><span id="modalSpan"></span> teaches:</h4>
								  <hr />
									<div id="ajaxRes">
										<?php
											include "../Scripts/php/singleTeacherClasses.php";
										?>
										Ajax Res
								  </div>

							  </div>
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
					</div>
		  </div>



	</body>
</html>
