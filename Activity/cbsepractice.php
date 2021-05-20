<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body class="body">
	<div class="container">
		<?php
			$pageHeading = "Create a New ASSIGNMENT";
			$userName = "Guest (T)";
			$userType = "";
			$loggedInUserName  = "";
			include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
			include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
			include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/top.php";
		?>
	 <h4>CBSE Practice</h4>

	<div class="centered" style="width: 100%;">
		<form action="createtest.php">

			<button type='submit'>Submit</button>
		</form>
	</div>

</div>
</body>
</html>
