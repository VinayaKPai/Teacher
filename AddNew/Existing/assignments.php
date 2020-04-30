<hr>
<table id="existTable" style="width: 100%; padding: 5px; border-spacing: 2px; border-collapse: separate; align: 'center';">
	<?php
	//Script to display existing
	include "../basecode-create_connection.php";

	$slno = 0;

	$query = $mysqli->query("SELECT * FROM assessments");

				if ($query) {
					$rowcount=mysqli_num_rows($query);
          if ($rowcount > 0) {
						$cls = "'color: Green;'";
					}
					else { $cls = "'color: Red;'";}
				}
        else {
          echo "No assessments";
        }
				echo "<h4 class='topbanner'>Currently $rowcount Assignments in your setup.</h4>" ;

				if ($rowcount > 0) {
          echo "<tr><th>SNo</th><th>Title</th><th>Questions</th></tr>";

					while ($row = $query->fetch_assoc())  {
						{

						  $slno++;
              $sid = $row['assessment_Title'];
              // $fn = $row['classNumber'];
              // $ln = $row['Subject'];
              $cn = $row['assessment_questions'];

						  echo "<tr>
                      <td>".$slno."</td>

                      <td>".$sid."</td>
                      <td style='text-align: left;'>";
                      $qs = explode(",",$row['assessment_questions']);
            					$qss = '';
                					for ($r=0;$r<count($qs)-1;$r++) {
                						$qss = $qss. "`qId` = ".$qs[$r]." OR ";
                					}
                					$qss = $qss."`qId` = ".$qs[count($qs)-1];
                					$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");
                			echo "<div style='height: 200px; overflow: scroll;'>";
                    			  $qno = 0;
                    				while ($qrow=$qquery->fetch_assoc()) {
                    					$qno = $qno + 1;
                    					echo $qno.")     <span>".$qrow['question']."</span>";
                    					echo "<div class='left' style='padding: 2px;'><ol style='list-style-type: lower-alpha;'>";
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
                				echo "</div>
                        </td>
                    </tr>";
						}
					}

				}
			if(!$query) {
					echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";
				}

	// echo "</div>";
	mysqli_close($mysqli);
?>
</table>
