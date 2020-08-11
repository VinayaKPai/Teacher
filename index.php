<?php
	if (isset ($_SESSION)){
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
	}
	include "basecode-create_connection.php";
	$pageHeading = "<span class='loggedin'>Guest</span>" ;
	$pageCode = "index";
	$userName = "Guest (T)";
	$userType = "";
	$loggedInUserName  = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Teachers Tools LH</title>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<!-- Bootstrap CSS -->
				    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />
				<link type="text" href="./Modals/modaltest.html"/link>
				<script src="./Scripts/js/codilytest.js"></script>
				<script>
					function commingSoon(t) {
						alert (t.innerText + " coming soon!!")
						t.style.color="white";
					}
				</script>
	</head>
	<body class="body" style="background: var(--BodyGradient); height: 100%;">
		<div class="container">
			<h3 class="centered" style="background: var(--BodyGradient);">
				<?php include "Components/top.php"; ?>
			</h3>
			<?php echo $datetime1;
				if (isset($_SESSION)) {print_r($_SESSION);}
				else {echo "No Session";}
			?>

			<div class="container" style="background: var(--BodyGradient);">

				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/loginFrm.php"; ?>
			</div>
			<div class="container">
			<?php include "Components/bottom.php"; ?>
			</div>
		</div>

  </body>
</html>
