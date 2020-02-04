<?php
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
		// Display saved tests from the 'tests' table
		echo "Administered";
    $query = $mysqli->query("SELECT * FROM tests, classes, subjects, deploymentlog WHERE classes.classId = tests.test_classId AND subjects.subjectId = test_subjectId ORDER BY `test_classId` ASC");
    if (!$query) {echo "None so far!";}

    else	{
          while ($row=$query->fetch_assoc()) {
    			$testId = $row['testId'];
          $schStart = $mysqli->query("SELECT `schStartDate` FROM deploymentlog WHERE `dep_testId` = $testId AND `schStartDate` < CURDATE() ");
          $c = mysqli_num_rows($schStart);
          echo $c;
          if ($c >0) {
        			echo "<div class='row'><div class='col-sm-3'>";
        					echo "<h5>Title:   <span style='color: Navy;'>".$row['testTilte']."</span></h5>";

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
              echo "<h6>Deployment schedule: <span style='float:center;'><ul>";
              while ($startDate=$schStart->fetch_assoc()) {
                echo "<li>".$startDate['schStartDate']."</li>";
              }
            }
            else {
              echo "<h6>No tests have been deployed yet</h6>";
            }
          echo "</ul></span></h6>";
    			echo "</div>";
    			echo "</div>";
    					$qs = explode(",",$row['test_questions']);
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
