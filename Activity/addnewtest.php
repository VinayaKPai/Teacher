<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include $_SERVER['DOCUMENT_ROOT']."/Components/header.php" ;?>
	<script src="../Scripts\js\ajaxCallActivities.js"></script>
	<script>
	function deploy (v,x) {
		//v is class Id
		//x is assessment id
		var w,y,z;
		//We need to send 5 data points to the ajaxDeployActivity function where
		//e=classId, (same as v here)
	  //f=section id (same as w here)
	  //g=assessment id,(same as x here)
	  //h=date (same as y here)
	  //i=deployment type T(for test)/A(forAssignment)/Q(for quiz), (same as z here)
		var col = document.getElementsByName("name" + v + x);
				w = col[0].value;
				y = col[2].value;
				z = col[1].value;

				alert ( "v=" + v + " w" + w + " x" +  x + " y" + y + " z=" + z);
		// alert (v,w,x,y,z);
		ajaxDeployActivity(v,w,x,y,z) ;
		  //e=classId,
		  //f=section id
		  //g=assessment id,
		  //h=date
		  //i=deployment type T(for test)/A(forAssignment)/Q(for quiz),
	}
	</script>
</head>
<body class="body">
	<div class="container">
			<div class="right-align">
				<?php include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
					echo $datetime1; ?>
			</div>
			<hr>
			<?php
				$pageHeading = "Tests";
				$pageHeadSingular = "Test";
				include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
				include $_SERVER['DOCUMENT_ROOT']."/Components/top.php";
				if ($_GET){echo $_GET;}
			?>
			 <a href="../../SetUpPages/newQuestions.php">
				 <h4 class="btn btn-block topbanner">Add A New <? $pageHeadSingular; ?>
					 <small style="padding: 10px; color: White;">This will take you to the question bank</small>
				 </h4>
			 </a>
			 <?php include $_SERVER['DOCUMENT_ROOT']."/Components/AQTpanels.php"; ?>
	 </div>
</body>
</html>
