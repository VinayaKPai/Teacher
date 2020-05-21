<div class="top" id="showOptions" style="display: none;">

  <small><h7 style="background-color: #DDDDDD; padding-left: 1%; padding-right: 1%; display: flex; justify-content: space-between; ">
    <a id="Teachers"  name="people" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newTeachers.php">Teachers</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Students"  name="people" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newStudents.php">Students</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Assignments" name="activities" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/assignments.php">Assignments</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Tests"  name="activities" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/tests.php">Tests</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Quizzes"  name="activities"class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../Activity/quizzes.php">Quizzes</a>

  </h7></small>
</div>
<script>
  function showOptions() {
    var x = document.getElementById("showOptions");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";

      }
  }
</script>
