<?php
	//Script to display successfully deployed deployments in the deploymentlog table
	//S	//End date is over and deployment success flag is 1
	include "../basecode-create_connection.php";
	$curdate = date("Y-m-d");
	$slno = 0;
	$query = $mysqli->query("SELECT * FROM deploymentlog, assessments WHERE deploymentlog.depType = 'T' AND  deploymentlog.deploySuccess = 0 AND assessments.assessment_Id = deploymentlog.dep_assessmentId");
	$rowcount=mysqli_num_rows($query);
  if ($rowcount>1) {
    $counts = $pageHeading." have";
  }
  else {
    $counts = $pageHeadSingular." has";
  }
	    echo "<h6 class='topbanner'>Currently $rowcount $counts never been administered. </h6>" ;

			if ($rowcount > 0) {
				//table tag is in the parent page already
          echo "<tr>
									<th>Title<hr>Class/Std</th>
									<th style='width: 50%;'>Questions</th>
									<th style='width: 30%;'>Action</th>
								</tr>";

					while ($row = $query->fetch_assoc())  {
						// {
              $slno++;
              $sid = $row['assessment_Title'];

              $cn = $row['assessment_questions'];
//get the actual questions from questionbank by exploding the coma separated string into a php array
							$qs = explode(",",$row['assessment_questions']);
							$qss = '';
							for ($r=0;$r<count($qs)-1;$r++) {
								$qss = $qss. "`qId` = ".$qs[$r]." OR ";
							}
							$qss = $qss."`qId` = ".$qs[count($qs)-1];
							$qquery = $mysqli->query("SELECT * FROM questionbank WHERE  $qss");

//check if the assessmentId exists in the deployment table
//if msg is yes, then we will need to get the deployment dates, otherwise not
							$aid = $row['assessment_Id'];
							// $requery = $mysqli->query("SELECT * FROM deploymentlog WHERE `dep_assessmentId`= $aid ");
							$msg = "";


						  echo "<tr>
											<td>".$sid."<hr></td>
											<td style='text-align: left;'>";
                					echo "<div style='min-height: 300px; overflow: scroll; margin bottom: 0px;'>";
                    			  $qno = 0;
                    				while ($qrow=$qquery->fetch_assoc()) {
															$classId = $qrow['qb_classId'];
                    					$qno = $qno + 1;

                    					echo $qno."     <span>".$qrow['question']."</span>";
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
														$composite = $classId.$aid;
														$dates = "date".$composite;
														$names = "name".$composite;
                				echo "</div>
                        </td>
												<td>
													<div style='tex-align: center; height: 150px; padding: 10px;'>

													<strong>Deploy to Class ".$classId."</strong>
													<br>
													<label for='section".$composite."'>Section: </label>
													<select id='section".$composite."' name=$names>
															<option value='1'>A</option>
															<option value='2'>B</option>
															<option value='3'>C</option>
															<option value='4'>D</option>
															<option value='5'>E</option>
															<option value='6'>F</option>
													</select><br>
													<label for='".$dates."'>Select Date to deploy:</label>
													<input type='date' id='".$dates."' name=".$names."><br>
												  <label for='as".$composite."'>Type:</label>
												    <select id='as".$composite."' name=".$names.">
												      <option name='A' value='A'>Assignment</option>
												      <option name='Q' value='Q'>Quiz</option>
												      <option name='T' value='T'>$pageHeading</option>
														</select><br>
													  <button id=".$aid." onclick='deploy(".$classId.",".$aid.")'>Deploy</button>
													</div><hr>
													<h5>Undeployed?";
//sending 2 parameters with deploy - assessment Id and classId
													// if (mysqli_num_rows($requery)>0) {
														 echo " <span class='red'>YES</span> </h5><div>";
														//get the deployment dates
														// while ($rerow = $requery->fetch_assoc()) {
															$type = $pageHeading;

															echo "Scheduled but not deployed <ol style='list-style-type: none'>
																			<li>To Sec ".$row['dep_sectionId']." on ".$row['schStartDate']." as  ".$type."</li>";

															echo "</ol>";
														// }
													// }
													// else {echo " <span class='red'>No Deployments yet</span></h5><div>";}
													echo "</div>
												</td>
                    </tr>";
						// }
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
