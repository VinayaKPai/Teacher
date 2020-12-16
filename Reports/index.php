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
    <body class="body" style="background: var(--BodyGradient);">
  		<div class="container">
  			<?php include $_SERVER['DOCUMENT_ROOT']."/Components/logintimebtn.php" ;?>
  			<?php
  				include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php";
  			?>
  			<?php
  				include $_SERVER['DOCUMENT_ROOT']."/Components/adminNavBar.php";
  			?>
      </div>
    </body>
    </html>
