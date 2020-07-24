<h6 style="background-color: #DDDDDD; padding-left: 1%; padding-right: 1%; display: flex; justify-content: space-between; ">
    <a id="Reports"  name="people" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newReports.php">Reports</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Subjects"  name="people" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newSubjects.php">Subjects</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Topics" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newTopics.php">Topics</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Teachers" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newclasses_taught_by_teachers.php">Teachers</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <a id="Questions" class="topbanner" style="width: 15%; color: #684654; background-color: #DDDDDD;  text-align: center;" href="../../SetUpPages/newQuestions.php">Questions</a>

    <div style="width: 2px; background-color: #684654;"> </div>

    <?php include $_SERVER['DOCUMENT_ROOT']."/Components/hamMenu.php"; ?>

</h6>
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
