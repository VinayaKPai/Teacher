<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
				session_start();
				include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php" ;
				include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
				include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
				// $a = "A";
				$type = "A";
				$pageHeading = "Assignments";
				$pageHeadSingular = "Assignment";
				$pageCode = 'T';
        $loggedInUserName = $_SESSION['user'];
	?>
</head>
<body class="body" style="background: var(--BodyGradient); height: 100%;">
	<div class="container">
		<div class="container-flex">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php"; ?>
			</h3>
		</div>

		<div class="container-flex">
			<?php
				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/teacherNavBar.php";
				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/classSectionList.php";
			?>
		</div>
	 <div style="background: var(--BodGradbanner);">
		 		<?php
	 			 include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/ClassSectionPanel.php";
				 //need to create new session variables for the student name being explored and then destroy it when clicked on another student
				?>

		</div>

 </div> <!-- container div immediately inside body -->

</body>
</html>
