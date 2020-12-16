<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/studentActivityQueries.php";
  $loggedInUserName = $_SESSION['user'];
  $pageCode = "S";
print_r($_SESSION['c'] . $_SESSION['d']);
?>
<html>
<?php print_r($_SESSION); ?>
  <?php
    include $_SERVER['DOCUMENT_ROOT']."/Components/header.php";
  ?>
  <body  class="body" style="background: var(--BodyGradient);">

		<div class="container">
      <?php include $_SERVER['DOCUMENT_ROOT']."/Components/logintimebtn.php"; ?>
      <h3 class="centered" style="background: var(--BodyGradient);">
        <?php
          include $_SERVER['DOCUMENT_ROOT']."/Components/loggedtop.php";
        ?>
      </h3>
    </div>
  <div class="container centered">
    <a href="../../StudentViews/explore.php?sub=Hindi">
      <button type="button" id="Hindi" class="btn btn-primary sqbtn">Hindi</button>
    </a>
    <a href="../../StudentViews/explore.php?sub=English">
      <button type="button" class="btn btn-secondary sqbtn">English</button>
    </a>
    <a href="../../StudentViews/explore.php?sub=Maths">
      <button type="button" class="btn btn-success sqbtn">Maths</button>
    </a>
    <a href="../../StudentViews/explore.php?sub=Science">
      <button type="button" class="btn btn-danger sqbtn">Science</button>
    </a>
    <a href="../../StudentViews/explore.php?sub=Social Studies">
      <button type="button" class="btn btn-warning sqbtn text-wrap">Social Studies</button>
    </a>
    <a href="../../StudentViews/explore.php?sub=My Old Stuff">
      <button type="button" class="btn btn-info sqbtn text-wrap">My Old Stuff</button>
    </a>

  </div>

  </body>
</html>
