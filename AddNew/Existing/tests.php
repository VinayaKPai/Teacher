<?php
	//Script to display existing
	include "../basecode-create_connection.php";
	$slno = 0;
	$query = $mysqli->query("SELECT * FROM assessments");
	$rowcount=mysqli_num_rows($query);
	    echo "<h6 class='topbanner'>Currently $rowcount Saved Tests<small class='white' style='float: right;'>Remember that these may not all have been deployed yet</small></h6>" ;

			if ($rowcount > 0) {
          echo "<tr>
									<th>Title<hr>Class/Std</th>
									<th style='width: 50%;'>Questions</th>
									<th style='width: 30%;'>Action</th>
								</tr>";

					while ($row = $query->fetch_assoc())  {
						{
              $slno++;
              $sid = $row['assessment_Title'];


              $cn = $row['assessment_questions'];

						  echo "<tr>
											<td>".$sid."</td>
											<td style='text-align: left;'>";
	                      $qs = explode(",",$row['assessment_questions']);
	            					$qss = '';
	                					for ($r=0;$r<count($qs)-1;$r++) {
	                						$qss = $qss. "`qId` = ".$qs[$r]." OR ";
	                					}
              					$qss = $qss."`qId` = ".$qs[count($qs)-1];
              					$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");
                					echo "<div style='height: 300px; overflow: scroll;'>";
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
												<td>
													<div style='tex-align: center;'>
														<label for='date'>Select Date to deploy:</label>
													  <input type='date' id='date' name='date'><br>
													  <label for='as'>As:</label>
													    <select id='as' name='as'>
													      <option name='A' value='A'>Assignment</option>
													      <option name='Q' value='A'>Quiz</option>
													      <option name='T' value='A'>Test</option>
															</select><br>
													  <input type='submit' value='Deploy'>
													</div><hr>
													<h6>Previously deployed?</h6><div>";
													$aid = $row['assessment_Id'];
													$requery = $mysqli->query("SELECT * FROM deploymentlog WHERE `dep_assessmentId`= $aid ");
													if (mysqli_num_rows($requery)>0) {echo "Yes";}
													else {echo "No";}
													echo "</div>
												</td>
                    </tr>";
						}
					}

				}
			else {
          echo "No assessments";
        }
			if(!$query) {
					echo "Looks like your set up has not been started. Please add student details to the database, so that you can get the benefit of all the features of the App";
				}

	mysqli_close($mysqli);
?>
