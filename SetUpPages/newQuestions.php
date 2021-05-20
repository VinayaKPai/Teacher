<?php
	session_start();
	include "../basecode-create_connection.php";
	$pageHeading = "New Questions";
	$pageCode = "setup";
	$userName = "Guest";
	$userType = "";
	$loggedInUserName  = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php"; ?>
	<body class="body">
		<div class="container">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/logintimebtn.php" ;
			?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php";
			?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/Components/NavBarComponents/adminNavBar.php";
			?>
				<div class="centered">
					<a href="../../SetUpPages/questionBank.php">
						<h4 class="btn btn-block topbanner">Question Bank</h4>
					</a>
				</div>
				<hr>
			<div style="align-content: center;">
			  <h6 class="panel-title col-sm-12" style="color: #413949;">Add a Question to the Database</h6>
			  <form name="newQuestionForm" action="../AddNew/addnewquestion.php" method="post">
			    <div class="form-group">

						<?php $displayType = "dropdown"; ?>
						<div style='margin-top: 2px;'>
							<span class='col-sm-4'>
								<span class='red'>*</span>
									<?php include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/classNumberDropDown.php"; ?>
							</span>
							<span>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/subjectDropDown.php"; ?>
							</span>
						</div>
						<div style='margin-top: 2px;'>
							<span class='col-sm-4'>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/topicDropDown.php"; ?>
							</span>
							<span  class='col-sm-8'>
								<span class='red'>*</span>
								<?php include $_SERVER['DOCUMENT_ROOT']."/Components/Components/DropDownComponents/typeDropDown.php"; ?>
								<span id="cbseNote">Currently no categorization of CBSE questions supported</span>
							</span>
						</div>
						</div>
						<div style="margin-left: auto; margin-right: auto;">
				      <span  class='col-sm-12'><span class='red'>*</span>
							<label for="qn">Question</label>
				      <input id="qn" name="qn" class="form-control" />
						</div>
						<div>
							<?php include  $_SERVER['DOCUMENT_ROOT']."/Components/MCQoptionsInput.php"; ?>
						</div>

			    <button name="Submit" id="submit" type="submit" style="float: center;">SUBMIT</button>
			  </form>

			</div>

		</div>
		<div class="container">
		<?php include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/bottom.php"; ?>
		</div>
	</body>
</html>
