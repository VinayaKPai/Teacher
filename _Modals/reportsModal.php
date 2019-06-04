<?php include "../basecode-create_connection.php"; ?>
<!-- New Reports Modal -->
<div id="newReportsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reports Header</h4>
      </div>
      <div class="modal-body">
		  <div class="row">
			  <div class="col-sm-3">
				  <p>Generate Reports By</p>
				  <li onclick="showClassSectionReport()">Class-Section</li>
				  <li onclick="showStudentsReport()">Students</li>
				  <li onclick="showSubjectReport()">Subject</li>
				  <li onclick="showTestReport()">Test</li>
				  <li onclick="showTopicReport()">Topic</li>
			  </div>
			  <div class="col-sm-9 grid-item" style="background-color: #EBE8E8;">
				  <div id="ClassSectionReport" style="display: none;">
					  <?php 
					  	echo "PHP REPORT FOR CLASS SECTION"; 
					  	$query = $mysqli->query("SELECT * FROM classsections");
						  if ($query) {
								echo "<h6>CLASS SECTION Table found</h6>";
								$rowcount=mysqli_num_rows($query);
								echo "Currently ".$rowcount." classes<br />"; 
							}
					  ?>
					  <?php
							echo "<p>The following classes and sections are already set up in the database</p>";
							$query = $mysqli->query("SELECT * FROM classsections");

									if ($query) {
										while ($row = $query->fetch_assoc())  {
											echo $row['classNumber']." - ".$row['sectionAlpha']."<br/>";
										}
									}
									if(!$query) {
										echo "Oh no";
									} 
						?>
				  </div>
				  <div id="StudentsReport" style="display: none;">
					  <?php 
					  	echo "PHP REPORT FOR STUDENTS"; 
					  	$query = $mysqli->query("SELECT * FROM studentdetails");
						  if ($query) {
								echo "<h6>STUDENTS Table found</h6>";
								$rowcount=mysqli_num_rows($query);
								echo "Currently ".$rowcount." students<br />";
							  
							}
					  ?>
					  <?php
							echo "<p>The following students are already registered in the database</p>";
							//include "basecode-create_connection.php";
							$query = $mysqli->query("SELECT * FROM studentdetails");

									if ($query) {

										while ($row = $query->fetch_assoc())  {

											echo $row['Id']." - ".$row['firstName']." - ".$row['lastName']."<br/>";

										 }
									}
									if(!$query) {
										echo "Oh no";
									} 
						?>
				  </div>
					  <div id="SubjectReport" style="display: none;">
					  <?php 
					  	echo "PHP REPORT FOR SUBJECT"; 
					  	$query = $mysqli->query("SELECT * FROM subjects");
						  if ($query) {
								echo "<h6>SUBJECT Table found</h6>";
								$rowcount=mysqli_num_rows($query);
								echo "Currently ".$rowcount." subjects. <a href='../../AddNew/addnewsubject.php'>Add a Subject</a><br />"; 
							  	
							}
					  ?>
						  <?php
							echo "List of Subjects available in the App";
							$query = $mysqli->query("SELECT * FROM subjects");

									if ($query) {
										while ($row = $query->fetch_assoc())  {
											$row['subjectName']."<br/>";
										}
									}
									if(!$query) {
										echo "Oh no";
									} 
?>
				  </div>
				  <div id="TestReport" style="display: none;">
					  <?php 
					  	echo "PHP REPORT FOR TEST"; 
					  	$query = $mysqli->query("SELECT * FROM topics");
						  if ($query) {
								echo "<h6>TOPICS Table found</h6>";
								$rowcount=mysqli_num_rows($query);
								echo "Currently ".$rowcount." topics<br />"; 
							  	
							}
					  ?>
				  </div>
				  <div id="TopicReport" style="display: none;">
					  <?php 
					  	echo "PHP REPORT FOR TOPIC"; 
					  	$query = $mysqli->query("SELECT * FROM topics");
						  if ($query) {
								echo "<h6>TOPICS Table found</h6>";
								$rowcount=mysqli_num_rows($query);
								echo "Currently ".$rowcount." topics<br />"; 
							}
					  ?>
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
<!-- Reports Modal End-->
<script>
	function showClassSectionReport() {
		var showElement = $("#ClassSectionReport");
		showElement.show();
		var hideElement1 = $("#SubjectReport");
		hideElement1.hide();
		var hideElement2 = $("#TestReport");
		hideElement2.hide();
		var hideElement3 = $("#TopicReport");
		hideElement3.hide();
		var hideElement4 = $("#StudentsReport");
		hideElement4.hide();
	}
	function showStudentsReport() {
		var showElement = $("#StudentsReport");
		showElement.show();
		var hideElement1 = $("#SubjectReport");
		hideElement1.hide();
		var hideElement2 = $("#TestReport");
		hideElement2.hide();
		var hideElement3 = $("#TopicReport");
		hideElement3.hide();
		var hideElement4 = $("#ClassSectionReport");
		hideElement4.hide();
	}
	function showSubjectReport() {
		var showElement = $("#SubjectReport");
		showElement.show();
		var hideElement1 = $("#ClassSectionReport");
		hideElement1.hide();
		var hideElement2 = $("#TestReport");
		hideElement2.hide();
		var hideElement3 = $("#TopicReport");
		hideElement3.hide();
		var hideElement4 = $("#StudentsReport");
		hideElement4.hide();
	}
	function showTestReport() {
		var showElement = $("#TestReport");
		showElement.show();	
		var hideElement1 = $("#SubjectReport");
		hideElement1.hide();
		var hideElement2 = $("#ClassSectionReport");
		hideElement2.hide();
		var hideElement3 = $("#TopicReport");
		hideElement3.hide();
		var hideElement4 = $("#StudentsReport");
		hideElement4.hide();
	}
	function showTopicReport() {
		var showElement = $("#TopicReport");
		showElement.show();
		var hideElement1 = $("#SubjectReport");
		hideElement1.hide();
		var hideElement2 = $("#TestReport");
		hideElement2.hide();
		var hideElement3 = $("#ClassSectionReport");
		hideElement3.hide();
		var hideElement4 = $("#StudentsReport");
		hideElement4.hide();
	}

</script>