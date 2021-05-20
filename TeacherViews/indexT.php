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
	    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
	  ?>
	<script>
		function commingSoon(t) {
			alert (t.innerText + " coming soon!!")
			t.style.color="white";
		}
	</script>
	<body class="body" style="background: var(--BodyGradient);">
		<div class="container">
			<?php
			// print_r($_SESSION);
			include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/logintimebtn.php" ;?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php";
			?>
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/teacherNavBar.php";
			?>
			<div class="container-fluid">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/classSectionList.php";
			?>
		</div>
			<div class="container" style="background: var(--BodyGradient);">
				<div class="row" style="flex-wrap: wrap; padding: 5%; justify-content: space-between;">
					<h4 class="btn btn-block topbanner" <?php echo $display; ?> >Activity</h4>
					<?php
						if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
							include $_SERVER['DOCUMENT_ROOT']."/Components/ActivityComponents/activityList.php";
							include $_SERVER['DOCUMENT_ROOT']."/Components/CBSEPractice.php";
						}
					?>
					<h4 class="btn btn-block topbanner" <?php echo $display; ?> >Reports</h4>
					<?php
						if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
							$label = "Assignments";
							echo "";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
						}
					?>
						<?php
							if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
								$label = "Quizzes";
								include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
							}
						?>
					<?php
						if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
							$label = "Tests";
							include $_SERVER['DOCUMENT_ROOT']."/Components/reportTypes.php";
						}
					?>
					<?php
						if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
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
