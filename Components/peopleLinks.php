<h6 style="background-color: #DDDDDD; padding-left: 1%; padding-right: 1%; display: flex; justify-content: space-between; ">

      <div class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;">People</div>

<div style="width: 2px; background-color: #684654;"> </div>

      <a class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newTeachers.php">Teachers</a>

<div style="width: 2px; background-color: #684654;"> </div>

      <a class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newStudents.php">Students</a>
<div style="width: 2px; background-color: #684654;"> </div>
  <div style="width: 3%; text-align: center; padding-left: 1%; cursor: pointer;">
    <div style="cursor: hand;" onclick="showOptions()">
        <div style="width: 90%; height: 2px; background-color: #684654; margin: 6px 2px; display:block;"></div>
        <div style="width: 90%; height: 2px; background-color: #684654; margin: 6px 2px; display:block;"></div>
        <div style="width: 90%; height: 2px; background-color: #684654; margin: 6px 2px; display:block;"></div>
    </div>
  </div>
</h6>
<div class="top" id="showOptions" style="display: none;">
  <a id="Teachers" class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newTeachers.php">Teachers</a>
  <a id="Students" class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newStudents.php">Students</a>
  <a id="Assignments" class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/assignments.php">Assignments</a>
  <a id="Tests" class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/tests.php">Tests</a>
  <a id="Quizzes" class="topbanner" style="width: 32%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/quizzes.php">Quizzes</a>
</div>
<script>
  function showOptions() {
    var hg = <?php echo $pageHeading; ?>
    // var h = document.getElementById('heading');
    // h.disabled;
    var x = document.getElementById("showOptions");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
  }
</script>
