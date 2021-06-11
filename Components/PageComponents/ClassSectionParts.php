<script>
  function expand(e) {//e=studentContainer id of div
    var contArray = ["studentContainer","assignmentContainer","testContainer","quizContainer"];
    var contParArray = ["uppercont","lowercont"];
    if (e=="studentContainer") {
        document.getElementById("studentContainer").setAttribute("class","btn col-sm-12 roundedsquare list-group-item ");
        document.getElementById("assignmentContainer").setAttribute("style","display: none;");
        // document.getElementById("testContainer").setAttribute();
        // document.getElementById("quizContainer").setAttribute();
        // document.getElementById("uppercont");
        document.getElementById("lowercont").setAttribute("style","display: none;");

    }
    if (e=="assignmentContainer") {
      document.getElementById("studentContainer").setAttribute("style","display: none;");
      document.getElementById("assignmentContainer").setAttribute("class","btn col-sm-12 roundedsquare list-group-item ");
      // document.getElementById("testContainer").setAttribute();
      // document.getElementById("quizContainer").setAttribute();
      // document.getElementById("uppercont");
      document.getElementById("lowercont").setAttribute("style","display: none;");
    }
    if (e=="testContainer") {
      // document.getElementById("studentContainer").setAttribute();
      // document.getElementById("assignmentContainer").setAttribute();
      document.getElementById("testContainer").setAttribute("class","btn col-sm-12 roundedsquare list-group-item ");
      document.getElementById("quizContainer").setAttribute("style","display: none;");
      document.getElementById("uppercont").setAttribute("style","display: none;");
      // document.getElementById("lowercont");
    }
    if (e=="quizContainer") {
      // document.getElementById("studentContainer").setAttribute();
      // document.getElementById("assignmentContainer").setAttribute();
      document.getElementById("testContainer").setAttribute("style","display: none;");
      document.getElementById("quizContainer").setAttribute("class","btn col-sm-12 roundedsquare list-group-item ");
      document.getElementById("uppercont").setAttribute("style","display: none;");
      // document.getElementById("lowercont");
    }

    if (document.getElementById("uppercont").style.display== "none" || document.getElementById("lowercont").style.display== "none") {
      var ch = document.getElementById("bkbtn").children.length;
      if (ch==0) {
        var aa= document.createElement("BUTTON");
        aa.setAttribute("class","blue");
        aa.setAttribute("onclick","location.reload()");
        aa.innerText="Back";
        // aa.onclick="location.reload()";
        document.getElementById("bkbtn").appendChild(aa);
      }
    }
  }
  </script>
  <div id="bkbtn" class="centered"></div>
<!-- create divs for different types of this class section data and call the details therein -->
<div class="container-flex" id="uppercont" style="display: block;">
  <!-- uppercon has Students and Assignments divs -->
    <div id="studentContainer" class="btn col-lg-6 roundedsquare list-group-item ">
      <a id="student"  data-toggle="collapse" href="#studentCollapse">
        <button class="btn btn-outline-secondary blue" onclick="expand(this.parentElement.parentElement.id)">Students</button>
      </a>

        <div id="studentCollapse" class="panel panel-collapse collapse">
          <div class="panel">
            <?php
              include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/studentsDisplayContainer.php";
              // collect and display all students in this class-section
               // studentSummaryDetailsThisClass($mysqli,$cl,$sc); ?>
          </div>
        </div>
    </div>
    <div  id="assignmentContainer" class="btn col-lg-6 roundedsquare list-group-item ">
      <a id="Assignments"  data-toggle="collapse" href="#assignmentsCollapse">
        <button class="btn btn-outline-secondary blue" onclick="expand(this.parentElement.parentElement.id)">Assignments</button>
      </a>
        <div id="assignmentsCollapse" class="panel panel-collapse collapse">
          <h5>Assignments Summary</h5>
          <div class="panel">
            Assignments Summary details
          </div>
        </div>
    </div>
</div>

<div class="container-flex" id="lowercont" style="display: block;">
    <div id="testContainer"  class="btn col-lg-6 roundedsquare list-group-item ">
      <a id="Tests"  data-toggle="collapse" href="#testsCollapse">
        <button class="btn btn-outline-secondary blue" onclick="expand(this.parentElement.parentElement.id)">Tests</button>
      </a>
        <div id="testsCollapse" class="panel panel-collapse collapse">
          <h5>Tests Summary</h5>
          <div class="panel">
            Tests Summary details
          </div>
        </div>
    </div>
    <div  id="quizContainer" class="btn col-lg-6 roundedsquare list-group-item ">
      <a id="Quizzes"  data-toggle="collapse" href="#quizzesCollapse">
        <button class="btn btn-outline-secondary blue" onclick="expand(this.parentElement.parentElement.id)">Quizzes</button>
      </a>
        <div id="quizzesCollapse" class="panel panel-collapse collapse">
          <h5>Quizzes Summary</h5>
          <div class="panel">
            Quizzes Summary details
          </div>
        </div>
    </div>
</div>
