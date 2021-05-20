<?php
  session_start();
  // print_r ($_GET);
  // print_r($_SESSION);
  //  [stId] => 62
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
				// session_start();
				include $_SERVER['DOCUMENT_ROOT']."/Components/PageComponents/header.php" ;
				include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
				include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/allRetrievalQueries.php";
				// $a = "A";
				// $type = "A";
				// $pageHeading = "Assignments";
				// $pageHeadSingular = "Assignment";
				$pageCode = 'T';
        $loggedInUserName = $_SESSION['user'];
	?>
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

</head>
<body class="body" style="background: var(--BodyGradient); height: 100%;">
	<div class="container">
		<div class="container-flex">
			<h3 class="centered" style="background: var(--BodyGradient);">
        <?php include $_SERVER['DOCUMENT_ROOT']."/Components/LoginComponents/loggedtop.php"; ?>
			</h3>
		</div>
    <div class="container-flex">
			<h3 class="centered" style="background: var(--BodyGradient);">
        <?php include $_SERVER['DOCUMENT_ROOT']."/Components/NavBarComponents/classSectionList.php"; ?>
			</h3>
		</div>
		<div class="container-flex">

      <div class="container-flex" id="uppercont" style="display: block;">
        <h5 class="centered topbanner">Name: <?php echo $_GET['f']." ".$_GET['l'];?></h5>
          <div id="studentContainer" class="btn col-lg-6 roundedsquare list-group-item ">
            <a id="student"  data-toggle="collapse" href="#summaryCollapse">
              <button class="btn btn-outline-secondary blue" onclick="expand(this.parentElement.parentElement.id)">Summary</button>
            </a>

              <div id="summaryCollapse" class="panel panel-collapse collapse">
                <div class="panel">
                  <?php
                    singleStudentComprehensive();
                 ?>
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

      <div id="bkbtn" class="centered"></div>

		</div>

 </div> <!-- container div immediately inside body -->

</body>
</html>
