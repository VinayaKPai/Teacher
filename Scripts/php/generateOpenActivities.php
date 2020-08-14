<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts\php\sqlQueryResultToHtmlTable.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/questioResponseDisplay.php";
  $cl = $_SESSION['classNumber'];
  $sub = $_GET['sub'];
echo "Name".$_SESSION['user'];
echo "Class".$_SESSION['c'];
echo "Sec".$_SESSION['d'];
echo $sub;
  $query = $mysqli->query("SELECT a.assessment_title, sub.subjectName, deplog.depId
    FROM assessments as a
    INNER JOIN deploymentlog as deplog
    ON deplog.assessmentId = a.assessment_Id
    INNER JOIN subjects as sub
    ON sub.subjectId = a.subjectId
    WHERE deplog.classId = '$cl'");

  $cnt = 0;
    while ($row = $query->fetch_assoc()) {
      if ($row['subjectName']==$sub){
        $depId = $row['depId'];
        echo "<div class='topbanner'><div class='col-sm-8'>"
                .$row['assessment_title'].
                "</div><div><form action='../../Scripts/php/generateAnswerSheet.php' method='post'>
                    <button class='btn btn-primary' name='submit' type='submit' value='$depId'>Start</button>
                  </form></div>
              </div>";
        }
    }

 ?>
