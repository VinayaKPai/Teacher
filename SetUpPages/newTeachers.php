<?php
	//include "basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	//include "../RemoveRecords/RemoveClass.php";
	//include "../Scripts/php/addNewClasses.php";
//	include "../RemoveRecords/RemoveClass.php";
	// include "../_Modals/teacherModal.php";
	$pageHeading = "Teachers";
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
				function modalclick(e) {

					document.getElementById("teacherName").innerText = e.innerText;
					document.getElementById("modalSpan").innerText = e.innerText;

					document.getElementById("teacherId").value = e.id;
					document.getElementById("classNumber").value = "";
					document.getElementById("sectionAlpha").value = "";
					document.getElementById("subjectName").value = "";

					ajaxCallTeachers(e.id);

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
			<h3 class="centered">
				<?php include "../Components/top.php"; ?>
			</h3>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/peopleLinks.php"; ?>
			<hr>

			<div class="row">
				<div class="col-sm-3" style="padding: 10px;">
					<hr>
					<?php include $_SERVER['DOCUMENT_ROOT']."/Forms/userTeacherForm.php"; ?>
					<hr>

				</div>

				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
					<h5>Click on the teacher's name to see details of classes taught or add new classes</h5>
					<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
					<?php include "../AddNew/Existing/teachers.php"; ?>
				</table>

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
				        <h4 class="modal-title" style="text-align: center;">
									<span  id="teacherName"></span>
								</h4>
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
									<h6 class='centered'>To see students for each class click Explore button</h6>
									<!-- <table style="width:90%;"><tr><th class="col-sm-2">Class</th><th class="col-sm-2">Section</th><th class="col-sm-5">Subject</th><th class="col-sm-3">Explore</th></tr> -->
									<div id="ajaxRes">
										<?php
											include "../Scripts/php/singleTeacherClasses.php";
										?>
								  </div>
<!-- </table> -->
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
