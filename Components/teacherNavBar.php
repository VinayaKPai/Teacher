<?php
  $enab = "";
  if (isset($_SESSION['clsec']) && $_SESSION['clsec']!='') {
    $enab = "style='display: block;'";
  }
  else {
    $enab = "style='display: none;'";
  }
?>

<div class="container-fluid" <?php echo $enab; ?> >
  <h6 style="background-color: #DDDDDD;" class="container-flex">
      <a id="Home" href="../../TeacherViews/indexT.php">
        <button  type="button" class="topbanner btn btn-outline-dark">Home</button>
      </a>

      <a id="Students" href="../../TeacherViews/myStudents.php" >
        <button class="btn btn-outline-secondary">My Students</button>
      </a>

      <a id="Assignments" href="../../Activity/assignments.php">
        <button class="btn btn-outline-secondary" class="topbanner btn col-sm-2" >Assignments</button>
      </a>

      <a id="Tests" href="../../Activity/tests.php">
        <button class="btn btn-outline-secondary" class="topbanner btn col-sm-2" >Tests</button>
      </a>

      <a id="Quizzes" href="../../Activity/quizzes.php">
        <button class="btn btn-outline-secondary" class="topbanner btn col-sm-2" >Quizzes</button>
      </a>
  </h6>
</div>
