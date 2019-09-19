<div id="top" class="row" style="padding: 1px;">
	<div class="col-sm-4 topbanner left">
		<span style="float: left;">
			<a href="/index.php"><i class="glyphicon glyphicon-home" style="color: White;"></i></a>
		</span><span style="float: right;">
    <img class="svg" src="../Images/logo-purple.png" alt="LOGO" width="7%">
  Logo</span>
	</div>
	<div class="col-sm-4 topbanner dropdown">
		<?php echo $pageHeading; ?>
		<small><span class="glyphicon glyphicon-chevron-down" style="color: #fff;"></span></small>
		<div id="setup" class="dropdown-content centered h6" style="float: center;">
			<a href="../../SetUpPages/newReports.php">Reports </a><br>
			<a href="../../SetUpPages/newclasses_taught_by_teachers.php">Class-Sections </a><br>
			<a href="../../SetUpPages/newSubjects.php">Subjects </a><br>
			<a href="../../SetUpPages/newTopics.php">Topics </a><br>
			<a href="../../SetUpPages/newQuestions.php">Questions </a><br>
			<a href="../../SetUpPages/newStudents.php">Students </a>
		</div>
		<!-- <div id="activity" class="dropdown-content centered h6" style="float: right;">
			<a href="../../Activity/addnewassignemnt.php">Assignments </a><br>
			<a href="../../Activity/testModule.php">Tests </a><br>
			<a href="../../Activity/newaddnewquiz.php">Quizzes </a><br>
			<a href="../../Activity/cbsepractice.php">CBSE Practice </a>
		</div> -->
	</div>
	<div class="col-sm-4 topbanner right">
		<a href="">
			<span style="float: left; color: White;" onclick="loginalert()">Login</span>
			<script>
			function loginalert () {
				alert ('login not enabled yet');}
			</script>
		</a>
		<span style="float: right;">Search</span>

	</div>
</div>
