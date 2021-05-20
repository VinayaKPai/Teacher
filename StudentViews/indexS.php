<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentActivityQueries.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
  $loggedInUserName = $_SESSION['user'];
  $pageCode = "S";
?>
<html>
  <?php
    include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">

		<div class="container">
      <?php include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/logintimebtn.php"; ?>
      <h3 class="centered" style="background: var(--BodyGradient);">
        <?php
          include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php";
        ?>
      </h3>
      <div class="container-flex justify-content">
        <a href="../../StudentViews/indexS.php">
          <button type="button" class="btn btn-outline-primary">HOME</button>
        </a>
        <?php
          $buttonClass = "btn btn-primary";
            include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/studentNavBar.php";
        ?>
        <a href="../../StudentViews/explore.php?sub=My Old Stuff">
          <button type="button" class="btn btn-info">My Old Stuff</button>
        </a>
      </div>
    </div>
  <div class="container centered">
    <div class="container-flex">

      <?php
        $buttonClass = "btn sqbtn card";
          include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/studentNavBar.php";
        ?>
      <a href="../../StudentViews/explore.php?sub=My Old Stuff">
        <button type="button" class="btn btn-info sqbtn">My Old Stuff</button>
      </a>
    </div>


  </div>

  </body>
</html>
