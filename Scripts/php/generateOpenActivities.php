<?php
  include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
  // include $_SERVER['DOCUMENT_ROOT']."/Scripts\php\sqlQueryResultToHtmlTable.php";
  include $_SERVER['DOCUMENT_ROOT']."/Scripts/php/questioResponseDisplay.php";
  $cl = $_SESSION['classNumber'];
  $sub = $_GET['sub'];
  $subId = $_GET['subId'];
    echo "Name".$_SESSION['user'];
    echo "Class".$_SESSION['c'];
    echo "Sec".$_SESSION['d'];
    echo $sub;
  $query = $mysqli->query("SELECT
	   a.assessment_title,
    sub.subjectName,
    deplog.depId,
    deplog.depType
    FROM
    	assessments as a
        	INNER JOIN deploymentlog as deplog
        		ON deplog.assessmentId = a.assessment_Id
        	INNER JOIN subjects as sub
        		ON sub.subjectId = a.subjectId
    WHERE
    	deplog.classId = '$cl'
        AND
        deplog.sectionId = 4
        AND
        	a.subjectId = '$subId'");

  $cnt = 0;
    while ($row = $query->fetch_assoc()) {
      if ($row['subjectName']==$sub){
        $depId = $row['depId'];
        $depType = $row['depType'];
        $aname = $row['assessment_title'];
        $action = "../../Scripts/php/generateAnswerSheet.php?sub=".$sub."&aname=".$aname;
        echo "<div class='topbanner'><div class='col-sm-8'>"
                .$row['assessment_title'].
                "<span class='col-2' style='float: right;'>(".$depType.")</span></div><div><form action='$action' method='post'>
                    <button class='btn btn-primary' name='submit' type='submit' value='$depId'>Start</button>
                  </form></div>
              </div>";
        }
    }

 ?>
