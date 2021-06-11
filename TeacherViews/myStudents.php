<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php
      session_start();
    	include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
      $pageCode = "T";
      include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
    	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
    	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/teachersQueryResultToHtmlTable.php";
    	include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentsQueryResultToHtmlDiv.php";

    	$loggedInUserName  = $_SESSION['user'];
    ?>
    <script>
      function alerto(e) {
        alert (e.parentElement.tagName);
      }
    </script>
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
    				if ($_GET){echo $_GET;}
    				include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/teacherNavBar.php";
    			?>
    		</div>


        <div class="container-flex">
          <div class="boxshadow" >
    			<?php
            include $_SERVER['DOCUMENT_ROOT']."/Components/StudentComponents/StudentDisplayBody.php";
// Array (
//   [userType] => Teacher
//   [user] => Vinaya Keshav Pai
//   [userId] => 4
//   [c] => Array (
//     [0] => 9
//     [1] => 9
//     [2] => 10
//     [3] => 12 )
//   [sub] => Array (
//     [0] => 9
//     [1] => 10
//     [2] => 13
//     [3] => 6 )
//   [clsec] => Array (
//     [0] => 9-IX-B-2
//     [1] => 9-IX-D-4
//     [2] => 10-X-F-6
//     [3] => 12-XII-E-5 )
//     )
    			?>
        </div>
    		</div>


  </body>
</html>
