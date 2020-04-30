<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";

		echo "Administered";
    $query = $mysqli->query(
      "SELECT *
        FROM deploymentlog, assessments, classes, subjects, sections
          WHERE `schStartDate` < CURDATE()
          AND deploymentlog.depType = 'A'
          AND classes.classId = deploymentlog.dep_classId
          AND subjects.subjectId = deploymentlog.dep_subjectId
          AND assessments.assessment_Id = deploymentlog.dep_assessmentId
          AND deploymentlog.deploySuccess = '1'
          AND deploymentlog.depType = 'A'
          ORDER BY `dep_classId` ASC");

    if (mysqli_num_rows($query)==0) {echo "None assignments deployed so far!";}

    else	{
        while ($row=$query->fetch_assoc()) {
    			$assessmentId = $row['dep_assessmentId'];

          $c = mysqli_num_rows($query);
            echo $c;
        			echo "<div class='row'>
                <div class='col-sm-3'>";
        					echo "<h5>Title:   <span style='color: Navy;'>".$row['assessment_Title']."</span></h5>";

        			   echo "</div>";
        			echo "<div class='col-sm-3'>";
        									echo "<h5>Class/Std:   <span style='color: Navy;'>".$row['classNumber']."</span></h5>";
        			echo "</div>";
        			echo "<div class='col-sm-3'>";
                					echo "<h5>Subject:   <span style='color: Navy;'>".$row['Subject']."</span></h5>";
        			echo "</div>";
        			echo "<label for=$assessmentId>Select Date:</label><div class='col-sm-3 small'>";
        			echo "Start Date <input class='small' type='date' id="$assessmentId"  name=$assessmentId />";

        			echo "<button class='small' id=$assessmentId onclick='deploy(this)'>Deploy</button></div>";
              echo "<div><h6>Deployment schedule: <span style='float:center;'><ul>";
              while ($startDate=$query->fetch_assoc()) {
                echo "<li>".$startDate['schStartDate']."</li>";
              }

                echo "</ul></span></h6>";
          			echo "</div>";
          			echo "</div>";
        					$qs = explode(",",$row['assessment_questions']);
        					$qss = '';
        					for ($r=0;$r<count($qs)-1;$r++) {
        						$qss = $qss. "`qId` = ".$qs[$r]." OR ";
        					}
        					$qss = $qss."`qId` = ".$qs[count($qs)-1];
        					$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");
        			echo "<div class='jumbotron small'>";
        			  $qno = 0;
        				while ($qrow=$qquery->fetch_assoc()) {
        					$qno = $qno + 1;
        					echo $qno.")     <span>".$qrow['question']."</span>";
        					echo "<div class='container'><ol style='list-style-type: lower-alpha;'>";
        					if ($qrow['Option_1']) {
        						echo "<li>".$qrow['Option_1']."</li>";
        					}
        					if ($qrow['Option_2']) {
        						echo "<li>".$qrow['Option_2']."</li>";
        					}
        					if ($qrow['Option_3']) {
        						echo "<li>".$qrow['Option_3']."</li>";
        					}
        					if ($qrow['Option_4']) {
        						echo "<li>".$qrow['Option_4']."</li>";
        					}
        					if ($qrow['Option_5']) {
        						echo "<li>".$qrow['Option_5']."</li>";
        					}
        					if ($qrow['Option_6']) {
        						echo "<li>".$qrow['Option_6']."</li>";
        					}
        					echo "</ol></div>";
        				}
    				echo "</div>";
    				echo "<hr style='border:solid 1px green;'>";
      		}
}
    $mysqli->close();

?>
</table>
