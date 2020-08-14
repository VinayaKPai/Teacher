<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
	$loggedInUserName = $_SESSION['user'];
	$pageCode = "T";
	if (!$_GET) {
		$display = "style='display: none;'";
	}
	else {
		$display = "style='display: block;'";
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

		<?php
	    include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
	  ?>
	<script>
		function commingSoon(t) {
			alert (t.innerText + " coming soon!!")
			t.style.color="white";
		}
	</script>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php"; ?>
			</h3>
			<?php echo $datetime1;
				if ($_GET) {
					$classes = explode(",",$_GET['c']);
					echo "<h5>You have ".count($classes)." classes: </h5>";
					echo "<h6 class='container'><ul class='list-group list-group-horizontal'  style='justify-content: space-between;'>";
						foreach ($classes as $key => $value) {
							echo "<li class='list-group-item'>Class - Section: ".$value."</li>";
						}
					echo "</ul></h6>";
					include $_SERVER['DOCUMENT_ROOT']."/Components/createNewAssessmentBtn.php";
					}
				else {
					echo "<h4>You don't have any classes assigned yet!</h4>";
				}
			?>

			<div class="container" style="background: var(--BodyGradient);">
				<div class="row" style="flex-wrap: wrap; padding: 5%; justify-content: space-between;">
					<h4 class="btn btn-block topbanner" <?php echo $display; ?> >Activity</h4>
					<?php
						if ($_GET) {
							include $_SERVER['DOCUMENT_ROOT']."/Components/activityList.php";
							include $_SERVER['DOCUMENT_ROOT']."/Components/CBSEPractice.php";
						}
					?>
					<h4 class="btn btn-block topbanner" <?php echo $display; ?> >Reports</h4>
					<?php
						if ($_GET) {
							$label = "Assignments";
							echo "";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
						}
					?>
						<?php
							if ($_GET) {
								$label = "Quizzes";
								include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
							}
						?>
					<?php
						if ($_GET) {
							$label = "Tests";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
						}
					?>
					<?php
						if ($_GET) {
							$label = "Students";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
						}
					?>
				</div>
					<?php include $_SERVER['DOCUMENT_ROOT']."/Components/todolist.php"; ?>
			</div>
		</div>

  </body>
</html>
