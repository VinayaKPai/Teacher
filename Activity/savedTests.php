<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
		// Display saved tests from the 'tests' table
    $query = $mysqli->query("SELECT * FROM tests, classes, subjects WHERE classes.classId = tests.teclassId AND subjects.subjectId = tesubjectId ORDER BY `classId`, `testId` ASC");


    echo "<div  style='border:solid 1px green;'>";
		while ($row=$query->fetch_assoc()) {
			$testId = $row['testId'];
			echo "<div class='row'>".$testId."
            <div class='col-sm-3'>";
					echo "<h5>Title:   <span style='color: Navy;'>".$row['testTitle']."</span></h5>";

			echo "</div>";
			echo "<div class='col-sm-3'>";
									echo "<h5>Class/Std:   <span style='color: Navy;'>".$row['classNumber']."</span></h5>";
			echo "</div>";
			echo "<div class='col-sm-3'>";
        					echo "<h5>Subject:   <span style='color: Navy;'>".$row['Subject']."</span></h5>";
			echo "</div>";
			echo "<div class='col-sm-3 small'>";
			echo "Start Date <input class='small' name=$testId type='date' />";
			echo "<button class='small' id=$testId onclick='deploy(this)'>Deploy</button>";
      echo "<div style='background: #d3d3d3; float:right;'><h6>Deployment schedule: </h6>";
        $schStart = $mysqli->query("SELECT `schStartDate` FROM deploymentlog WHERE `testId` = $testId");
        if (mysqli_num_rows($schStart)==0) {
          echo "<h6>This test has not been scheduled for deployment yet</h6>";
        }
        else {
          echo "<ul>";
          while ($startDate=$schStart->fetch_assoc()) {
            echo "<li>".$startDate['schStartDate']."</li>";
          }
        }
      echo "</ul></div>";
			echo "</div>";
			echo "</div>";
					$qs = explode(",",$row['tequestions']);
					$qss = '';
					for ($r=0;$r<count($qs)-1;$r++) {
						$qss = $qss. "`qId` = ".$qs[$r]." OR ";
					}
					$qss = $qss."`qId` = ".$qs[count($qs)-1];
					$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss ORDER BY `classId`");
			echo "<div class='jumbotron small' style='height: 120px; padding-top: 2px; padding-bottom: 1px; overflow: scroll;' id='".$row['testTitle']."'>";
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
    echo "</div>";
    $mysqli->close();
?>
