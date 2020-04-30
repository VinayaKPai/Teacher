
<?php
    $pageHeading = "Tests";
    include $_SERVER['DOCUMENT_ROOT']."/basecode-create_connection.php";
          $query = $mysqli->query(
            "SELECT *
                FROM deploymentlog, assessments, classes, subjects, sections
                WHERE deploymentlog.depType = 'T'
                AND deploymentlog.deploySuccess = '1'
                AND deploymentlog.dep_assessmentId = assessments.assessment_Id
                ");
          $rowcount = mysqli_num_rows($query);
          if ($rowcount==0) {echo "No tests have been deployed so far!";}

          else	{
            echo "<table style='width:100%;'>";
              while ($row=$query->fetch_assoc()) {
          			$assessmentId = $row['assessment_Id'];
                $assessmentTitle = $row['assessment_Title'];
                $depId = $row['depId'];
                $depType = $row['depType'];
                $deploySuccess = $row['deploySuccess'];
                $schStart = $row['schStartDate'];
                $classId = $row['classId'];
                $subjectId = $row['subjectId'];
                $assessmentType = $row['assessment_Type'];
                if ($deploySuccess == 1) {
                  echo "<tr>";
                    echo "<td class='white'><div class='col-sm-3'>".$row['classNumber']."</div><div class='col-sm-3'>".$row['Sections']."</div><div class='col-sm-3'>".$row['Subject'].$row['assessment_Type']."</div></td>";
              			echo "<td class='white'>".$row['assessment_Title'].$row['assessment_Type']."</td>";
                  echo "</tr><tr>";
          					$qs = explode(",",$row['assessment_questions']);
          					$qss = '';
          					for ($r=0;$r<count($qs)-1;$r++) {
          						$qss = $qss. "`qId` = ".$qs[$r]." OR ";
          					}
          					$qss = $qss."`qId` = ".$qs[count($qs)-1];
          					$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");
          			    echo "<td class='col-sm-8' style='text-align: left;'>";
              			  $qno = 0;
              				while ($qrow=$qquery->fetch_assoc()) {
              					$qno = $qno + 1;
              					echo $qno.")     <span>".$qrow['question']."</span>";
              					echo "<ol style='list-style-type: lower-alpha;'>";
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
              					echo "</ol>";
              				}
          				    echo "</td>";
                      echo "<td class='col-sm-4' style='text-align: left;'>";

                      echo "<hr><div class='instructions'><p>Previously scheduled dates are listed below.</p><p>You can schedule another deployment by selecting the date and clicking on the Deploy button.</p></div><hr>";
                      echo "<label for=".$assessmentId.">Select Date:</label><div class='col-sm-3 small'>";
                			echo "Start Date <input class='small' type='date' id=".$assessmentId."  name=".$assessmentId." />";
                      echo "<button class='small' id=$depId onclick='deploy(this,\"".$depType."\",\"".$subjectId."\",\"".$classId."\")'>Deploy</button>";
                      echo "<h6>Deployment schedule: </h6><div><ul>";

                        echo "<li>".$row['schStartDate']."<small><button id=$depId onclick='alterDeploy(this)' class='btn btn-xs' style='float: right;'>Change</button></small></li>";


                      echo "</td>";
                      }
                      echo "</ul></div>";

                			echo "</td>";
                  echo "</tr>";
            		}
              }
          $mysqli->close();
      ?>