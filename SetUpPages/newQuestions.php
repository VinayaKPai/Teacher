<?php
	include "../basecode-create_connection.php";
	$pageHeading = "Question Bank";
	$pageCode = "setup";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<title>Teachers Tools LH - Manage Students</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link type="text" href="./Modals/modaltest.html"/>
			<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
				<script src="../../Scripts/js/ajaxCalls.js"></script>
				<script src="../../Scripts/js/ajaxCallActivities.js"></script>
				<script src="../../Scripts/js/ajaxCallQuestions.js"></script>
				<script src="../../Scripts/js/ajaxGetAllForClass.js"></script>
				<script src="../../Scripts/js/filterRecords.js"></script>
		<script>
				var chkdarr = [];
				var slno = 0;
				function selectedQuestionDisplay(e) {
					if (e.checked) {
					// get the entire row
					chkdarr.push(e.id);
					slno = slno + 1;
							var row = e.parentNode.parentNode;
							//access all the td in the row
							var rowchild = row.children;
							var newqdiv = document.createElement("div");
							newqdiv.id = "n" + e.id;
							newqdiv.className="container";
							//display the question
							var newq = document.createElement("p");	//for the main question
							newq.innerText = slno + ". " +rowchild[3].innerText + " : ";
							newqdiv.appendChild(newq);
							// now add options if they exist
							if (rowchild[4].innerText!="")	{
								//---------------
								var au = document.createElement("ul");
								// au.class = "list-inline";
								//---------------
									for (i=4;i<rowchild.length;i++) {
										var ap = document.createElement("li");
										if (rowchild[i].innerText!=""){
											ap.innerText = rowchild[i].innerText;
											ap.style.margin = "10px";
											ap.style.display = "inline";
											au.appendChild(ap);
										}
									}
								newqdiv.appendChild(au);

								}
								document.getElementById("ajaxResult").appendChild(newqdiv);

							}
							else {	//ie if checkbox is unchecked
								var nid = "n" + e.id;
								var n = document.getElementById(nid);
								n.remove();
								var rem = chkdarr.indexOf(e.id);
								chkdarr.splice(rem,1);
							}
							if (document.getElementById("ajaxResult").children.length!=1){
								document.getElementById("axc").style.display = "block";
								document.getElementById("ajaxButtons").style.display = "block";
							}
							else {
								document.getElementById("axc").style.display = "none";
								document.getElementById("ajaxButtons").style.display = "none";
							}
							var choose = JSON.stringify(chkdarr);
							var csb = document.getElementById("classSelectBoxes").children;
							var csbi = 0;
							for (j=0;j<csb.length;j++) {
								if (csb[j].children[0].checked) {
									csbi = csb[j].children[0].id;
								}
							}
							var ssb = document.getElementById("subjectSelectBoxes").children;
							var ssbi = "a";	//simply initializing it to "a" as it is giving an error
							for (k=0;k<ssb.length;k++) {
								if (ssb[k].children[0].checked) {
									ssbi = ssb[k].children[0].id;
								}
							}
							// alert (csbi + ssbi)
							var clk = "ajaxCallSaveNewActivity(" + choose +"," + csbi+ ",\"" + ssbi + "\",this.id)";
								console.log(clk);
							var savebuttons = document.getElementsByName("saveButton");
							for (l=0;l<savebuttons.length;l++){
								savebuttons[l].setAttribute("onclick", clk);
							}
				}

				function testalert(dropDownId) {
						var selector = document.getElementById(dropDownId);
						var value = selector[selector.selectedIndex].value;

						console.log(value);
					}
		</script>
	</head>
	<body class="body">
		<div class="container">
			<hr>
			<h3 class="centered">
				<?php
					include "../Components/top.php";
					include $_SERVER['DOCUMENT_ROOT']."/Components/C_S_T_internalNav.php";
					include $_SERVER['DOCUMENT_ROOT']."/Components/internalNav.php";
				?>

			</h3>
			<hr>

			<div>
				<div class="col-sm-4" style="padding: 10px;">
					<hr>
					<p class="panel-title" style="background-color: #C5B2B3;">Add a Question to the Database</p>
					<form name="newQuestionForm" action="../AddNew/addnewquestion.php" method="post">
						<div class="form-group">
							<label for="classNumberFrm">Class / Std
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <input id="classNumberFrm" name="classNumberFrm" class="form-control" required />
							<label for="subjectNameFrm">Subject
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <input id="subjectNameFrm" name="subjectNameFrm" class="form-control" required />
							<label for="topicFrm">Topic
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <select name="topicFrm" id="topicFrm" class="form-control" required>
								<option id="blanktp"></option>
								<option id="I">I</option>
								<option id="II">II</option>
								<option id="III">III</option>
						  </select>
							<label for="typeFrm">Question Type
                <span class="glyphicon glyphicon-asterisk" style="color: Red"></span>
              </label>
              <select name="typeFrm" id="typeFrm" class="form-control" required>
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

				<div class="col-sm-8 centered" style="border-left: 1px solid Grey; height: 400px; padding: 1px; ">
					<hr>
          <div style="margin-top: 3px;">
						<p class="panel-title" style="background-color: #C5B2B3; color: Red;">Select at least one class and one subject to view questions</p>
					</div>
					<div id="ajaxReturn"></div>
								<div class="panel panel-header col-sm-12" style="padding:10px;">
										<div class="col-sm-3 left-align">Class/STD:<span class='glyphicon glyphicon-asterisk small' style='color: Red'></span></div>
										<div id="classSelectBoxes" class="input-group col-sm-9 left-align">
											<?php include "../Components/classNumberDropDown.php" ; ?>
										</div>
										<div class="col-sm-3 left-align">Subject:<span class='glyphicon glyphicon-asterisk small' style='color: Red'></span></div>
										<div id="subjectSelectBoxes" class="input-group col-sm-9 left-align">
											<?php include "../Components/subjectDropDown.php" ; ?>
										</div>
										<div id="filtersInUse"  class="left-align" style="padding:10px;">
											<div id="filteredClasses"  class="col-sm-6" style="padding: :10px;"></div>
											<div id="filteredSubjects"  class="col-sm-6" style="padding: :10px; border-left: 1px solid LightGrey"></div>
										</div>
								</div>
								<div class="panel panel-header  col-sm-12" style="padding:10px;">

									<div style="align-content: center;">

										<button onclick="ajaxCallGetQuestionsFilter()">View Questions</button>
									</div>
								</div>
				</div>
			</div>
			<hr>
				<div class-"container">
					<hr>
					<div id="status" class="centered" >
						<?php echo $datetime1;?>
					</div>
					<div class="row" style="margin-top: 10px; background: #C5B2B3; padding: 10px;">
						<div id="ajaxResult" class="container col-lg-8">

							<h5 id="axc" style="text-align: center; display: none;">
								Create a New Activity - Give it a name:
								<input id="inpTitle" />
								<br><small>Note: this will be displayed as the title when you deploy the activity!</small>
							</h5>


						</div>
						<div id="ajaxButtons" class="container col-lg-4" style="display:none;" >
							<!-- <div class='col-sm-3' style='padding-top: auto;'> -->
							<h5>Save A New Activity</h5>
					      <button name="saveButton" id="assignment" class="btn btn-block" style="color: Green;" onclick="ajaxCallSaveNewAssignment()">Save Activity</button>
					      <button class='btn btn-block' style='color: Red'>Cancel</button>
								<div class="h5">Note: If you want to remove any question here, uncheck the corresponding checkbox below</div>
				      <!-- </div> -->
						</div>
					</div>
					</div>
					<div id="ajret" class="centered">


						<?php
								$displayType = "checkbox";
								include "../AddNew/Existing/questions.php";
							?>
					</div>
				</div>

			<div id="bottom"><?php include "../Components/bottom.php"; ?></div>
	</body>
</html>
