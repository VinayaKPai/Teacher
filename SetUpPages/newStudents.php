<?php
	//include "basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allQueries.php";
	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentsQueryResultToHtmlTable.php";
	$pageHeading = "Students";
	$pageCode = "setup";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Teachers Tools LH - Manage Students</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link type="text" href="./Modals/modaltest.html"/link>
		<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
			<script src="../../Scripts/js/ajaxCallStudents.js"></script>
			<script src="../../Scripts/js/ajaxCallTeachers.js"></script>

			<script type="text/javascript">
				function modalclick(e) {

					document.getElementById("studentName").innerText = e.innerText;
					document.getElementById("modalSpan").innerText = e.innerText;

					document.getElementById("studentId").value = e.id;
					// document.getElementById("classNumber").value = "";
					// document.getElementById("sectionAlpha").value = "";

							ajaxCallStudents(e.id);
						}

						function filterstudents (s) {
							alert (this.name);
						}
						function explore() {
							document.getElementById("moreDetails").style.display = "block";
						}

						function resetModal() {
							$('body').on('hidden.bs.modal', '.modal', function () {
						 	$(this).removeData('bs.modal');
					 			});
						}
						// for modal
						function editStudent() {
							document.getElementById("editDiv").style.display = "none";
							document.getElementById("confirmDiv").style.display = "block";
						}
						function saveChanges(e) {
							alert (e.id);
							document.getElementById("confirmDiv").style.display = "none";
							document.getElementById("editDiv").style.display = "block";
						}
						function exploreclick(b) {
							$('#studentModal').modal('hide');
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
					<?php include $_SERVER['DOCUMENT_ROOT']."/Forms/userStudentForm.php"; ?>
					<hr>
				</div>
				<input id="studentId" name="studentId" hidden> </input>
				<div class="col-sm-9 centered" style="border-left: 1px solid Grey;">
					<h5>Click on the student's name to see details</h5>
					<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
					<?php include "../AddNew/Existing/students.php"; ?>
				</table>
					<div id="status"></div>
				</div>
				<hr>
		</div>
		<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
		</div>



		<div id="studentModal" class="modal modal-xl fade" role="dialog" style="width: 100%;">
		  <div class="modal-dialog">
		    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
								<!-- need to use reset() but how? -->
				        <h4 class="modal-title" style="text-align: center;">
									<span  id="studentName"></span>
								</h4>
				      </div>
				      <div class="modal-body">
						  <div class="row">
								<div class="col-sm-12" style="border: 1px solid black;">
									<h4 class="centered"> Studies in : <span id="modalSpan"></span></h4>
								  <hr />
									<div id="ajaxRes">
								  <hr />
										<?php
											include "../Scripts/php/singleStudentDetails.php";
										?>
									</div>

							  </div>

						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<!-- need to use reset function - but how? -->
				      </div>
				    </div>
					</div>
		  </div>

	</body>
</html>
