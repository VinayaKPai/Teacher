<html xmlns="http://www.w3.org/1999/xhtml">
  <?php
    session_start();
  	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
    $pageCode = "T";
    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
  	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
  	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/teachersQueryResultToHtmlTable.php";
  	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentsQueryResultToHtmlDiv.php";
    
  	// $loggedInUserName = $_SESSION['user'];
  	$pageCode = "A";
  	$loggedInUserName  = $_SESSION['user'];
  ?>
  <body class="body" style="background: var(--BodyGradient); height: 100%;">
    	<div class="container">
        <!-- <h5><?php echo $_SESSION['userId'];?></h5> -->
    		<div class="container-flex">
    			<h3 class="centered" style="background: var(--BodyGradient);">
    				<?php include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php"; ?>
    			</h3>
    		</div>
    		<div class="container-flex">
    			<?php
    				if ($_GET){echo $_GET;}
    				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/teacherNavBar.php";
    			?>
    		</div>
        <div class="container-flex">
    			<?php
    				if ($_GET){echo $_GET;}
            $teacherId = $_SESSION['userId'];
            studentsForATeacher($mysqli,$teacherId);
    			?>
    		</div>

  </body>
</html>
